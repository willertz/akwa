<template>
    <v-app>
        <v-navigation-drawer permanent>
            <v-list density="compact" class="pt-0">
                <v-list-item
                    v-for="item in items"
                    :key="item.title"
                    :to="item.link"
                    :prepend-icon="item.icon"
                    :title="item.title"
                    link
                >
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar>
            <v-app-bar-title>Панель администратора</v-app-bar-title>
            <v-spacer></v-spacer>
            <v-btn variant="text">Выход &#8194;<v-icon>mdi-logout</v-icon></v-btn>
        </v-app-bar>
        <v-main>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>
        <v-footer app></v-footer>
    </v-app>
</template>

<script setup>
const items = [
    {
        title: 'Главная',
        icon: 'mdi-view-dashboard',
        link: '/home/index'
    },
    {
        title: 'Статьи',
        icon: 'mdi-pencil',
        link: '/home/articles'
    },
    {
        title: 'Объекты',
        icon: 'mdi-pencil-box-multiple',
        link: '/home/objects'
    },
    {
        title: 'Категории магазина',
        icon: 'mdi-folder',
        link: '/home/shop-category'
    },
    {
        title: 'Товары',
        icon: 'mdi-tag',
        link: '/home/shop-item'
    },
    {
        title: 'Медиа',
        icon: 'mdi-folder-multiple-image',
        link: '/home/media'
    },
];
</script>

<style scoped>

</style>
