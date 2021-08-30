<template >
<Layout>
   <div  class=" w-full flex flex-col content-center items-center ">

     <button class="btn btn-success">
         add
     </button>


      message : <input class="input input-sm input-primary" v-model="msg" />

      <h1>users</h1>
      <table  class="table w-full table-compact">
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

   </div>
</Layout>
</template>

<script>
import Layout from './layout'
import Pagination from '../components/Pagination'
export default {
  components:{
    Pagination,
    Layout
  },
    props :[
    'message',
    'users',
    ],
    data: ()=>{
        return {

        msg : 'how are',
        }

    }
};
</script>
