<template>
    <div class="container">
        <h1>Добавление объекта</h1>
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
<br><br>
        <v-flex xs12>
            <input
                    v-model="preview_pict"
                    type="text"
                    id="previewEditItem"
                    placeholder="URL фотографии"
                    disabled

            >
            <v-btn color="info" block small @click="openPopupImage()">Загрузить изображение</v-btn>

        </v-flex>
        <hr>
        <h3>Галерея</h3>
        <v-btn color="success" block @click="openPopupImage2()">Добавить</v-btn><br>
        <div id="img-box" v-for="(img,key) in slider">
            <img :src="img"><br>
            <v-btn color="success" block v-on:click="slider.splice(key, 1)">Удалить</v-btn>
        </div>
<br><br>
        <v-btn color="info" block @click="updateObject()">Сохранить объект</v-btn><br>

    </div>
</template>

<script>
    export default {
        name: "NewObject",
        data: function() {
            return {
                slider: [],
                snackbar: false,
                y: 'top',
                x: 'right',
                mode: '',
                timeout: 6000,
                text: 'Объект успешно добавлен!',
                name: "",
                title: "",
                description: "",
                content: "",
                preview_pict: "",
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
            updateObject: function() {
                var name = this.name;
                var title = this.title;
                var description = this.description;
                var content = this.content;
                var preview_pict = this.preview_pict;
                var slider = this.slider;
                axios.post('/api', {
                        apiMethod: 'newObject',
                        name: name,
                        title: title,
                        description: description,
                        content: content,
                        slider: slider,
                        preview_pict: preview_pict,
                    },
                ).then(response => console.log(success))
                    .catch(function (error) {
                        console.log(error)
                    });

                this.snackbar = true;

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
                            self.preview_pict = file.getUrl();
                        } );

                        finder.on( 'file:choose:resizedImage', function( evt ) {
                            self.preview_pict = evt.data.resizedUrl;
                        } );
                    }
                } );
            },
            openPopupImage2() {
                var self = this;
                CKFinder.popup( {
                    chooseFiles: true,
                    width: 800,
                    height: 600,
                    onInit: function( finder ) {

                        finder.on( 'files:choose', function( evt ) {
                            var file = evt.data.files.first();
                            self.addImage(file.getUrl());
                        } );

                        finder.on( 'file:choose:resizedImage', function( evt ) {
                            self.addImage(evt.data.resizedUrl);
                        } );
                    }
                } );
            },
            addImage: function(image) {
                this.slider.splice(0, 0, image);
            }
        }
    }
</script>

<style scoped>
    #img-box {
        display: inline-block;
        margin: 10px;
    }
#img-box>img {
    width: 150px;
    height: 150px;
}
</style>