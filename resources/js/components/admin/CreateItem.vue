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
            Товар успешно добавлен!
            <v-btn
                    color="pink"
                    flat
                    @click="snackbar = false"
            >
                Close
            </v-btn>
        </v-snackbar>

        <h1>Создание нового товара</h1>

        <v-flex xs12>
            <v-text-field
                    label="URL категории"
                    outline
                    v-model="category"
            ></v-text-field>
        </v-flex>
        <v-flex xs12>
            <v-text-field
                    label="ID главного товара (заполнять только для подтовара, иначе 0)"
                    outline
                    v-model="majorId"
            ></v-text-field>
        </v-flex>
        <v-flex xs12>
            <v-text-field
                    label="Артикул"
                    outline
                    v-model="art"
            ></v-text-field>
        </v-flex>

        <v-flex xs12>
            <v-text-field
                    label="Имя"
                    outline
                    v-model="name"
            ></v-text-field>
        </v-flex>
        <v-flex xs12>
            <v-text-field
                    label="Сортировка"
                    outline
                    v-model="priority"
            ></v-text-field>
        </v-flex>
        <v-flex xs12>
            <v-text-field
                    label="Цена (RUB)"
                    outline
                    v-model="price"
            ></v-text-field>
        </v-flex>

        <v-flex xs12>
            <v-text-field
                    label="Цена (Доллары)"
                    outline
                    v-model="price_usd"
            ></v-text-field>
        </v-flex>

        <v-flex xs12>
            <v-text-field
                    label="Цена (Евро)"
                    outline
                    v-model="price_eur"
            ></v-text-field>
        </v-flex>

        <v-flex xs12>
            <v-text-field
                label="Еденица измерения"
                outline
                v-model="unit"
            ></v-text-field>
        </v-flex>

        <v-flex xs12>
            <div class="editblock">
                <h4>Короткое описание</h4>
                <tinymce id="d1"
                         :other_options="tinyOptions"
                         v-model="description"
                ></tinymce>
            </div>

        </v-flex>

        <v-flex xs12>
            <div class="editblock">
                <h4>Описание</h4>
                <tinymce id="d2"
                         :other_options="tinyOptions"
                         v-model="full_description"
                ></tinymce>
            </div>

        </v-flex>


        <v-flex xs12>
            <v-text-field
                    label="Страна"
                    outline
                    v-model="country"
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
            <v-textarea
                    outline
                    name="input-7-4"
                    label="Title для SEO"
                    v-model="meta_title"
            ></v-textarea>
        </v-flex>
        <v-flex xs12>
            <v-textarea
                    outline
                    name="input-7-4"
                    label="Описание для SEO (description)"
                    v-model="meta_description"
            ></v-textarea>
        </v-flex>
        <div> <v-btn color="success" @click="saveItem()">Сохранить</v-btn> </div>

    </div>
</template>

<script>
    import Editor from '@tinymce/tinymce-vue';
    export default {
        name: "CreateItem",
        data: function() {
          return {
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
              category: "",
              art: "",
              name: "",
              price: "",
              unit: "шт",
              price_usd: "",
              price_eur: "",
              priority: "",
              description: "",
              full_description: "",
              country: "",
              meta_title: "",
              meta_description: "",
              snackbar: false,
              y: 'top',
              x: 'right',
              mode: '',
              timeout: 6000,
              majorId: ""
          }
        },
        methods: {
            saveItem: function() {
                var art = this.art;
                var name = this.name;
                var price = this.price;
                var price_usd = this.price_usd;
                var price_eur = this.price_eur;
                var unit = this.unit;
                var description = this.description;
                var full_description = this.full_description;
                var country = this.country;
                var preview = document.getElementById('previewEditItem').value;
                var meta_title = this.meta_title;
                var meta_description = this.meta_description;
                var category = this.category;
                 var priority = this.priority;
                 var majorId = this.majorId;

                var test = axios.post('/api', {
                        apiMethod: 'saveNewItem',
                        art: art,
                        category: category,
                        priority: priority,
                        name: name,
                        price: price,
                        unit: unit,
                        price_usd: price_usd,
                        price_eur: price_eur,
                        description: description,
                        full_description: full_description,
                        country: country,
                        preview: preview,
                        meta_title: meta_title,
                        meta_description: meta_description,
                        majorId: majorId
                    },
                ).then(response => console.log(success))
                    .catch(function (error) {
                        console.log(error)
                    });
                console.log(test);
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
                            var output = document.getElementById('previewEditItem');
                            output.value = file.getUrl();
                        } );

                        finder.on( 'file:choose:resizedImage', function( evt ) {
                            var output = document.getElementById('previewEditItem');
                            output.value = evt.data.resizedUrl;
                        } );
                    }
                } );
            },
        },

    }
</script>

<style scoped>

    .editblock {
        margin-bottom: 25px;
    }
</style>

