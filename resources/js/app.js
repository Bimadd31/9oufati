/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./ajax');

import { createApp } from 'vue'

import Shop_page from './Shop.vue';
import Header_Cart_items from './components/cartHeader.vue'

const shop = createApp({}).component('shop-content',Shop_page).mount('#shop-page');
const cartHeader = createApp({}).component('header-cart-items',Header_Cart_items).mount('.nav-cart-items-container');


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
