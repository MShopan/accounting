<div>
  <div id="posts"
  x-data="{api : @entangle('myPosts') , posts : '' }"
  ></div>
    {{-- success message  --}}
    <div
    id="message"
    x-data="{show:false}"
    x-init = "
         $on('save-success' ,  () => {

            show=true;
            setTimeout(()=>{ show=false; },1500);


        });
    "
    >
    <div x-show="show"
    x-transition
     style="display: none;" class="alert alert-success mt-3 " role="alert">
        Data saved success
    </div>
  </div>

  {{-- form   --}}
    <div id="bar" class="row mt-3 ml-2">
        <form action="" class="form-inline" wire:submit.prevent="">

              <div class="input-group input-group-sm ">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
                </div>
                <input wire:model.lazy="search" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>

                <span id="post-count" class="m-2">
                    post count is :
                    <span class="badge badge-pill badge-info">{{$posts_count}}</span>
                </span>

                </span>
                <a wire:click="$emit('post_create')" class="btn btn-sm btn-outline-success m-2">
                    <span class="badge badge-success">+</span>
                    Add
                </a>


                <span wire:loading class="spinner-border spinner-border-sm ml-3 my-3" role="status">
                  <span class="sr-only">Loading...</span>
                </span>



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
