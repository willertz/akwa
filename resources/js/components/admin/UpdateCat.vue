<template>
    <div class="container">
        <h1>Редактирование категории</h1>
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
            <v-flex xs12>
                <v-text-field
                        label="Название"
                        outline
                        v-model="category.name"
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
                        v-model="category.title"
                ></v-text-field>
            </v-flex>

            <v-flex xs12>
                <v-textarea
                        outline
                        name="input-7-4"
                        label="Описание (description)"
                        v-model="category.description"
                ></v-textarea>
            </v-flex>



            <v-btn color="success" block small @click="updateCat()">Сохранить</v-btn>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };
    export default {
        name: "UpdateCat",
        data: function() {
            return {
                id: this.$route.params.id,
                category: "",
                snackbar: false,
                y: 'top',
                x: 'right',
                mode: '',
                timeout: 6000,
                text: 'Категория успешно отредактирована!',
            }
        },
        methods: {
            updateCat: function() {
                var preview = document.getElementById('previewEditItem').value;
                var self = this;
                axios.post('/api', {
                    id: this.id,
                        apiMethod: 'updateCat',
                        name: this.category.name,
                        title: this.category.title,
                        description: this.category.description,
                        preview: preview,
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
            loadCat: function() {
                var self = this;
                axios.post('/api', {
                        apiMethod: 'loadSingleCat',
                        id: this.id,
                    },
                )
                    .then(function (response) {
                        console.log('Success')
                        document.getElementById('previewEditItem').value = response.data.preview;
                        self.category = response.data
                    })
                    .catch(function (error) {
                        console.log(error)
                    });

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
        },
        mounted: function() {
            this.loadCat();
        }
    }
</script>

<style scoped>

</style>