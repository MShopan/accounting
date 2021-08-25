
<div>

    <div
    id="posts"
    x-init="
    _myPosts = JSON.parse(myPosts)['data'];

    $watch('myPosts',(val)=>{
        _myPosts = JSON.parse(myPosts)['data'];
    });

    "
     x-data="{count : @entangle('counter') , myPosts: @entangle('myPosts') ,_myPosts : '' }"

    >
       <span x-text="count" class="text-danger"></span>
       <a class="btn btn-primary" wire:click="increament()">add</a>

       <table class="table table-striped table-sm">
           <thead class="thead thead-dark">
               <tr>
                   <th>title</th>
                   <th>description</th>
                   <th>created at</th>
               </tr>
           </thead>
           <tbody>

               <template x-for="post in _myPosts">
                   <tr>
                       <td x-text="post.title"></td>
                       <td x-text="post.description"></td>
                       <td x-text="post.created_at"></td>
                   </tr>
               </template>
           </tbody>

        </table>



    </div>



    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>



</div>

