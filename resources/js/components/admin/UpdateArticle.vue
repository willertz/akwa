<template>
    <div class="container">
        <h1>Редактирование статьи</h1>
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

        <v-flex xs12>
            <v-text-field
                    label="Название"
                    outline
                    v-model="name"
            ></v-text-field>
        </v-flex>

        <v-flex xs12>
            <v-text-field
                    label="Title (SEO)"
                    outline
                    v-model="title"
            ></v-text-field>
        </v-flex>

        <v-flex xs12>
            <v-textarea
                    outline
                    name="input-7-4"
                    label="Описание (description)"
                    v-model="description"
            ></v-textarea>
        </v-flex>

        <h3>Содержание</h3>
        <tinymce id="d1"
                 :other_options="tinyOptions"
                 v-model="content"
        ></tinymce>
        <v-btn color="success" block small @click="updateArticle()">Сохранить</v-btn>
    </div>
</template>

<script>
    import Editor from '@tinymce/tinymce-vue';
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };

    export default {
        name: "UpdateArticle",
        data: function() {
            return {
                snackbar: false,
                y: 'top',
                x: 'right',
                mode: '',
                timeout: 6000,
                text: 'Статья успешно изменена!',
                id: this.$route.params.id,
                name: "",
                title: "",
                description: "",
                content: "",
                tinyOptions: {
                    'height': 500,
                    language_url: '/langs/ru.js',
                    plugins: [
                        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                        "insertdatetime media nonbreaking save table contextmenu directionality",
                        "emoticons template paste textcolor colorpicker textpattern"
                    ],
                    toolbar: ' undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                    images_upload_url: '/upload-image',


                }
            }

        },
        methods: {
            updateArticle: function() {
                var id = this.id;
                var name = this.name;
                var title = this.title;
                var description = this.description;
                var content = this.content;


                var test = axios.post('/api', {
                        apiMethod: 'updateArticle',
                        id: id,
                        name: name,
                        title: title,
                        description: description,
                        content: content
                    },
                ).then(response => console.log(success))
                    .catch(function (error) {
                        console.log(error)
                    });
                console.log(test);

                this.snackbar = true;
            },
            loadArticle: function() {
                var self = this;
                axios.post('/api', {
                        apiMethod: 'loadSingleArt',
                        id: this.id,
                    },
                )
                    .then(function (response) {
                        self.name = response.data[0].name
                        self.title = response.data[0].title
                        self.description = response.data[0].description
                        self.content = response.data[0].content
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            }
        },
        mounted: function() {
            this.loadArticle();
        }
    }
</script>

<style scoped>

</style>