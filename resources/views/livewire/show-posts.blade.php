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









{{-- new modal  --}}


  <!-- Modal -->
  <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal 11</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-control">
              <label for="">title</label>
              <input type="text" name="" id="title" wire:model.defer="currentPost.title">
          </div>
          <div class="form-control">
              <label for="">description</label>
              <input type="text" name="" id="description" wire:model.defer="currentPost.description">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click="save()">Save changes</button>
        </div>
      </div>
    </div>
  </div>







    {{-- end --}}
</div>
