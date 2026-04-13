<template>
   <div class="container">
       <h1>Добавление новой статьи</h1>
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
               <ImagePicker v-model="preview" v-model:alt-value="previewAlt" preview-height="200px" />
           </v-col>
       </v-row>

       <h3>Содержание</h3>
       <TipTapEditor v-model="content" />
       <br>
       <v-btn color="success" block size="small" @click="addNewArticle()">Сохранить</v-btn>
   </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import TipTapEditor from './media/TipTapEditor.vue';
import ImagePicker from './media/ImagePicker.vue';

const name = ref("");
const title = ref("");
const description = ref("");
const preview = ref("");
const previewAlt = ref("");
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Статья успешно добавлена!');
const content = ref("");

const addNewArticle = async () => {
    try {
        await axios.post('/api/articles/new', {
            name: name.value,
            title: title.value,
            description: description.value,
            content: content.value,
            preview: preview.value,
            preview_alt: previewAlt.value
        });
        console.log('Success');
        name.value = "";
        description.value = "";
        title.value = "";
        content.value = "";
        preview.value = "";
        previewAlt.value = "";
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
