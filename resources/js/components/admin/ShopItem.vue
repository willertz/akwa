<template>

    <div class="container">
        <v-snackbar
                v-model="snackbar"
                :bottom="y === 'bottom'"
                :left="x === 'left'"
                :multi-line="mode === 'multi-line'"
                :right="x === 'right'"
                :timeout="timeout"
                :top="true"
                :vertical="mode === 'vertical'"
        >
            Товар успешно удален!
            <v-btn
                    color="pink"
                    flat
                    @click="snackbar = false"
            >
                Close
            </v-btn>
        </v-snackbar>
        <div class="top-line-admin">
            <div>
                <h4>Управление товарами</h4>
            </div>
                <div class="top-line-btn-group">
                   <!-- <v-btn color="info" small>Добавить новый товар</v-btn> -->
                </div>

        </div>

        <v-btn color="success" block small :to="addItemLink">Добавить новый товар</v-btn>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                    <v-text-field
                            label="ID товара для редактирования"
                            outline
                            block
                            v-model="editorItemId"
                    ></v-text-field>
                    <v-btn color="info" small @click="openEditor()">Редактировать товар</v-btn>
            </div>
            <div class="col-md-6">
                    <v-text-field
                            label="ID товара для удаления"
                            outline
                            block
                            v-model="deleteItemId"
                    ></v-text-field>
                    <v-btn color="error" small @click="deleteItem()">Удалить товар</v-btn>
            </div>
        </div>
        <hr>
        <div class="container" v-if="enableEditor">
            <h5>Редактирование товара</h5>
            <br><br>
            <v-flex xs12>
                <v-text-field
                        label="Артикул"
                        outline
                        v-model="editItem.art"
                ></v-text-field>
            </v-flex>
            <v-flex xs12>
                <v-text-field
                        label="Название"
                        outline
                        v-model="editItem.name"
                ></v-text-field>
                <v-flex xs12>
                    <v-text-field
                            label="URL категории"
                            outline
                            v-model="editItem.category_url"
                    ></v-text-field>
                </v-flex>
            </v-flex>

                <v-flex xs12>
                    <v-text-field
                            label="ID главного товара (заполнять только для подтовара, иначе 0)"
                            outline
                            v-model="editItem.parent_id"
                    ></v-text-field>
                </v-flex>


            <v-flex xs12>
                <v-text-field
                        label="Сортировка"
                        outline
                        v-model="editItem.priority"
                ></v-text-field>
            </v-flex>
            <v-flex xs12>
                <v-text-field
                        label="Цена (RUB)"
                        outline
                        v-model="editItem.price"
                ></v-text-field>
            </v-flex>

            <v-flex xs12>
                <v-text-field
                        label="Цена (USD)"
                        outline
                        v-model="editItem.price_usd"
                ></v-text-field>
            </v-flex>

            <v-flex xs12>
                <v-text-field
                        label="Цена (EUR)"
                        outline
                        v-model="editItem.price_eur"
                ></v-text-field>
            </v-flex>

            <v-flex xs12>
                <v-text-field
                    label="Еденица измерения"
                    outline
                    v-model="editItem.unit"
                ></v-text-field>
            </v-flex>

                <v-flex xs12>
                    <div class="editblock">
                        <h4>Короткое описание</h4>
                        <tinymce id="d1"
                                 :other_options="tinyOptions"
                                 v-model="editItem.description"
                        ></tinymce>
                    </div>

                </v-flex>

                <v-flex xs12>
                    <div class="editblock">
                        <h4>Описание</h4>
                        <tinymce id="d2"
                                 :other_options="tinyOptions"
                                 v-model="editItem.full_description"
                        ></tinymce>
                    </div>

                </v-flex>

            </v-flex>
            <v-flex xs12>
                <v-text-field
                        label="Страна"
                        outline
                        v-model="editItem.country"
                ></v-text-field>
            </v-flex>

            <v-flex xs12>
                <input
                        v-model="preview"
                        type="text"
                        id="previewEditItem"
                        placeholder="URL фотографии"
                        disabled

                >
                <v-btn color="info" block small @click="openPopupImage()">Загрузить изображение</v-btn>

            </v-flex>

            <v-flex xs12>
                <v-textarea
                        outline
                        name="input-7-4"
                        label="Title для SEO"
                        v-model="editItem.meta_title"
                ></v-textarea>
            </v-flex>
            <v-flex xs12>
                <v-textarea
                        outline
                        name="input-7-4"
                        label="Описание для SEO (description)"
                        v-model="editItem.meta_description"
                ></v-textarea>
            </v-flex>
            <div> <v-btn color="success" @click="saveItem()">Сохранить</v-btn> </div>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };
    import Editor from '@tinymce/tinymce-vue';
    export default {
        name: "ShopItem",
        data: function() {
            return {
                addItemLink: '/home/create-item/',
                enableEditor: false,
                snackbar: false,
                y: 'top',
                x: 'right',
                mode: '',
                timeout: 6000,
                editorItemId: 0,
                deleteItemId: 0,
                editItem: null,
                preview: "",
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

                },
            }
        },
        methods: {
            saveItem: function() {
                var id = this.editItem.id;
                var art = this.editItem.art;
                var name = this.editItem.name;
                var price = this.editItem.price;
                var price_usd = this.editItem.price_usd;
                var price_eur = this.editItem.price_eur;
                var description = this.editItem.description;
                var full_description = this.editItem.full_description;
                var country = this.editItem.country;
                var preview = this.preview;
                var meta_title = this.editItem.meta_title;
                var meta_description = this.editItem.meta_description;
                var priority = this.editItem.priority;
                var parent_id = this.editItem.parent_id;
                var cat_url = this.editItem.category_url;
                var unit = this.editItem.unit;

                var test = axios.post('/api', {
                        apiMethod: 'saveItem',
                        id: id,
                        art: art,
                        name: name,
                        price: price,
                        price_usd: price_usd,
                        price_eur: price_eur,
                        description: description,
                        full_description: full_description,
                        country: country,
                        preview: preview,
                        meta_title: meta_title,
                        meta_description: meta_description,
                        priority: priority,
                        unit: unit,
                    parent_id: parent_id,
                    cat_url: cat_url
                    },
                ).then(response => console.log(success))
                    .catch(function (error) {
                        console.log(error)
                    });
                var url = '/home/shop-item';
                 location=url;

            },
            openPopupImage() {
                var self = this;
                CKFinder.popup( {
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function( finder ) {

                        finder.on( 'files:choose', function( evt ) {
                            var file = evt.data.files.first();
                            self.preview = file.getUrl();
                        } );

                        finder.on( 'file:choose:resizedImage', function( evt ) {
                            self.preview = evt.data.resizedUrl;
                        } );
                    }
                } );
            },
            openEditor: function() {
                var self = this;
                var data = axios.post('/api', {
                        apiMethod: 'loadItem',
                        id: this.editorItemId
                    },
                ).then(function(response) {
                    self.editItem = response.data
                    self.preview = response.data.preview;
                    console.log(response.data.main_item);
                })
                    .catch(function (error) {
                        console.log(error)
                    });
                this.enableEditor = true;
                console.log(self.editItem)
            },
            deleteItem: function() {
                axios.post('/api', {
                    apiMethod: 'deleteItem',
                    id: this.deleteItemId
                });
                this.snackbar = true
                this.deleteItemId = 0
            }
        }
    }
</script>

<style scoped>
.top-line-admin {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
}
    .top-line-btn-group {
        text-align: right;
    }
    .editblock {
        margin-bottom: 25px;
    }
</style>
