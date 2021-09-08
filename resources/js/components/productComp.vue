<template>

    <div class="container m-auto ">
        <div id="card" class="card shadow-sm m-8 p-8 glass flex content-center justify-center">
        <form id="search-form" @submit.prevent="getModels" class="m-4">
            <input type="text" class="input input-sm input-success" v-model="search" />
            <button class="btn btn-sm btn-success mx-4" @click="getModels()"> search</button>
        </form>

        <div id="main-table">
            <table class="table  table-sm w-full">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>coad</th>
                    <th>name</th>
                    <th>price</th>
                    <th>category</th>

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
                      <td>{{ model.id }}</td>
                      <td>{{ model.coad }}</td>
                      <td>{{ model.name }}</td>
                      <td>
                          <ul>
                              <li v-for="price in model.prices" :key="price.id">
                                  <div class="w-min px-4 mb-2 bg-gray-600 text-white rounded-full shadow-sm">
                                     {{ getPartitionName(price.partition_id) }} : {{ price.price }}

                                  </div>
                              </li>
                          </ul>
                      </td>
                      <td>{{ getCatName(model.cat_id) }}</td>

                      <td>
                          <button class="btn btn-sm btn-primary" @click="fireAssign(model)">assign</button>
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

const lang = {
    'en' :{
       'search' : 'searcho'
    }
};

export default {
    components :{
        paginationApi,
    },
    mixins :[
       globalMix,
    ],
  data :()=>{
      return {
          models : Object ,
          partitions : Object ,
          cats : Object ,
          search : '',
      }
  },
  mounted(){
       this.getModels();
       this.setMove();
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
      fireAssign(element){
           this.$emit('assignProduct' , element );

      },
      getPartitionName(id){

           let name = this.partitions.filter(el => el.id == id )[0]['name'] ;

           return name;

      },
      getCatName(id){

           let name = this.cats.filter(el => el.id == id )[0]['name'] ;

           return name;

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
