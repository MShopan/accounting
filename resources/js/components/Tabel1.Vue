<template>

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
</template>



   <script>
    export default {
    name: 'Tabel1',
      data:() => ({
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
      })
    }
    </script>

