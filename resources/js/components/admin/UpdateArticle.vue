<template>
    <div class="container">
        <h1>Редактирование статьи</h1>
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
        <br>
        <v-btn color="success" block size="small" @click="updateArticle()">Сохранить</v-btn>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const id = route.params.id;

const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Статья успешно изменена!');
const name = ref("");
const title = ref("");
const description = ref("");
const content = ref("");

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

const updateArticle = async () => {
    try {
        await axios.post('/api', {
            apiMethod: 'updateArticle',
            id: id,
            name: name.value,
            title: title.value,
            description: description.value,
            content: content.value
        });
        snackbar.value = true;
    } catch (error) {
        console.error(error);
    }
};

const loadArticle = async () => {
    try {
        const response = await axios.post('/api', {
            apiMethod: 'loadSingleArt',
            id: id,
        });
        if (response.data && response.data[0]) {
            name.value = response.data[0].name;
            title.value = response.data[0].title;
            description.value = response.data[0].description;
            content.value = response.data[0].content;
        }
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    loadArticle();
});
</script>

<style scoped>

</style>
