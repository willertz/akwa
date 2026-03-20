<template>
    <div class="container">
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
        <h1>Добавление новой категории</h1>

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
                        v-model="preview"
                        label="URL фотографии"
                        variant="outlined"
                        readonly
                ></v-text-field>
                <v-btn color="info" block size="small" @click="openPopupImage()">Загрузить изображение</v-btn>
            </v-col>

            <v-col cols="12">
                <v-text-field
                        label="Title"
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

        <v-btn color="success" block size="small" @click="addNewCat()">Сохранить</v-btn>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const parentId = route.params.parent;

const name = ref("");
const title = ref("");
const description = ref("");
const preview = ref("");
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Категория успешно добавлена!');

const addNewCat = async () => {
    try {
        await axios.post('/api', {
            apiMethod: 'addNewCat',
            name: name.value,
            title: title.value,
            description: description.value,
            preview: preview.value,
            parent_id: parentId,
        });
        console.log('Success');
        name.value = "";
        preview.value = "";
        description.value = "";
        title.value = "";
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
                preview.value = file.getUrl();
            });

            finder.on('file:choose:resizedImage', function (evt) {
                preview.value = evt.data.resizedUrl;
            });
        }
    });
};
</script>

<style scoped>
    #previewEditItem {
        width: 100%;
        height: 40px;
    }
</style>
