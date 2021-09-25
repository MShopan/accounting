<template>

    <div class="container m-auto ">
             <product-form
     :formData="formData"
     :show="showForm"
     @closeForm="showForm=false"
     @modelChanged="getModels()"
     :partitions="partitions"
     :cats="cats"
     > </product-form>

                 <!-- show header dorp down  -->
            <div class="dropdown mx-12">
            <div v-if="showOptions.HeadersDropdown" tabindex="0" class="m-1 btn btn-sm btn-info">Headers</div>
            <div class="">
            <ul tabindex="0" class=" p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                <li v-for="(head , key) in showHeaders" :key="key" >
                 <span class="flex justify-between items-center">
                     {{key}}

                <input type="checkbox"  class="checkbox checkbox-primary"
                v-model="showHeaders[key]"
                @click="saveHeaders()"
                >

                </span>

                </li>



            </ul>
            </div>
            </div>

        <div id="card" class="card shadow-sm m-8 p-8 glass flex content-center justify-center">
        <form id="search-form" @submit.prevent="getModels" class="m-4">
            <input type="text" class="input input-sm input-success" v-model="search" />
            <button class="btn btn-sm btn-success mx-4" @click="getModels()"> search</button>

            <add-btn
            v-if="showOptions.addBtn"

            @click="addNew()"></add-btn>




        </form>

        <div id="main-table" class="overflow-x-auto">
            <table class="table  table-sm w-full ">
                <thead>
                    <tr>

                    <th v-if="showHeaders.id">id</th>
                    <th v-if="showHeaders.coad">coad</th>
                    <th v-if="showHeaders.name">name</th>
                    <th v-if="showHeaders.price">price</th>
                    <th v-if="showHeaders.category">category</th>
                    <th v-if="showHeaders.popular">popular</th>
                    <th v-if="showHeaders.stock">stock</th>
                    <th v-if="showHeaders.min_stock">min stock</th>
                    <th v-if="showHeaders.created_at">created_at</th>
                    <th v-if="showHeaders.updated_at">updated_at</th>
                    <th v-if="showHeaders.notes">notes</th>

                    <th>tools</th>

                    </tr>
                </thead>
                <tbody>

                    <tr class="move hover:text-accent"
                    v-for="(model , key) in models.data" :key="model.id"
                    :tabindex="model.id"
                    :id="`el${key}`"
                    @click="fireAssign(model)"
                    v-on:keyup.enter="fireAssign(model)" >


                      <td v-if="showHeaders.id">{{ model.id }}</td>
                      <td v-if="showHeaders.coad">{{ model.coad }}</td>
                      <td v-if="showHeaders.name">{{ model.name }}</td>
                      <!-- price  -->
                      <td v-if="showHeaders.price">
                          <ul>
                              <li v-for="price in model.prices" :key="price.id">
                                  <div class="w-min px-4 mb-2 bg-gray-600 text-white rounded-full shadow-sm">
                                     {{ getPartitionName(price.partition_id) }} : {{ price.price }}

                                  </div>
                              </li>
                          </ul>
                      </td>

                      <td v-if="showHeaders.category">{{ getCatName(model.cat_id) }}</td>

                      <td v-if="showHeaders.popular">{{ model.popular }}</td>
                      <td v-if="showHeaders.stock">{{ model.stock }}</td>
                      <td v-if="showHeaders.min_stock">{{ model.min_stock }}</td>
                      <td v-if="showHeaders.created_at">{{ formateDatetime(model.created_at) }}</td>
                      <td v-if="showHeaders.updated_at">{{ formateDatetime(model.updated_at) }}</td>
                      <td v-if="showHeaders.notes">{{ model.notes }}</td>

                       <!-- tools  -->
                      <td class="w-auto">
                          <assign-btn
                          v-if="showOptions.assignBtn"
                           @click="fireAssign(model)"></assign-btn>

                          <edit-btn
                          v-if="showOptions.editBtn"
                          @click="editModel(model)"></edit-btn>

                          <delete-btn
                          v-if="showOptions.deleteBtn"
                          @click="deleteModel(modelName,model.id,getModels)"></delete-btn>
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
import  { globalMix } from '../globalMix'
import AddBtn from './btns/addBtn.vue';
import EditBtn from './btns/editBtn.vue';
import AssignBtn from './btns/assignBtn.vue';
import DeleteBtn from './btns/deleteBtn.vue';
import productForm from './forms/productForm.vue';

