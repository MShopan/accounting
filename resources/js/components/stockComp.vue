<template>

    <div class="container m-auto ">

     <partition-form
     :formData="formData"
     :show="showForm"
     @closeForm="showForm=false"
     @modelChanged="getModels()"
     > </partition-form>

        <div id="card" class="card shadow-sm m-8 p-8 glass flex content-center justify-center">


        <div id="main-table">
            <table class="table  table-sm w-full">
                <thead>
                    <tr>
                    <th>{{$t('acc.id')}}</th>
                    <th>{{$t('acc.product')}}</th>
                    <th>{{$t('acc.quant')}}</th>
                    <th>{{$t('acc.creator')}}</th>
                    <th>{{$t('acc.notes')}}</th>

                    </tr>
                </thead>
                <tbody>

                    <tr class="hover:text-accent" v-for="model in models.data" :key="model.id">
                      <td>{{ model.id }}</td>
                      <td>{{ model.product_name }}</td>
                      <td>{{ model.quant }}</td>
                      <td>{{ model.creator_name }}</td>
                      <td>{{ model.notes }}</td>


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
          modelName : 'Partition',
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
			axios.get(`api/get_stock?page=${page}` )
				.then(res => {
					this.models = res.data;
                    this.handel_models();
                    // console.log(res.data);
                    this.endLoad();

				});
      },
      handel_models(){
        //   this.models.data.forEach( per => {
        //       if(per.creator == 0){
        //           per.creator == "system";
        //       }
        //   });
      },
      fireAssign(element){
           this.$emit('assignPartition' , element );
      },
      resetForm(){
        this.formData = {
            id : -1 ,
            name:'',
            treat:'',
            coad:'',
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
