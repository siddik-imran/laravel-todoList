<div>
    <div class="flex justify-center  pb-4 px-4">
        <h1 class="text-lg ">Add step for task</h1>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer"></span>
    </div>

   @foreach ($steps as $step )
    <div class="flex justify-center py-2" wire:key="{{$loop->index}}">
        <input type="text" name="stepName[]" class="py-2 px-2 border rounded" value="{{$step['name']}}" placeholder="{{'Describe Step'.($loop->index+1)}}">
        <input type="hidden" name="stepId[]"  value="{{$step['id']}}" >
        <span wire:click="remove({{$loop->index}})" class="fas fa-times text-red-400 p-2 cursor-pointer"></span>
    </div>
    @endforeach

</div>
