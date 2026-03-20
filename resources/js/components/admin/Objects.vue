<template>
    <div class="container">
        <v-snackbar
                v-model="snackbar"
                :timeout="timeout"
                location="top right"
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
        <h1>Управление объектами</h1>
        <v-btn color="success" block size="small" :to="newLink">Добавить новый объект</v-btn>
        <br><br>
        <v-card>
            <v-card-title class="d-flex align-center">
                Объекты
                <v-spacer></v-spacer>
                <v-text-field
                        v-model="search"
                        append-inner-icon="mdi-magnify"
                        label="Поиск"
                        single-line
                        hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                    :headers="headers"
                    :items="articles"
                    :search="search"
            >
                <template v-slot:item.name="{ item }">
                    <a :href="item.url">{{ item.name }}</a>
                </template>
                <template v-slot:item.edit="{ item }">
                    <v-btn color="success" size="small" :to="getUpdateLink(item.id)">
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                </template>
                <template v-slot:item.delete="{ item }">
                    <v-btn color="error" size="small" @click="deleteArticle(item.id)">
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
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

const articles = ref([]);
const newLink = ref('/home/new-obj/');
const snackbar = ref(false);
const timeout = ref(6000);
const text = ref('Объект успешно удален!');
const search = ref('');

const headers = [
    {
        title: 'Название',
        align: 'start',
        sortable: false,
        key: 'name'
    },
    {
        title: 'Изменить',
        align: 'center',
        sortable: false,
        key: 'edit'
    },
    {
        title: 'Удалить',
        align: 'center',
        sortable: false,
        key: 'delete'
    },
];

const getUpdateLink = (id) => {
    return '/home/update-obj/' + id;
};

const deleteArticle = async (id) => {
    try {
        await axios.post('/api', {
            apiMethod: 'deleteObj',
            id: id
        });
        snackbar.value = true;
        loadArticles();
    } catch (error) {
        console.error(error);
    }
};

const loadArticles = async () => {
    try {
        const response = await axios.post('/api', {
            apiMethod: 'loadAllObj',
        });
        articles.value = response.data;
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    loadArticles();
});
</script>

<style scoped>

</style>
