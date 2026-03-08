<template>
    <v-app>
        <v-navigation-drawer app>
            <v-list dense class="pt-0">
                <v-list-tile
                        v-for="item in items"
                        :key="item.title"
                        @click=""
                        :to="item.link"
                >
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>

                    <v-list-tile-content>
                        <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar app>
            <v-toolbar-title>Панель администратора</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn flat>Выход &#8194;<v-icon>input</v-icon></v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-content>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-content>
        <v-footer app></v-footer>
    </v-app>
</template>

<script>
    export default {
        name: "Admin",
        data () {
            return {
                items: [
                    {
                        title: 'Главная',
                        icon: 'dashboard',
                        link: '/home/index'
                    },
                    {
                        title: 'Статьи',
                        icon: 'edit',
                        link: '/home/articles'
                    },
                    {
                        title: 'Объекты',
                        icon: 'edit',
                        link: '/home/objects'
                    },
                    {
                        title: 'Категории магазина',
                        icon: 'folder',
                        link: '/home/shop-category'
                    },
                    {
                        title: 'Товары',
                        icon: 'local_offer',
                        link: '/home/shop-item'
                    },
                    {
                        title: 'Файлы',
                        icon: 'perm_media',
                        link: '/home/file'
                    },
                ],
                right: null
            }
        }
    }
</script>

<style scoped>

</style>