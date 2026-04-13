
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import router from './router';

// Vuetify 3
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import 'vuetify/styles';
import { mdi } from 'vuetify/iconsets/mdi';
import '@mdi/font/css/materialdesignicons.css';

const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        sets: {
            mdi,
        },
    },
});

import VueNumberInput from '@chenfengyuan/vue-number-input';
import { CkeditorPlugin } from '@ckeditor/ckeditor5-vue';
import Editor from '@tinymce/tinymce-vue';

import AdminComponent from './Admin.vue';
import CartComponent from './components/Cart.vue';

const app = createApp({});

app.use(router);
app.use(vuetify);
app.use(CkeditorPlugin);

app.component('admin-component', AdminComponent);
app.component('cart-component', CartComponent);
app.component(VueNumberInput.name, VueNumberInput);
app.component('tinymce', Editor);

app.mount('#app');
