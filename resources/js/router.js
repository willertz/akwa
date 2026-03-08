import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
console.log('I am router');
import ShopCategory from './components/admin/ShopCategory'
import ShopItem from './components/admin/ShopItem'
import File from './components/admin/File'
import NewCat from './components/admin/NewCat'
import UpdateCat from './components/admin/UpdateCat'
import CreateItem from './components/admin/CreateItem'
import Articles from './components/admin/Articles'
import Objects from './components/admin/Objects'
import Index from './components/admin/Index'
import CreateArticle from './components/admin/CreateArticle'
import UpdateArticle from './components/admin/UpdateArticle'
import UpdateObj from './components/admin/UpdateObject'
import NewObj from './components/admin/NewObject'

export default new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
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
            path: "/home/file",
            name: "file",
            component: File
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
    ]
})