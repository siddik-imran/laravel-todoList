<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use App\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    // middleware >>authenticate user
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');  //show specific login users logo
        //$todos = Todo::orderBy('completed')->get();
        return view('todos.index')->with(['todos'=> $todos]);
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function create()
    {
        return view('todos.create');
    }


    public function store(Request $request)
    {

        // validation with custom message...file locate at app/Http/Request/TodoCreateRequest
        // $rules = [
        //     'title' => 'required|max:255',
        // ];
        // $message = [
        //     'title.max' => 'Todo title should not be greater than 255 chars',
        // ];
        // $validator = Validator::make($request->all(), $rules, $message);

        // if($validator->fails()){
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // validation
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = auth()->user()->todos()->create($request->all()); //authenticate user create their todos

        if($request->step){
            foreach($request->step as $step){
                $todo->steps()->create(['name' => $step]);
            }
        }

       //Todo::create($request->all());
       return redirect(route('todo.index'))->with('message', 'Todo Created');
    }

    public function edit(Todo $todo) //route model binding
    {
        //$todo = Todo::find($id); //when we use route model binding no need to this line it's automatically find the id
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        // validation
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo->update(['title' => $request->title]);
        if($request->stepName){
            foreach($request->stepName as $key => $value){
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name' => $value]);
                }
                else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }

            }
        }
        return redirect(route('todo.index'))->with('message', 'Todo Updated!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as Completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as Incomplete');
    }


    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted');
    }
}
