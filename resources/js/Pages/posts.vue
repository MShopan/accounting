<template >
  <Layout>
   <div  class=" card glass shadow-xl p-4 m-11 flex items-center content-center">


     <div class="card-title">posts</div>

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
             <td>{{ post.title }}</td>
             <td>{{ post.description }}</td>
         </tr>
      </tbody>
      </table>

      <pagination class="mt-6" :my-only="'posts'" :links="posts.links" />


   </div>
  </Layout>
</template>

<script>
import Layout from './layout'
import Pagination from '../components/Pagination'
import { Link } from '@inertiajs/inertia-vue'

export default {
  components:{
    Pagination,
    Layout,
  },
    props :[

    'message',
    'posts',

    ],
    data: ()=>{
        return {

        msg : 'how are',
        }

    }
};
</script>
