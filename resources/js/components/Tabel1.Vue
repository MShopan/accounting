<template>
<div >
<div> {{appName}} {{Age}} </div>
<vs-button border @click="increaseAge">add age</vs-button>
    <vs-table>
                <template #thead>
                <vs-tr>
                    <vs-th>
                    {{ $route.params.name }}
                    </vs-th>
                    <vs-th>
                    Emailooo
                    </vs-th>
                    <vs-th>
                    Id
                    </vs-th>
                </vs-tr>
                </template>
        <template #tbody>
        <vs-tr
            :key="i"
            v-for="(tr, i) in users"
            :data="tr"
        >
            <vs-td>
            {{ tr.name }}
            </vs-td>
            <vs-td>
            {{ tr.email }}
            </vs-td>
            <vs-td>
            {{ tr.id }}
            </vs-td>
        </vs-tr>
        </template>
    </vs-table>
    </div>

</template>



   <script>
import {globalMix} from '../globalMix.js';
import {_config} from '../config.js';
    export default {
    name: 'Tabel1',
    mixins :[globalMix],
      data:() => ({
        appName : _config.appName ,
        users: [
          {
            "id": 1,
            "name": "Leanne Graham",
            "username": "Bret",
            "email": "Sincere@april.biz",
            "website": "hildegard.org",
          },
          {
            "id": 2,
            "name": "Ervin Howell",
            "username": "Antonette",
            "email": "Shanna@melissa.tv",
            "website": "anastasia.net",
          },
          {
            "id": 3,
            "name": "Clementine Bauch",
            "username": "Samantha",
            "email": "Nathan@yesenia.net",
            "website": "ramiro.info",
          },

        ]
      }),
      methods : {
        increaseAge(){
          this.Age = this.Age + 1 ;
        }
      }
    }
    </script>

