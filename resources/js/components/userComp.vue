<template>

    <div class="container m-auto ">
        <div id="card" class="card m-8 p-8 glass flex content-center justify-center">
        <form id="search-form" @submit.prevent="getUsers" class="m-4">
            <input type="text" class="input input-sm input-success" v-model="search" />
            <button class="btn btn-sm btn-success mx-4" @click="getUsers()"> {{$t('acc.search')}}</button>
        </form>

        <div id="main-table">
            <table class="table  table-sm w-full">
                <thead>
                    <tr>

                    <th>{{$t('acc.id')}}</th>
                    <th>{{$t('acc.name')}}</th>
                    <th>{{$t('acc.email')}}</th>
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
                    <div v-if="users.data">
                      <div v-if="users.data.length == 0" class="flex w-full content-center justify-center items-center  bg-blue-300 ">
                          <div>no data</div> </div>
                    </div>
        </div>

          <div class="flex content-center justify-center m-4">

          <pagination-api :links="users.links" @pagination-change-page="getUsers"></pagination-api>
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
          users : Object ,
          search : '',
      }
  },
  mounted(){
       this.getUsers();
  }
  ,
  methods :{
      getUsers(page=1){
           this.startLoad();
			axios.get(`api/myusers?search=${this.search}&page=${page}` )
				.then(res => {
					this.users = res.data.users;
                    this.endLoad();

				});
      }
  }
}
</script>
