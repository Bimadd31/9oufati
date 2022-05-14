<template>
    

            <a href="#" class="text-decoration-none d-flex align-items-center justify-content-end"
                    data-bs-toggle="dropdown">

                    <i class="nav-cart-icon position-relative align-middle me-2">
                    <span id="nav-account-count-container"
                            class="position-absolute nav-account-count-container rounded-circle start-50 text-center">
                            <span id="nav-cart-count" class="nav-cart-count">{{this.get_product_count}}</span>
                    </span>
                    </i>
                    <span class="nav-cart-text ">Panier</span>

            </a>

                        <!-- CART WIDGET DROPDOWN -->
        <div class="position-absolute nav-cart-widget-container col-12 pb-3  mt-3 dropdown-menu dropdown-menu-end" 
            style="width: 320px;min-height:150px;max-height: 600px;"> 

            <div v-if="(this.get_product_count > 0)" >

                <div  class="d-flex col-12 justify-content-start align-items-center">
                
                    <div class="ms-4 px-2 py-3 cart-widget-subtotal-text">
                        Sous-total :  {{ (get_cartsubTotal).toFixed(2)+' DH'}}
                        <span class="cart-widget-subtotal ms-2"></span>
                    </div>

                </div>

                <div 
                    class="col-12 mx-auto mb-3" 
                    style
                    ="height: 0.5px; width: 60%;background-color: #D0CDCD;opacity: 0.5;">
                </div>

                <div class="nav-cart-items-container col-12 d-flex flex-column align-items-center justify-content-center">

                        <CartHeaderProduct :key="product.id" v-for="product in this.getIncartProducts"
                            :product="product"></CartHeaderProduct>  
                        
                </div>

                <div class="col-12 mx-auto my-3 nav-cart-widget-btn-container"></div>

                <div class="col-12 d-flex ">
                    
                    <div class="col-4 pt-2 nav-cart-widget-btn ms-3"
                            onclick="window.location.href='/cart'" style="background-color: #5c824a;">
                            <span>Allez au panier</span>
                    </div>

                    <div class="col-4 pt-2 nav-cart-widget-btn ms-2" onclick="window.location.href='/checkout'"
                            style="background-color: #cd4848;">
                            <span>Commander</span>
                    </div>
            
                </div>
                   
            </div> 
        
            <div v-else class="d-grid col-12 justify-content-center align-items-center text-center" style="height:150px;">
                
                <span style="font-family:Ubuntu">Votre panier est vide !</span>
    
            </div>
                
        </div>
</template>

<script>
import CartHeaderProduct from './components/CartHeaderProduct.vue'
export default {
 
    props:{
        data : Object,
    },
    mounted(){
        this.$store.dispatch('set_incart_products', this.data);
    },
    components:{
        CartHeaderProduct,
    },
    computed:{
        get_product_count(){
            return this.$store.getters.get_cart_count
        },
        getIncartProducts(){
            return this.$store.getters.get_incart_products
        },
        get_cartsubTotal(){
            return this.$store.getters.get_cartsubTotal
        }
    }
   
}
</script>

<style>

</style>