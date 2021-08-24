<div>
    <div id="bar" class="row mt-3 ml-2">
        <form action="" class="form-inline" wire:submit.prevent="">

              <div class="input-group input-group-sm ">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
                </div>
                <input wire:model.lazy="search" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>

                <span class="m-2">
                    post count is :
                    <span class="badge badge-pill badge-info">{{$posts_count}}</span>
                </span>
                <a wire:click="$emit('post_create')" class="btn btn-sm btn-outline-success m-2">
                    <span class="badge badge-success">+</span>
                    Add
                </a>



        </form>


    </div>
    <table class="table table-sm table-striped table-bordered">
        <thead class="thead-dark">
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
                   <a class="btn btn-sm btn-outline-success" wire:click="$emit('post_update',{{$post->id}})" >Edit</a>
                   <a class="btn btn-sm btn-danger" wire:click="deleteElement({{$post->id}})" >Delete</a>

                 </th>
             </tr>
          @endforeach
        </tbody>
    </table>

    <div class="row d-flex justify-content-center" style="">
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
