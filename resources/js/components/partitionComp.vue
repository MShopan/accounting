<template>

    <div class="container m-auto ">

     <partition-form :formData="formData" :show="showForm" @closeForm="showForm=false"> </partition-form>

        <div id="card" class="card shadow-sm m-8 p-8 glass flex content-center justify-center">
        <form id="search-form" @submit.prevent="getModels" class="m-4">
            <input type="text" class="input input-sm input-success" v-model="search" />
            <button class="btn btn-sm btn-success mx-4" @click="getModels()"> search</button>

            <add-btn @click="addNew()"></add-btn>
        </form>

        <div id="main-table">
            <table class="table  table-sm w-full">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>coad</th>
                    <th>name</th>
                    <th>treat</th>
                    <th>tools</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="hover:text-accent" v-for="model in models.data" :key="model.id">
                      <td>{{ model.id }}</td>
                      <td>{{ model.coad }}</td>
                      <td>{{ model.name }}</td>
                      <td>{{ model.treat }}</td>
                      <td>

                          <assign-btn @click="fireAssign(model)"></assign-btn>
                          <edit-btn @click="editModel(model)"></edit-btn>
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
import AddBtn from './btns/addBtn.vue';
import EditBtn from './btns/editBtn.vue';
import AssignBtn from './btns/assignBtn.vue';
import DeleteBtn from './btns/deleteBtn.vue';
import PartitionForm from './forms/partitionForm.vue';

const lang = {
    'en' :{
       'search' : 'searcho'
    }
};

export default {
    components :{
        paginationApi,
        AddBtn,
        EditBtn,
        AssignBtn,
        DeleteBtn,
        PartitionForm,
    },
    mixins
        :[
       globalMix,
    ],
  data :()=>{
      return {
          models : Object ,
          search : '',
          showForm : false ,
          formData : Object
      }
  },
  mounted(){
       this.resetForm();
       this.getModels();
  }
  ,
  watch:{
      search : function(_old,_new ){
          const live = false ;
          if(live){this.getModels()}
      }
  },
  methods :{
      getModels(page=1){
           this.startLoad();
			axios.get(`api/partitions?search=${this.search}&page=${page}` )
				.then(res => {
					this.models = res.data.partitions;
                    this.endLoad();

				});
      },
      fireAssign(element){
           this.$emit('assignPartition' , element );
      },
      resetForm(){
        this.formData = {
            id : -1 ,
            name:'',
            treat:''
        }
      },
      addNew(){
          this.resetForm()
          this.showForm = true;
      },
       editModel(model) {
           this.formData = model
           this.showForm = true
      }
  }
}
</script>
