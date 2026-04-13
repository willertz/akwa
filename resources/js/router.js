import { createRouter, createWebHistory } from 'vue-router'
console.log('I am router');
import ShopCategory from './components/admin/ShopCategory.vue'
import ShopItem from './components/admin/ShopItem.vue'
import NewCat from './components/admin/NewCat.vue'
import UpdateCat from './components/admin/UpdateCat.vue'
import CreateItem from './components/admin/CreateItem.vue'
import Articles from './components/admin/Articles.vue'
import Objects from './components/admin/Objects.vue'
import Index from './components/admin/Index.vue'
import CreateArticle from './components/admin/CreateArticle.vue'
import UpdateArticle from './components/admin/UpdateArticle.vue'
import UpdateObj from './components/admin/UpdateObject.vue'
import NewObj from './components/admin/NewObject.vue'
import MediaManager from './components/admin/media/MediaManager.vue'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/home",
            redirect: "/home/index"
        },
        {
            path: "/home/index",
            name: "index",
            component: Index
        },
        {
            path: "/home/shop-category",
            name: "shop-category",
            component: ShopCategory
        },
        {
            path: "/home/shop-item",
            name: "shop-item",
            component: ShopItem
        },
        {
            path: "/home/new-cat/:parent",
            name: "new-cat",
            component: NewCat
        },
        {
            path: "/home/update-cat/:id",
            name: "up-cat",
            component: UpdateCat
        },
        {
            path: "/home/update-obj/:id",
            name: "up-catff",
            component: UpdateObj
        },
        {
            path: "/home/create-item/",
            name: "create-item",
            component: CreateItem
        },
        {
            path: "/home/articles/",
            name: "articles",
            component: Articles
        },
        {
            path: "/home/objects/",
            name: "3653",
            component: Objects
        },

        {
            path: "/home/create-art/",
            name: "articles-crt",
            component: CreateArticle
        },
        {
            path: "/home/update-art/:id",
            name: "articlffes-crt",
            component: UpdateArticle
        },
        {
            path: "/home/new-obj/",
            name: "articlfgfdgs-crt",
            component: NewObj
        },
        {
            path: "/home/media",
            name: "media",
            component: MediaManager
        },
    ]
})

export default router;
