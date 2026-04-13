<template>
    <div class="container">
        <h1>Добавление объекта</h1>
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

            <v-col cols="12">
                <div class="field-label">Превью изображение</div>
                <ImagePicker v-model="preview_pict" v-model:alt-value="previewAlt" preview-height="200px" />
            </v-col>

            <v-col cols="4">
                <v-text-field
                        label="Количество этажей"
                        variant="outlined"
                        type="number"
                        v-model="floors"
                ></v-text-field>
            </v-col>

            <v-col cols="4">
                <v-text-field
                        label="Стоимость монтажа (руб/м²)"
                        variant="outlined"
                        type="number"
                        v-model="price_per_sqm"
                ></v-text-field>
            </v-col>

            <v-col cols="4">
                <v-text-field
                        label="Площадь (м²)"
                        variant="outlined"
                        type="number"
                        v-model="area"
                ></v-text-field>
            </v-col>
        </v-row>

        <v-divider class="my-4"></v-divider>
        <h3>Детальное описание (для блока item_top)</h3>
        <v-row>
            <v-col cols="12">
                <v-textarea
                        variant="outlined"
                        label="Краткое описание проекта (item_top)"
                        v-model="detail_description"
                ></v-textarea>
            </v-col>
            <v-col cols="12">
                <div class="field-label">Фото для левой колонки (item_bottom)</div>
                <ImagePicker v-model="left_image" preview-height="150px" />
            </v-col>
        </v-row>
        <v-divider class="my-4"></v-divider>
        <h3>Особенности проекта (до 4 пунктов)</h3>
        <v-row v-for="(feature, index) in features" :key="index" class="mb-2">
            <v-col cols="1">
                <v-text-field label="№" variant="outlined" v-model="feature.number" density="compact"></v-text-field>
            </v-col>
            <v-col cols="3">
                <v-text-field label="Заголовок" variant="outlined" v-model="feature.title" density="compact"></v-text-field>
            </v-col>
            <v-col cols="7">
                <v-text-field label="Описание" variant="outlined" v-model="feature.description" density="compact"></v-text-field>
            </v-col>
            <v-col cols="1" class="d-flex align-center">
                <v-btn icon="mdi-delete" size="small" color="error" @click="removeFeature(index)"></v-btn>
            </v-col>
        </v-row>
        <v-btn color="secondary" class="mb-4" @click="addFeature()" prepend-icon="mdi-plus">Добавить пункт</v-btn>
        <v-divider class="my-4"></v-divider>
        <h3>Большое описание (big_description)</h3>
        <v-textarea variant="outlined" label="Большой текст описания" v-model="big_description" rows="5"></v-textarea>
        <v-divider class="my-4"></v-divider>
        <h3>Содержание</h3>
        <TipTapEditor v-model="content" />

        <br>
        <v-divider></v-divider>
        <h3>Галерея</h3>
        <GalleryEditor v-model="slider" />

        <br>
        <v-btn color="info" block @click="updateObject()">Сохранить объект</v-btn>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import TipTapEditor from './media/TipTapEditor.vue';
import ImagePicker from './media/ImagePicker.vue';
import GalleryEditor from './media/GalleryEditor.vue';

const slider = ref([]);
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Объект успешно добавлен!');
const name = ref("");
const title = ref("");
const description = ref("");
const content = ref("");
const preview_pict = ref("");
const previewAlt = ref("");
const floors = ref("");
const price_per_sqm = ref("");
const area = ref("");
const detail_description = ref("");
const left_image = ref("");
const features = ref([]);
const big_description = ref("");
const addFeature = () => {
    const num = String(features.value.length + 1).padStart(2, '0');
    features.value.push({ number: num, title: '', description: '' });
};
const removeFeature = (index) => {
    features.value.splice(index, 1);
};
const updateObject = async () => {
    try {
        await axios.post('/api/objects/new', {
            name: name.value,
            title: title.value,
            description: description.value,
            content: content.value,
            slider: slider.value.map(i => i.url || i),
            preview_pict: preview_pict.value,
            preview_alt: previewAlt.value,
            floors: floors.value ? parseInt(floors.value) : null,
            price_per_sqm: price_per_sqm.value ? parseInt(price_per_sqm.value) : null,
            area: area.value ? parseInt(area.value) : null,
            detail_description: detail_description.value || null,
            left_image: left_image.value || null,
            features: features.value.length ? features.value : null,
            big_description: big_description.value || null,
        });
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
