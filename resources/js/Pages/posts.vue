<template >
   <div class=" w-full flex flex-col content-center items-center ">




     <button class="btn btn-success">
         add
     </button>


      message : <input class="input input-sm input-primary" v-model="msg" />

      <h1>users</h1>
      <table class="table w-full table-compact">
      <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        </tr>
      </thead>

      <tbody>
         <tr v-for="user in users.data" :key="user.id">
             <td>{{ user.id }}</td>
             <td>{{ user.name }}</td>
             <td>{{ user.email }}</td>
         </tr>
      </tbody>
      </table>

      <pagination class="mt-6" :my-only="'users'" :links="users.links" />


    <div class="mt-4"></div>

    <!-- posts table  -->
     <table class=" table w-full table-compact ">
      <thead>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        </tr>
      </thead>

      <tbody>
         <tr v-for="post in posts.data" :key="post.id">
             <td>{{ post.id }}</td>
             <td>{{ post.tite }}</td>
             <td>{{ post.description }}</td>
         </tr>
      </tbody>
      </table>

      <pagination class="mt-6" :my-only="'posts'" :links="posts.links" />
   </div>
</template>

<script>
import Pagination from '../components/Pagination'
import { Link } from '@inertiajs/inertia-vue'
export default {
  components:{
    Pagination,
  },
    props :[
    'message',
    'posts',
    'users',
    ],
    data: ()=>{
        return {

        msg : 'how are',
        }

    }
};
</script>
