<div>
    <div id="bar">
       <label for="search">search</label>
       <input type="text" wire:model="search">
       <button wire:click="$emit('post_create')">+</button>
       <span>post count is : {{$posts_count}}</span>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>description</th>
                <th>tools</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
             <tr id="post-{{$post->id}}">
                 <th>{{$post->id}}</th>
                 <th>{{$post->title}}</th>
                 <th>{{$post->description}}</th>
                 {{-- tools --}}
                 <th>
                   <button wire:click="$emit('post_update',{{$post->id}})" >edit</button>
                   <button wire:click="deleteElement({{$post->id}})" >delete</button>

                 </th>
             </tr>
          @endforeach
        </tbody>
    </table>
    <div>
        {{  $posts->links() }}

    </div>









{{-- new modal  --}}


  <!-- Modal -->
  <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        @livewire('post-form')
      </div>
    </div>
  </div>







    {{-- end --}}
</div>
