<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        // Query Builder

        // insert data
        // DB::insert('insert into users (name, email, password) Values(?,?,?)', [
        //     'imran', 'imran@gmail.com', 'password'
        // ]);

        // select/view data
        // $users = DB::select('select * from users');
        // return $users;

        // update data
        // DB::update('update users set name = ? where id = 1', ['siddiki']);
        // $users = DB::select('select * from users');
        // return $users;

        // delete data
        // $users = DB::delete('delete from users where id = 1');
        // return $users;


        // Eloquent ORM

        // insert data
        // $user = new User();
        // $user->name = 'imran';
        // $user->email = 'imran@gmail.com';
        // $user->password = bcrypt('password');
        // $user->save();

        //view data
        // $user = User::all();
        // return $user;

        // delete data
        // User::where('id', 2)->delete();

        // update data
        // $user = User::where('id', 3)->update(['name'=>'siddiki']);
        // $user = User::all();
        // return $user;

        // Eloquent Create Part
        $data = [
            'name' => 'elonses',
            'email' => 'elosesn@gmail.com',
            'password' => 'password'
        ];
        //User::create($data);

        $user = User::all();
        return $user;

        //return view('home');
    }

    // upload Avatar
    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $this->deleteOldImage();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
            //$request->session()->flash('message', 'Image Uploaded');
            return redirect()->back()->with('message', 'Image Uploaded');

        }
        //$request->session()->flash('error', 'Image Not Uploaded');
        return redirect()->back()->with('error', 'Image Not Uploaded');

    }

    protected function deleteOldImage()
    {
        if(auth()->user()->avatar){
            Storage::delete('public/images/' . auth()->user()->avatar);
        }
    }
}
