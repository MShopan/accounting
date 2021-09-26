<template>

    <div class="container m-auto ">
        <div id="card" class="card shadow-sm m-8 p-8 glass flex content-center justify-center">
        <form id="search-form" @submit.prevent="getModels" class="m-4">
            <input type="text" class="input input-sm input-success" v-model="search" />
            <button class="btn btn-sm btn-success mx-4" v-on:click="getModels()"> search</button>
        </form>

        <div id="main-table">
            <table class="table  table-sm w-full">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>mobile</th>
                    <th>tools</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="hover:text-accent" v-for="model in models.data" :key="model.id">
                      <td>{{ model.id }}</td>
                      <td>{{ model.name }}</td>
                      <td>{{ model.mobile }}</td>
                      <td>
                         <assign-btn @click="fireAssign(model)"></assign-btn>
                         <edit-btn></edit-btn>
                         <delete-btn></delete-btn>
                      </td>
                    </tr>
                </tbody>
            </table>
                    <div v-if="models.data">
                      <div v-if="models.data.length == 0" class="flex w-full content-center justify-center items-center  bg-blue-300 ">
                          <div>no data</div> </div>
                    </div>
        </div>

          <div class="flex content-center justify-center m-4">

          <pagination-api :links="models.links" @pagination-change-page="getModels"></pagination-api>
          </div>

       </div>
    </div>

</template>

<script>
import paginationApi from './PaginationApi.vue'
import golbalMix, { globalMix } from '../globalMix'
import AssignBtn from './btns/assignBtn.vue';
import EditBtn from './btns/editBtn.vue';
import DeleteBtn from './btns/deleteBtn.vue';

const lang = {
    'en' :{
       'search' : 'searcho'
    }
};

export default {
    props : ['mode'] ,
    components :{
        paginationApi,
        AssignBtn,
        DeleteBtn,
        EditBtn,
    },


     mixins
         :[
       globalMix,
    ],
  data :()=>{
      return {
          models : Object ,
          search : '',
      }
  },
  mounted(){
       this.getModels();
  }
  ,
  methods :{
      getModels(page=1){
           this.startLoad();
			axios.get(`api/customers?search=${this.search}&page=${page}` )
				.then(res => {
					this.models = res.data.customers;
                    this.endLoad();

				});
      },
      fireAssign(element){
           this.$emit('assignCustomer' , element );
      }
  }
}
</script>
