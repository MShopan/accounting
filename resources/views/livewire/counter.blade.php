<div style="text-align: center">


    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    <h1 class="border p-5">{{$name}}</h1>
    <input type="text" wire:model.lazy="name"> 
    <button wire:click.prevent="add">add</button>
    <button wire:click.prevent="$set('name','ali')">asign ali</button>

    <button wire:click.prevent="areDelete">delete</button>

    <ul>
        @foreach ( $items as $el)
        <li>{{$el}}</li>
        @endforeach
    </ul>



    <button wire:click="decreament">--</button>


  
</div>



<script>

</script>

