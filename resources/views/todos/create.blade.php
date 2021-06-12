@extends('todos.layouts')

@section('content')
    <div class="flex justify-between border-b pb-4 px-4">
        <h1 class="text-2xl pb-4 ">What next you need To-Do</h1>
        <a href="{{route('todo.index')}}" class=" mx-5  py-2 text-gray-400 cursor-pointer ">
            <span class="fas fa-arrow-left"></span>
        </a>
    </div>
        <x-alert></x-alert>
        <form action="{{route('todo.store')}}" method="POST" class="py-5 ">
            @csrf
            <div class="py-1">
                <input type="text" name="title" class="py-2 px-2 border rounded" placeholder="Title">
            </div>
            <div class="py-1">
                <textarea name="description" cols="30" rows="2" class="p-2 rounded border" placeholder="Description"></textarea>
            </div>

          <div class="py-2">
            @livewire('step')
          </div>

           <div class="py-1">
                <input type="submit" value="create" class="p-2 border rounded-lg cursor-pointer">
           </div>

        </form>
@endsection
