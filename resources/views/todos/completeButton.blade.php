@if($todo->completed)
<span class="fas fa-check px-2 text-green-400 cursor-pointer"
    onclick="event.preventDefault();
    document.getElementById('form-incomplete-{{$todo->id}}')
    .submit()">
</span>
<form action="{{route('todo.incomplete',$todo->id)}}" method="POST" style="display:none" id="{{'form-incomplete-'.$todo->id}}">
    @csrf
    @method('put')
</form>
@else
<span onclick="event.preventDefault();
    document.getElementById('form-complete-{{$todo->id}}')
    .submit()"
    class="fas fa-check px-2 text-gray-300 cursor-pointer">
</span>
<form action="{{route('todo.complete',$todo->id)}}" method="POST" style="display:none" id="{{'form-complete-'.$todo->id}}">
    @csrf
    @method('put')
</form>
@endif
