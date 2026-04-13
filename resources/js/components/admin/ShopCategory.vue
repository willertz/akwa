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

        <v-btn color="success" block size="small" :to="getNewCatLink(-1)">Добавить новую категорию</v-btn>
           <br><br><br>
            <v-card>
                <v-card-title class="d-flex align-center">
                    Категории
                    <v-spacer></v-spacer>
                    <v-text-field
                            v-model="search"
                            prepend-inner-icon="mdi-magnify"
                            label="Поиск"
                            single-line
                            hide-details
                    ></v-text-field>
                </v-card-title>
                <v-data-table
                        :headers="headers"
                        :items="categories"
                        :search="search"
                >
                    <template v-slot:item="{ item }">
                        <tr>
                            <td><a :href="item.url">{{ item.name }}</a></td>
                            <td class="text-center"><v-btn color="info" size="small" :to="getNewCatLink(item.id)"><v-icon>mdi-folder-plus</v-icon></v-btn></td>
                            <td class="text-center"><v-btn color="success" size="small" :to="getUpdateLink(item.id)"><v-icon>mdi-pencil</v-icon></v-btn></td>
                            <td class="text-center"><v-btn color="error" size="small" @click="deleteCategory(item.id)"><v-icon>mdi-delete</v-icon></v-btn></td>
                        </tr>
                    </template>
                    <template v-slot:no-data>
                        <v-alert type="error" icon="mdi-alert">
                            Вы искали "{{ search }}" но результатов не найдено
                        </v-alert>
                    </template>
                </v-data-table>
            </v-card>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const search = ref('');
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Категория успешно удалена!');
const categories = ref([]);

const headers = [
    {
        title: 'Название',
        align: 'start',
        sortable: false,
        key: 'name'
    },
    {
        title: 'Добавить подкатегорию',
        align: 'center',
        sortable: false,
        key: 'add'
    },
    {
        title: 'Изменить категорию',
        align: 'center',
        sortable: false,
        key: 'edit'
    },
    {
        title: 'Удалить категорию',
        align: 'center',
        sortable: false,
        key: 'delete'
    },
];

const deleteCategory = async (id) => {
    try {
        await axios.delete('/api/categories/' + id);
        snackbar.value = true;
        await loadCategory();
    } catch (error) {
        console.error(error);
    }
};

const getNewCatLink = (parentId) => {
    return '/home/new-cat/' + parentId;
};

const getUpdateLink = (id) => {
    return '/home/update-cat/' + id;
};

const loadCategory = async () => {
    try {
        const response = await axios.get('/api/categories');
        categories.value = response.data;
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    loadCategory();
});
</script>

<style scoped>

</style>
