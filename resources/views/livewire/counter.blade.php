<div style="text-align: center">
    <button wire:click="increment10">+</button>
    <h1>{{ $count }}</h1>
    <h1 class="border p-5">{{$name}}</h1>
    <input type="text" wire:model="name">

</div>