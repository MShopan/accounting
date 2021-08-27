
<div>

    <x-table-card >
    <x-slot name="title">Posts inc</x-slot>


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



            <h5
            style="display: none;"
             id="help" x-show="show" style="display: none;" x-data="{show:false}"
             x-init="setTimeout(()=>{show=false},600)"
             x-transition.duration.500ms>Help
            </h5>







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

    <x-table-model type="defulte">
        <x-slot name="header">
            <tr>
                <th>title</th>
                <th>description</th>
                <th>created at</th>
                <th>updated at</th>
                <th>tools</th>
            </tr>

        </x-slot>
        <x-slot name="body">
            <template x-for="post in _myPosts">
                <tr>
                    <td x-text="post.title"></td>
                    <td x-text="post.description"></td>
                    <td x-text="post.created_at"></td>
                    <td x-text="post.updated_at"></td>
                    <td>
                        <a class="btn btn-sm btn-outline-success" x-on:click="$wire.emit('post_update',post.id)" >Edit</a>
                        <a class="btn btn-sm btn-danger" x-on:click="$wire.deleteElement(post.id)" >Delete</a>
                    </td>
                </tr>
            </template>

        </x-slot>
    </x-table-model>


    </div>



    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>

</x-table-card>




  <!-- Modal -->
  <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        @livewire('post-form')
      </div>
    </div>
  </div>




</div>

