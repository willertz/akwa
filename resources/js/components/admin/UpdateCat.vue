<template>
    <div class="container">
        <h1>Редактирование категории</h1>
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
            <v-row>
                <v-col cols="12">
                    <v-text-field
                            label="Название"
                            variant="outlined"
                            v-model="category.name"
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
                            v-model="category.title"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-textarea
                            variant="outlined"
                            name="input-7-4"
                            label="Описание (description)"
                            v-model="category.description"
                    ></v-textarea>
                </v-col>
            </v-row>

            <v-btn color="success" block size="small" @click="updateCat()">Сохранить</v-btn>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const id = route.params.id;

const category = ref({
    name: "",
    title: "",
    description: ""
});
const preview = ref("");
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Категория успешно отредактирована!');

const updateCat = async () => {
    try {
        await axios.post('/api', {
            id: id,
            apiMethod: 'updateCat',
            name: category.value.name,
            title: category.value.title,
            description: category.value.description,
            preview: preview.value,
        });
        console.log('Success');
        snackbar.value = true;
    } catch (error) {
        console.error(error);
    }
};

const loadCat = async () => {
    try {
        const response = await axios.post('/api', {
            apiMethod: 'loadSingleCat',
            id: id,
        });
        category.value = response.data;
        preview.value = response.data.preview;
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

onMounted(() => {
    loadCat();
});
</script>

<style scoped>

</style>
