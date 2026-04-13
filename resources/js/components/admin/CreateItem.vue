<template>
    <div class="container">
        <v-snackbar
                v-model="snackbar"
                location="top right"
                :timeout="timeout"
        >
            Товар успешно добавлен!
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

        <h1>Создание нового товара</h1>

        <v-row>
            <v-col cols="12">
                <v-text-field
                        label="URL категории"
                        variant="outlined"
                        v-model="category"
                ></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-text-field
                        label="ID главного товара (заполнять только для подтовара, иначе 0)"
                        variant="outlined"
                        v-model="majorId"
                ></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-text-field
                        label="Артикул"
                        variant="outlined"
                        v-model="art"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-text-field
                        label="Имя"
                        variant="outlined"
                        v-model="name"
                ></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-text-field
                        label="Сортировка"
                        variant="outlined"
                        v-model="priority"
                ></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-text-field
                        label="Цена (RUB)"
                        variant="outlined"
                        v-model="price"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-text-field
                        label="Цена (Доллары)"
                        variant="outlined"
                        v-model="price_usd"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-text-field
                        label="Цена (Евро)"
                        variant="outlined"
                        v-model="price_eur"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-text-field
                    label="Единица измерения"
                    variant="outlined"
                    v-model="unit"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <div class="editblock">
                    <h4>Короткое описание</h4>
                    <TipTapEditor v-model="description" />
                </div>
            </v-col>

            <v-col cols="12">
                <div class="editblock">
                    <h4>Описание</h4>
                    <TipTapEditor v-model="full_description" />
                </div>
            </v-col>

            <v-col cols="12">
                <v-text-field
                        label="Страна"
                        variant="outlined"
                        v-model="country"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <div class="field-label">Превью изображение</div>
                <ImagePicker v-model="preview" v-model:alt-value="previewAlt" preview-height="200px" />
            </v-col>

            <v-col cols="12">
                <v-textarea
                        variant="outlined"
                        name="input-7-4"
                        label="Title для SEO"
                        v-model="meta_title"
                ></v-textarea>
            </v-col>
            <v-col cols="12">
                <v-textarea
                        variant="outlined"
                        name="input-7-4"
                        label="Описание для SEO (description)"
                        v-model="meta_description"
                ></v-textarea>
            </v-col>
        </v-row>
        <div> <v-btn color="success" @click="saveItem()">Сохранить</v-btn> </div>

    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import TipTapEditor from './media/TipTapEditor.vue';
import ImagePicker from './media/ImagePicker.vue';

const snackbar = ref(false);
const timeout = ref(6000);
const category = ref("");
const art = ref("");
const name = ref("");
const price = ref("");
const unit = ref("шт");
const price_usd = ref("");
const price_eur = ref("");
const priority = ref("");
const description = ref("");
const full_description = ref("");
const country = ref("");
const preview = ref("");
const previewAlt = ref("");
const meta_title = ref("");
const meta_description = ref("");
const majorId = ref("");

const saveItem = async () => {
    try {
        await axios.post('/api/items/new', {
            art: art.value,
            category: category.value,
            priority: priority.value,
            name: name.value,
            price: price.value,
            unit: unit.value,
            price_usd: price_usd.value,
            price_eur: price_eur.value,
            description: description.value,
            full_description: full_description.value,
            country: country.value,
            preview: preview.value,
            preview_alt: previewAlt.value,
            meta_title: meta_title.value,
            meta_description: meta_description.value,
            majorId: majorId.value
        });
        snackbar.value = true;
    } catch (error) {
        console.error(error);
    }
};
</script>

<style scoped>
.editblock {
    margin-bottom: 25px;
}

.field-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #475569;
    margin-bottom: 8px;
}
</style>
