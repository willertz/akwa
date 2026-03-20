<template>
    <div class="container">
        <v-snackbar
                v-model="snackbar"
                location="top right"
                :timeout="timeout"
        >
            Товар успешно удален!
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
        <div class="top-line-admin">
            <div>
                <h4>Управление товарами</h4>
            </div>
            <div class="top-line-btn-group">
            </div>
        </div>

        <v-btn color="success" block size="small" :to="addItemLink">Добавить новый товар</v-btn>
        <br><br>
        <v-row>
            <v-col cols="12" md="6">
                <v-text-field
                        label="ID товара для редактирования"
                        variant="outlined"
                        v-model="editorItemId"
                ></v-text-field>
                <v-btn color="info" size="small" @click="openEditor()">Редактировать товар</v-btn>
            </v-col>
            <v-col cols="12" md="6">
                <v-text-field
                        label="ID товара для удаления"
                        variant="outlined"
                        v-model="deleteItemId"
                ></v-text-field>
                <v-btn color="error" size="small" @click="deleteItem()">Удалить товар</v-btn>
            </v-col>
        </v-row>
        <hr>
        <div class="container" v-if="enableEditor && editItem">
            <h5>Редактирование товара</h5>
            <br><br>
            <v-row>
                <v-col cols="12">
                    <v-text-field
                            label="Артикул"
                            variant="outlined"
                            v-model="editItem.art"
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-text-field
                            label="Название"
                            variant="outlined"
                            v-model="editItem.name"
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-text-field
                            label="URL категории"
                            variant="outlined"
                            v-model="editItem.category_url"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                            label="ID главного товара (заполнять только для подтовара, иначе 0)"
                            variant="outlined"
                            v-model="editItem.parent_id"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                            label="Сортировка"
                            variant="outlined"
                            v-model="editItem.priority"
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-text-field
                            label="Цена (RUB)"
                            variant="outlined"
                            v-model="editItem.price"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                            label="Цена (USD)"
                            variant="outlined"
                            v-model="editItem.price_usd"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                            label="Цена (EUR)"
                            variant="outlined"
                            v-model="editItem.price_eur"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                        label="Еденица измерения"
                        variant="outlined"
                        v-model="editItem.unit"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <div class="editblock">
                        <h4>Короткое описание</h4>
                        <tinymce id="d1"
                                 :other_options="tinyOptions"
                                 v-model="editItem.description"
                        ></tinymce>
                    </div>
                </v-col>

                <v-col cols="12">
                    <div class="editblock">
                        <h4>Описание</h4>
                        <tinymce id="d2"
                                 :other_options="tinyOptions"
                                 v-model="editItem.full_description"
                        ></tinymce>
                    </div>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                            label="Страна"
                            variant="outlined"
                            v-model="editItem.country"
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
                            v-model="editItem.meta_title"
                    ></v-textarea>
                </v-col>
                <v-col cols="12">
                    <v-textarea
                            variant="outlined"
                            name="input-7-4"
                            label="Описание для SEO (description)"
                            v-model="editItem.meta_description"
                    ></v-textarea>
                </v-col>
            </v-row>
            <div> <v-btn color="success" @click="saveItem()">Сохранить</v-btn> </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const addItemLink = '/home/create-item/';
const enableEditor = ref(false);
const snackbar = ref(false);
const timeout = ref(6000);
const editorItemId = ref(0);
const deleteItemId = ref(0);
const editItem = ref(null);
const preview = ref("");

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
            apiMethod: 'saveItem',
            id: editItem.value.id,
            art: editItem.value.art,
            name: editItem.value.name,
            price: editItem.value.price,
            price_usd: editItem.value.price_usd,
            price_eur: editItem.value.price_eur,
            description: editItem.value.description,
            full_description: editItem.value.full_description,
            country: editItem.value.country,
            preview: preview.value,
            meta_title: editItem.value.meta_title,
            meta_description: editItem.value.meta_description,
            priority: editItem.value.priority,
            unit: editItem.value.unit,
            parent_id: editItem.value.parent_id,
            cat_url: editItem.value.category_url
        });
        window.location.href = '/home/shop-item';
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

const openEditor = async () => {
    try {
        const response = await axios.post('/api', {
            apiMethod: 'loadItem',
            id: editorItemId.value
        });
        editItem.value = response.data;
        preview.value = response.data.preview;
        enableEditor.value = true;
    } catch (error) {
        console.error(error);
    }
};

const deleteItem = async () => {
    try {
        await axios.post('/api', {
            apiMethod: 'deleteItem',
            id: deleteItemId.value
        });
        snackbar.value = true;
        deleteItemId.value = 0;
    } catch (error) {
        console.error(error);
    }
};
</script>

<style scoped>
.top-line-admin {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
}
    .top-line-btn-group {
        text-align: right;
    }
    .editblock {
        margin-bottom: 25px;
    }
</style>
