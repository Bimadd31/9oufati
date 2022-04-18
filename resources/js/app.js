/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./ajax');

import { createApp } from 'vue'
import store from './store/index'

import Shop_page from './Shop.vue';
import CartHeader from './CartHeader.vue'

const shop = createApp({}).component('shop-content',Shop_page).use(store).mount('#shop-page');
const cartHeader = createApp({}).component('header-cart',CartHeader).use(store).mount('.nav-cart-btn');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// app.component('add-product', addProduct);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// app.mount("#app");
