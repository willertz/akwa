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
                    label="Еденица измерения"
                    variant="outlined"
                    v-model="unit"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <div class="editblock">
                    <h4>Короткое описание</h4>
                    <tinymce id="d1"
                             :other_options="tinyOptions"
                             v-model="description"
                    ></tinymce>
                </div>
            </v-col>

            <v-col cols="12">
                <div class="editblock">
                    <h4>Описание</h4>
                    <tinymce id="d2"
                             :other_options="tinyOptions"
                             v-model="full_description"
                    ></tinymce>
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
                <v-text-field
                        v-model="preview"
                        label="URL фотографии"
                        variant="outlined"
                        readonly
                ></v-text-field>
                <v-btn color="info" block size="small" @click="openPopupImage()">Загрузить изображение</v-btn>
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
const meta_title = ref("");
const meta_description = ref("");
const majorId = ref("");

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

const saveItem = async () => {
    try {
        await axios.post('/api', {
            apiMethod: 'saveNewItem',
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
            meta_title: meta_title.value,
            meta_description: meta_description.value,
            majorId: majorId.value
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

    .editblock {
        margin-bottom: 25px;
    }
</style>

