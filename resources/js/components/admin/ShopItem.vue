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
        <v-table v-if="items.length > 0" density="compact" class="mb-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Артикул</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td>{{ item.id }}</td>
                    <td>{{ item.art }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price }}</td>
                    <td>
                        <v-btn size="x-small" color="info" class="mr-1" @click="loadItemForEdit(item.id)">Ред.</v-btn>
                        <v-btn size="x-small" color="error" @click="deleteItemById(item.id)">Удал.</v-btn>
                    </td>
                </tr>
            </tbody>
        </v-table>
        <div v-else-if="!loading" class="text-center mb-4">Товары не найдены</div>
        <hr>
        <div class="container" id="editor-form" v-if="enableEditor && editItem">
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
                    <v-select
                            label="Категория"
                            variant="outlined"
                            v-model="editItem.category_url"
                            :items="categories"
                            item-title="name"
                            item-value="url"
                            clearable
                    ></v-select>
                </v-col>

                <v-col cols="12">
                    <v-text-field
                            label="Slug (URL товара)"
                            variant="outlined"
                            v-model="editItem.slug"
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
                        label="Единица измерения"
                        variant="outlined"
                        v-model="editItem.unit"
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <div class="editblock">
                        <h4>Короткое описание</h4>
                        <TipTapEditor v-model="editItem.description" />
                    </div>
                </v-col>

                <v-col cols="12">
                    <div class="editblock">
                        <h4>Описание</h4>
                        <TipTapEditor v-model="editItem.full_description" />
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
                    <div class="field-label">Превью изображение</div>
                    <ImagePicker v-model="preview" v-model:alt-value="previewAlt" preview-height="200px" />
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
import { ref, onMounted, nextTick } from 'vue';
import axios from 'axios';
import TipTapEditor from './media/TipTapEditor.vue';
import ImagePicker from './media/ImagePicker.vue';

const addItemLink = '/home/create-item/';
const enableEditor = ref(false);
const snackbar = ref(false);
const timeout = ref(6000);
const editorItemId = ref(0);
const deleteItemId = ref(0);
const editItem = ref(null);
const preview = ref("");
const previewAlt = ref("");
const items = ref([]);
const categories = ref([]);
const loading = ref(true);

const loadItems = async () => {
    try {
        const response = await axios.get('/api/items');
        items.value = response.data;
    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false;
    }
};

const loadCategories = async () => {
    try {
        const response = await axios.get('/api/categories');
        categories.value = response.data;
    } catch (error) {
        console.error(error);
    }
};

const loadItemForEdit = async (id) => {
    editorItemId.value = id;
    await openEditor();
};

const deleteItemById = async (id) => {
    if (!confirm('Удалить товар #' + id + '?')) return;
    deleteItemId.value = id;
    await deleteItem();
    await loadItems();
};

onMounted(() => { loadItems(); loadCategories(); });

const saveItem = async () => {
    try {
        await axios.post('/api/items/save', {
            id: editItem.value.id,
            art: editItem.value.art,
            name: editItem.value.name,
            slug: editItem.value.slug,
            price: editItem.value.price,
            price_usd: editItem.value.price_usd,
            price_eur: editItem.value.price_eur,
            description: editItem.value.description,
            full_description: editItem.value.full_description,
            country: editItem.value.country,
            preview: preview.value,
            preview_alt: previewAlt.value,
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

const openEditor = async () => {
    try {
        const response = await axios.get('/api/items/' + editorItemId.value);
        editItem.value = response.data;
        preview.value = response.data.preview || '';
        previewAlt.value = response.data.preview_alt || '';
        enableEditor.value = true;
        await nextTick();
        document.getElementById('editor-form')?.scrollIntoView({ behavior: 'smooth' });
    } catch (error) {
        console.error(error);
    }
};

const deleteItem = async () => {
    try {
        await axios.delete('/api/items/' + deleteItemId.value);
        snackbar.value = true;
        deleteItemId.value = 0;
        await loadItems();
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

.field-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #475569;
    margin-bottom: 8px;
}
</style>
