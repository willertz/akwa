<template>
    <div class="container">
        <h1>Редактирование объекта</h1>
        <v-snackbar
                v-model="snackbar"
                location="top right"
                :timeout="timeout"
        >
            {{ text }}
            <template v-slot:actions>
                <v-btn
                        color="pink"
                        variant="text"
                        @click="snackbar = false"
                >
                    Close
                </v-btn>
            </template>
        </v-snackbar>

        <v-row>
            <v-col cols="12">
                <v-text-field
                        label="Название"
                        variant="outlined"
                        v-model="name"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-text-field
                        label="Title (SEO)"
                        variant="outlined"
                        v-model="title"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-textarea
                        variant="outlined"
                        name="input-7-4"
                        label="Описание (description)"
                        v-model="description"
                ></v-textarea>
            </v-col>
        </v-row>
        <h3>Содержание</h3>
        <tinymce id="d1"
                 :other_options="tinyOptions"
                 v-model="content"
        ></tinymce>
<br><br>
        <v-row>
            <v-col cols="12">
                <v-text-field
                        v-model="preview_pict"
                        label="URL фотографии"
                        variant="outlined"
                        readonly
                ></v-text-field>
                <v-btn color="info" block size="small" @click="openPopupImage()">Загрузить изображение</v-btn>
            </v-col>
        </v-row>
        <hr>
        <h3>Галерея</h3>
        <v-btn color="success" block @click="openPopupImage2()">Добавить</v-btn><br>
        <div id="img-box" v-for="(img,key) in slider" :key="key">
            <img :src="img"><br>
            <v-btn color="error" block size="small" @click="slider.splice(key, 1)">Удалить</v-btn>
        </div>
<br><br>
        <v-btn color="info" block @click="updateObject()">Сохранить изменения</v-btn><br>

    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const id = route.params.id;

const slider = ref([]);
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Объект успешно изменен!');
const name = ref("");
const title = ref("");
const description = ref("");
const content = ref("");
const preview_pict = ref("");

const tinyOptions = {
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
};

const updateObject = async () => {
    try {
        await axios.post('/api', {
            apiMethod: 'updateObject',
            id: id,
            name: name.value,
            title: title.value,
            description: description.value,
            content: content.value,
            slider: slider.value,
            preview_pict: preview_pict.value,
        });
        snackbar.value = true;
    } catch (error) {
        console.error(error);
    }
};

const openPopupImage = () => {
    CKFinder.popup({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var file = evt.data.files.first();
                preview_pict.value = file.getUrl();
            });

            finder.on('file:choose:resizedImage', function (evt) {
                preview_pict.value = evt.data.resizedUrl;
            });
        }
    });
};

const openPopupImage2 = () => {
    CKFinder.popup({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function (finder) {
            finder.on('files:choose', function (evt) {
                var file = evt.data.files.first();
                addImage(file.getUrl());
            });

            finder.on('file:choose:resizedImage', function (evt) {
                addImage(evt.data.resizedUrl);
            });
        }
    });
};

const addImage = (image) => {
    slider.value.splice(0, 0, image);
};

const loadObj = async () => {
    try {
        const response = await axios.post('/api', {
            apiMethod: 'loadSingleObj',
            id: id,
        });
        if (response.data && response.data.obj) {
            name.value = response.data.obj.name;
            title.value = response.data.obj.title;
            description.value = response.data.obj.description;
            content.value = response.data.obj.content;
            preview_pict.value = response.data.obj.preview_pict;
            slider.value = response.data.slider || [];
        }
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    loadObj();
});
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
