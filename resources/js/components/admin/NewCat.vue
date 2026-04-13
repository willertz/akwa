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

            <v-col cols="12">
                <div class="field-label">Превью изображение</div>
                <ImagePicker v-model="preview" v-model:alt-value="previewAlt" preview-height="200px" />
            </v-col>
        </v-row>

        <v-btn color="success" block size="small" @click="addNewCat()">Сохранить</v-btn>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';
import ImagePicker from './media/ImagePicker.vue';

const route = useRoute();
const parentId = route.params.parent;

const name = ref("");
const title = ref("");
const description = ref("");
const preview = ref("");
const previewAlt = ref("");
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Категория успешно добавлена!');

const addNewCat = async () => {
    try {
        await axios.post('/api/categories/new', {
            name: name.value,
            title: title.value,
            description: description.value,
            preview: preview.value,
            preview_alt: previewAlt.value,
            parent_id: parentId,
        });
        console.log('Success');
        name.value = "";
        preview.value = "";
        previewAlt.value = "";
        description.value = "";
        title.value = "";
        snackbar.value = true;
    } catch (error) {
        console.error(error);
    }
};
</script>

<style scoped>
.field-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #475569;
    margin-bottom: 8px;
}
</style>
