
<div>

  {{-- form   --}}
  <div id="bar" class="row mt-3 ml-2">
    <form action="" class="form-inline" wire:submit.prevent="">

          <div class="input-group input-group-sm ">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
            </div>
            <input wire:model.lazy="search" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          </div>

            <span id="post-count" class="m-2 d-xl-inline d-md-inline d-sm-none">
                post count is :
                <span class="badge badge-pill badge-info">{{$posts_count}}</span>
            </span>

            </span>
            <a wire:click="$emit('post_create')" class="btn btn-sm btn-outline-success m-2">
                <span class="badge badge-success">+</span>
                Add
            </a>

               {{-- notify success --}}

               <div id="success-message"
               x-data="{show:false}"
               x-on:save-success.window="show=true;setTimeout(()=>{ show=false; },1500);"

               >

               <span x-show="show" style="display: none;" x-transition.duration.500ms  class="text-success">Data saved</span>

            </div>


            {{-- end notify success --}}

            <h5
            style="display: none;"
             id="help" x-show="show" style="display: none;" x-data="{show:false}"
             x-init="setTimeout(()=>{show=false},600)"
             x-transition.duration.500ms>Help
            </h5>



            {{-- success message  --}}
            {{-- <div x-show="show" x-transition.duration.500ms
            style="display: none; width:180px;" class="alert alert-sm alert-success ml-3 mr-3 " role="alert">
                Data saved success
            </div> --}}

            {{-- end success message --}}

             {{-- loading section  --}}
            <span wire:loading class="spinner-border spinner-border-sm ml-3 my-3" role="status">
              <span class="sr-only">Loading...</span>
            </span>



    </form>


</div>

    <div
    id="posts"
    x-init="
    _myPosts = JSON.parse(myPosts)['data'];

    $watch('myPosts',(val)=>{
        _myPosts = JSON.parse(myPosts)['data'];
    });

    "
     x-data="{ myPosts: @entangle('myPosts') ,_myPosts : '' }"

    >

       <table class="table table-striped table-sm">
           <thead class="thead thead-dark">
               <tr>
                   <th>title</th>
                   <th>description</th>
                   <th>created at</th>
                   <th>tools</th>
               </tr>
           </thead>
           <tbody>

               <template x-for="post in _myPosts">
                   <tr>
                       <td x-text="post.title"></td>
                       <td x-text="post.description"></td>
                       <td x-text="post.created_at"></td>
                       <td>
                           <a class="btn btn-sm btn-outline-success" x-on:click="$wire.emit('post_update',post.id)" >Edit</a>
                           <a class="btn btn-sm btn-danger" x-on:click="$wire.deleteElement(post.id)" >Delete</a>
                       </td>
                   </tr>
               </template>
           </tbody>

        </table>



    </div>



    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>



  <!-- Modal -->
  <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        @livewire('post-form')
      </div>
    </div>
  </div>




</div>

