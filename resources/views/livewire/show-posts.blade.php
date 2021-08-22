<div>
    <div id="bar">
       <label for="search">search</label>
       <input type="text" wire:model="search">
       <button wire:click="addPost()">+</button>
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
                   <button wire:click="editPost({{$post->id}})" >edit</button>
                   <button wire:click="deleteElement({{$post->id}})" >delete</button>

                 </th>
             </tr>
          @endforeach
        </tbody>
    </table>
    <div>
        {{  $posts->links() }}

    </div>

    {{-- test show --}}
     @if ($viewModal)

         <div wire:click="$set('viewModal',false)">modal run ...</div>

     @endif







{{-- new modal  --}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


    {{-- end --}}
</div>
