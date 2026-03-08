<template>
    <div class="container">
        <v-snackbar
                v-model="snackbar"
                :bottom="y === 'bottom'"
                :left="x === 'left'"
                :multi-line="mode === 'multi-line'"
                :right="x === 'right'"
                :timeout="timeout"
                :top="y === 'top'"
                :vertical="mode === 'vertical'"
        >
            {{ text }}
            <v-btn
                    color="pink"
                    flat
                    @click="snackbar = false"
            >
                Close
            </v-btn>
        </v-snackbar>

        <v-btn color="success" block small :to="getNewCatLink(-1)">Добавить новую категорию</v-btn>
           <br><br><br>
            <v-card>
                <v-card-title>
                    Категории
                    <v-spacer></v-spacer>
                    <v-text-field
                            v-model="search"
                            append-icon="search"
                            label="Поиск"
                            single-line
                            hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table
                        :headers="headers"
                        :items="categories"
                        :search="search"
                >
                    <template v-slot:items="props">
                        <td><a :href="props.item.url">{{ props.item.name }}</a></td>
                        <td class="text-xs-right"><v-btn color="info" small :to="getNewCatLink(props.item.id)"><v-icon>note_add</v-icon></v-btn></td>
                        <td class="text-xs-right"><v-btn color="success" small :to="getUpdateLink(props.item.id)"><v-icon>border_color</v-icon></v-btn></td>
                        <td class="text-xs-right"><v-btn color="error" small @click="deleteCategory(props.item.id)"><v-icon>restore_from_trash</v-icon></v-btn></td>
                    </template>
                    <v-alert v-slot:no-results :value="true" color="error" icon="warning">
                        Вы искали "{{ search }}" но результатов не найдено
                    </v-alert>
                </v-data-table>
            </v-card>
    </div>
</template>

<script>
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };
    export default {
        name: "ShopCategory",
        methods: {
            deleteCategory(id) {
                axios.post('/api', {
                        apiMethod: 'deleteCat',
                        id: id
                    },
                )
                    .then(function(response) {


                    })
                    .catch(function (error) {
                        // console.log(error)
                    });
                this.snackbar = true;
            },
            getNewCatLink(parentId) {
              return '/home/new-cat/' + parentId
            },
            getUpdateLink(id) {
              return '/home/update-cat/' + id;
            },
          loadCategory() {
              var self = this;
              axios.post('/api', {
                      apiMethod: 'loadCat',
                  },
              )
                  .then(function(response) {
                      self.categories = response.data;

                  })
                  .catch(function (error) {
                      // console.log(error)
                  });
              console.log(self.categories)
          }
        },
        mounted: function() {
          this.loadCategory();
        },
        data () {
            return {
                search: '',
                snackbar: false,
                y: 'top',
                x: 'right',
                mode: '',
                timeout: 6000,
                text: 'Категория успешно удалена!',
                headers: [
                    {
                        text: 'Название',
                        align: 'left',
                        sortable: false,
                        value: 'name'
                    },
                    {
                        text: 'Добавить подкатегорию',
                        align: 'center',
                        sortable: false,

                    },
                    {
                        text: 'Изменить категорию',
                        align: 'center',
                        sortable: false,
                    },
                    {
                        text: 'Удалить категорию',
                        align: 'center',
                        sortable: false,
                    },
                ],
                categories: [],
            }
        }

    }
</script>

<style scoped>

</style>