const lang = {
    'en' :{
       'search' : 'searcho'
    }
};

export default {
    props : ['mode' , 'billing'],
    components :{
        paginationApi,
        AddBtn,
        EditBtn,
        AssignBtn,
        DeleteBtn,
        productForm,
    },
    mixins :[
       globalMix,
    ],
  data :()=>{
      return {
          models : Object ,
          partitions : Object ,
          modelName : 'Product',

          cats : Object ,
          search : '',
          showForm : false ,
          formData : Object,

          showHeaders : {
              id :true,
              name :true  ,
              coad :true  ,
              price :true  ,
              category :true  ,
              popular :true  ,
              stock :true  ,
              min_stock :true  ,
              created_at :false  ,
              updated_at :false  ,
              notes :true  ,
          } ,
          showOptions :{
              addBtn : true,
              editBtn :true ,
              deleteBtn : true ,
              assignBtn : true,
              HeadersDropdown : true ,
          }


      }
  },
  async mounted(){

      if (this.mode == 'assign') {
            this.showOptions = {
              addBtn : false,
              editBtn :false ,
              deleteBtn : false ,
              assignBtn : true,
              HeadersDropdown : false ,
          };

           this.showHeaders = {
              id :true,
              name :true  ,
              coad :true  ,
              price :true  ,
              category :false  ,
              popular :false  ,
              stock :true  ,
              min_stock :false  ,
              created_at :false  ,
              updated_at :false  ,
              notes :false  ,
           };
      }

       await this.getModels();
       this.resetForm();
       this.setMove();

       this.loadShowHeaders();



  }
  ,
  methods :{
      getModels(page=1){
           this.startLoad();
			axios.get(`api/products?search=${this.search}&page=${page}` )
				.then(res => {
					this.models = res.data.products;
					this.cats = res.data.cats;
					this.partitions = res.data.partitions;
                    this.endLoad();

				});
      },
      async fireAssign(element){
          console.log('fire is running');
          if (this.billing == true) {
              console.log('billing is running');


                const { value: quant } = await this.$swal.fire({
                title:'quantitly',
                input: 'number',
                inputLabel: 'enter quantitiy',
                inputPlaceholder: 'enter quantity '
                })

                if (quant) {
                    element.quant = quant ;
                    this.$emit('assignProduct' , element );
                }


          } else {
              // else if billing mode not used in component

              this.$emit('assignProduct' , element );
          }

      },
      saveHeaders(){
          setTimeout(() => {
              localStorage.setItem('productHeader',JSON.stringify(this.showHeaders));
          }, 1000);
      },
      loadShowHeaders(){
          if (this.mode=='basic') {
                        let localHeaders = localStorage.getItem('productHeader') ;
                        if(localHeaders!=null){
                            this.showHeaders = JSON.parse(localHeaders) ;
                        } else {
                            // do nothing because show header alredy declared in data
                        }
          }

      },
      getPartitionName(id){

           let name = this.partitions.filter(el => el.id == id )[0]['name'] ;

           return name;

      },
      getCatName(id){

           let name = this.cats.filter(el => el.id == id )[0]['name'] ;

           return name;

      },
      resetForm(){
        this.formData = {
            id : -1 ,
            name:'',
            cat:'',
            coad:'',
            prices : [

            ] ,
            popular : 0 ,
            min_stock : 0,

        }


      },
      addNew(){
          this.resetForm()
          this.showForm = true;
      },
       editModel(model) {
           this.formData = model
           this.showForm = true
      },
      setMove(){
          window.addEventListener('keyup',function(e){
                if (e.keyCode == 39) {
                    console.log(39);
                    window.document.querySelector(".move").next().focus();

                }
                if (e.keyCode == 37) {
                    console.log(37);
                    window.document.querySelector(".move").prev().focus();

                }
          })
      }
  }
}
</script>
