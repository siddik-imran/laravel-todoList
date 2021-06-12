@extends('todos.layouts')

@section('content')
       <div class="flex justify-between border-b pb-4 px-4">
            <h1 class="text-2xl pb-2">All your todos</h1>
            <a href="{{route('todo.create')}}" class=" mx-5  py-2 text-blue-300 cursor-pointer text-white">
                <span class="fas fa-plus-circle"></span>
            </a>
       </div>
        <ul class="my-5">
            <x-alert></x-alert>
            @if($todos->count() > 0)
                @foreach ($todos as $todo )
                <li class="flex justify-between py-2">

                    @include('todos.completeButton')

                    @if($todo->completed)
                    <p class="ml-3 line-through">{{$todo->title}}</p>
                    @else
                    <a href="{{route('todo.show', $todo->id)}}" class="ml-3 cursor-pointer">{{$todo->title}}</a>
                    @endif

                    <div>
                        <a href="{{route('todo.edit', $todo->id)}}" class=" text-yellow-400 cursor-pointer text-white">
                            <span class="fas fa-pen px-2"></span>
                        </a>


                        <a href="{{'/todos/edit/'.$todo->id}}" class=" text-red-400 cursor-pointer text-white">
                            <span class="fas fa-times px-2"
                                onclick="event.preventDefault();
                                if(confirm('Are you really want to delete?')){
                                    document.getElementById('form-delete-{{$todo->id}}')
                                    .submit() }">
                            </span>
                        </a>
                        <form action="{{route('todo.destroy',$todo->id)}}" method="POST" style="display:none" id="{{'form-delete-'.$todo->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </div>

                </li>
                @endforeach
            @else
                <p>No task available, Create one</p>
            @endif
        </ul>

@endsection

