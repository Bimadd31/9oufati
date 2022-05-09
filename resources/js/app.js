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
import CartHeader from './CartHeader.vue';
import Cart_page from './Cart.vue';
import Checkout_page from './Checkout.vue';

const shop = createApp({}).component('shop-content',Shop_page).use(store).mount('#shop-page');
const cartHeader = createApp({}).component('header-cart',CartHeader).use(store).mount('.nav-cart-btn');
const cart = createApp({}).component('cart-content',Cart_page).use(store).mount('.cart-container');
const checkout = createApp({}).component('checkout-content',Checkout_page).use(store).mount('.checkout-container');


