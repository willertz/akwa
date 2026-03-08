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
        <h1>Управление объектами</h1>
        <v-btn color="success" block small :to="newLink">Добавить новый объект</v-btn>
        <br><br>
        <v-card>
            <v-card-title>
                Объекты
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
                    :items="articles"
                    :search="search"
            >
                <template v-slot:items="props">
                    <td><a :href="props.item.url">{{ props.item.name }}</a></td>
                    <td class="text-xs-right"><v-btn color="success" small :to="getUpdateLink(props.item.id)"><v-icon>border_color</v-icon></v-btn></td>
                    <td class="text-xs-right"><v-btn color="error" small @click="deleteArticle(props.item.id)"><v-icon>restore_from_trash</v-icon></v-btn></td>
                </template>
                <v-alert v-slot:no-results :value="true" color="error" icon="warning">
                    Вы искали "{{ search }}" но результатов не найдено
                </v-alert>
            </v-data-table>
        </v-card>
    </div>
</template>

<script>
    export default {
        name: "Objects",
        data: function() {
            return {
                articles: [],
                newLink: '/home/new-obj/',
                snackbar: false,
                y: 'top',
                x: 'right',
                mode: '',
                timeout: 6000,
                text: 'Объект успешно удален!',
                headers: [
                    {
                        text: 'Название',
                        align: 'left',
                        sortable: false,
                        value: 'name'
                    },
                    {
                        text: 'Изменить',
                        align: 'center',
                        sortable: false,
                    },
                    {
                        text: 'Удалить',
                        align: 'center',
                        sortable: false,
                    },
                ],
            }
        },
        methods: {
            getUpdateLink(id) {
                return '/home/update-obj/' + id;
            },
            deleteArticle(id) {
                axios.post('/api', {
                        apiMethod: 'deleteObj',
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
            loadArticles() {
                var self = this;
                axios.post('/api', {
                        apiMethod: 'loadAllObj',
                    },
                )
                    .then(function(response) {
                        self.articles = response.data;

                    })
                    .catch(function (error) {
                        // console.log(error)
                    });
                console.log(self.articles)
            }
        },
        mounted: function() {
            this.loadArticles();
        }
    }
</script>

<style scoped>

</style>