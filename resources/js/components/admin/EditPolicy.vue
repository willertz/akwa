<template>
    <div class="container">
        <h1>Политика конфиденциальности</h1>
        <v-snackbar v-model="snackbar" location="top right" :timeout="timeout">
            {{ text }}
            <template v-slot:actions>
                <v-btn color="pink" variant="text" @click="snackbar = false">Закрыть</v-btn>
            </template>
        </v-snackbar>
        <v-row>
            <v-col cols="12">
                <v-text-field label="Заголовок страницы" variant="outlined" v-model="title"></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-text-field label="SEO Title" variant="outlined" v-model="seoTitle"></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-textarea label="SEO Description" variant="outlined" v-model="seoDescription" rows="2"></v-textarea>
            </v-col>
        </v-row>
        <h3>Содержание страницы</h3>
        <TipTapEditor v-model="content" />
        <br>
        <v-btn color="success" block size="small" @click="save()">Сохранить</v-btn>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import TipTapEditor from './media/TipTapEditor.vue';

const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Страница успешно сохранена!');

const title = ref('Политика конфиденциальности');
const seoTitle = ref('');
const seoDescription = ref('');
const content = ref('');

const save = async () => {
    try {
        await axios.post('/api/rule-pages/save', {
            slug: 'policy',
            title: title.value,
            seo_title: seoTitle.value,
            seo_description: seoDescription.value,
            content: content.value,
        });
        snackbar.value = true;
    } catch (error) {
        console.error(error);
    }
};

const load = async () => {
    try {
        const response = await axios.get('/api/rule-pages/policy');
        if (response.data && response.data.id) {
            title.value = response.data.title || 'Политика конфиденциальности';
            seoTitle.value = response.data.seo_title || '';
            seoDescription.value = response.data.seo_description || '';
            content.value = response.data.content || '';
        }
    } catch (error) {
        // Page not yet created — use defaults
    }
};

onMounted(() => {
    load();
});
</script>
