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
        <h1>Добавление новой категории</h1>

        <v-flex xs12>
            <v-text-field
                    label="Название"
                    outline
                    v-model="name"
            ></v-text-field>
        </v-flex>


        <v-flex xs12>
            <input
                    type="text"
                    id="previewEditItem"
                    placeholder="URL фотографии"
                    disabled

            >
            <v-btn color="info" block small @click="openPopupImage()">Загрузить изображение</v-btn>

        </v-flex>

        <v-flex xs12>
            <v-text-field
                    label="Title"
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



        <v-btn color="success" block small @click="addNewCat()">Сохранить</v-btn>
    </div>
</template>

<script>
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };

    export default {
        name: "NewCat",
        data: function() {
            return {
                parentId: this.$route.params.parent,
                name: "",
                title: "",
                description: "",
                snackbar: false,
                y: 'top',
                x: 'right',
                mode: '',
                timeout: 6000,
                text: 'Категория успешно добавлена!',
            }
        },
        methods:  {
            addNewCat: function() {
                var preview = document.getElementById('previewEditItem').value;
                var self = this;
                axios.post('/api', {
                        apiMethod: 'addNewCat',
                        name: this.name,
                        title: this.title,
                        description: this.description,
                        preview: preview,
                        parent_id: this.parentId,
                    },
                )
                    .then(function (response) {
                        console.log('Success')
                        self.name = "";
                        document.getElementById('previewEditItem').value = "";
                        self.description = "";
                        self.title = "";
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
                this.snackbar = true;
            },
            openPopupImage() {
                CKFinder.popup( {
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function( finder ) {

                        finder.on( 'files:choose', function( evt ) {
                            var file = evt.data.files.first();
                            document.getElementById('previewEditItem').value = file.getUrl();
                        } );

                        finder.on( 'file:choose:resizedImage', function( evt ) {
                            document.getElementById('previewEditItem').value = evt.data.resizedUrl;
                        } );
                    }
                } );
            },
        }
    }
</script>

<style scoped>
    #previewEditItem {
        width: 100%;
        height: 40px;
    }
</style>
