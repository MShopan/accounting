<template >
  <Layout >
      <div id="bar_tools" class="card  glass shadow-xl p-4 m-11 mb-1 flex items-start content-start">
          <button class="btn btn-sm btn-success" @click="addNewPost()">Add</button>
      </div>


      <div id="post-modal">
            <input class="modal-toggle" type="checkbox" id="my-modal-2"  v-model="showModal">
            <div class="modal">
           <div class="modal-box ">


             <form @submit.prevent="submit">
                <div class="form-control" >

                      <label class="label">
                            <span class="label-text">Title</span>
                        </label>

                    <input  type="text" class="input input-success " v-model="form.title" >

                </div>
                <div class="form-control">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>

                    <input type="text" class="input input-success" v-model="form.description">
                </div>

            <div class="modal-action flex content-center items-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <label @click="showModal = false" class="btn">Close</label>
            </div>

            </form>







        </div>
        </div>
      </div>

   <div  class=" card glass shadow-xl p-4 m-11 flex items-center content-center">


     <div class="card-title">posts</div>

     <table class=" table w-full table-compact ">
      <thead>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>tools</th>
        </tr>
      </thead>

      <tbody>
         <tr class="hover:text-accent" v-for="post in posts.data" :key="post.id">
             <td>{{ post.id }}</td>
             <td>{{ post.title }}</td>
             <td>{{ post.description }}</td>
             <td>
                 <button class="btn btn-sm btn-success " @click="editPost(post)">edit</button>
                 <button class="btn btn-sm btn-danger " @click="deletePost(post)">delete</button>
             </td>
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
import {globalMix} from '../globalMix.js'

export default {
  components:{
    Pagination,
    Layout ,



  },
  mixins :[globalMix],
    props :[

    'message',
    'posts',

    ],
    data: ()=>{
        return {
        showModal : false ,
        preserve: {preserveScroll: true  } ,
        msg : 'how are',
        success: false,
        form : {} ,
        }

    },
    mounted(){

     this.resetForm();

    },
    methods : {
        fireSuccess(){
            const event = new Event('dataSaved');
            window.dispatchEvent(event);
        },
        resetForm(){

            this.form = {
                id: -1 ,
                title : '',
                description : '',
                user_id : 1,
            };

        },
        deletePost(post){
             console.log(`delete ${post.id}`);

             this.startLoad();

            this.$inertia.post(`/myposts/delete`, { id : post.id} ,{
                ...this.preserve
               ,
               onBefore : event =>{
                  return confirm('are you sure to delete item');
               },
                onSuccess:page=>{
                    this.fireSuccess() ;
                    this.endLoad();

                }

              });
        },
        addNewPost(){
           this.resetForm();
           this.showModal=true;
        },
        editPost(post){

            this.form = JSON.parse(JSON.stringify(post)) ;
            this.showModal = true;
        },
        submit(){

           this.startLoad();


            if (this.form.id==-1) {
            // do create new
              this.$inertia.post('/myposts/create', this.form ,{
                ...this.preserve
               ,
                onSuccess:page=>{
                    this.fireSuccess() ;
                    this.resetForm();
                    this.showModal=false;
                    this.endLoad();

                }

              });

            }else{
            // do update
              this.$inertia.post('/myposts/edit', this.form ,{
                ...this.preserve
               ,
                onSuccess:page=>{
                    this.fireSuccess() ;
                    this.resetForm();
                    this.showModal=false;
                    this.endLoad();
                }

              });

            }

        }
    }
};
</script>
