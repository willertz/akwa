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

                <v-col cols="12">
                    <v-text-field
                            label="Slug (URL категории)"
                            variant="outlined"
                            v-model="category.slug"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <div class="field-label">Превью изображение</div>
                    <ImagePicker v-model="preview" v-model:alt-value="previewAlt" preview-height="200px" />
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
import ImagePicker from './media/ImagePicker.vue';

const route = useRoute();
const id = route.params.id;

const category = ref({
    name: "",
    title: "",
    description: "",
    slug: ""
});
const preview = ref("");
const previewAlt = ref("");
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Категория успешно отредактирована!');

const updateCat = async () => {
    try {
        await axios.post('/api/categories/update', {
            id: id,
            name: category.value.name,
            title: category.value.title,
            description: category.value.description,
            slug: category.value.slug,
            preview: preview.value,
            preview_alt: previewAlt.value,
        });
        console.log('Success');
        snackbar.value = true;
    } catch (error) {
        console.error(error);
    }
};

const loadCat = async () => {
    try {
        const response = await axios.get('/api/categories/' + id);
        category.value = response.data;
        preview.value = response.data.preview || '';
        previewAlt.value = response.data.preview_alt || '';
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    loadCat();
});
</script>

<style scoped>
.field-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #475569;
    margin-bottom: 8px;
}
</style>
