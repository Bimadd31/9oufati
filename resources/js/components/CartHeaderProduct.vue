<template>
               

                <div class="card nav-cart-item mb-1 d-flex justify-content-center" style="width: 300px;height: 80px;">
                 
                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                                <img :src="product.image" class="nav-cart-item-img">
                        </div>

                        <div class="col-8"  >
                                <form class="header-product-form" method="POST" novalidate >
                                        
                                <input name="product_id" type="hidden" :value="product.id">
                                <input name="category_name" type="hidden" :value="product.category_name">

                                <div class="card-body">
                                <input  @click="deleteProduct" type="submit"  class="submit rounded-circle nav-cart-item-del-btn position-absolute d-block"
                                        style="width: 18px;height: 18px;" value="&nbsp;">
                                <p class="card-title">{{ product.name }}</p>
                                <p class="card-text text-end">
                                        <span class="nav-cart-item-quantity pe-1">
                                                {{  product.quantity }} 
                                                {{  product.mesure_unit || 'Piece'}}
                                        </span>x<span
                                        class="nav-cart-item-price ps-1">
                                        {{ (getFinalPrice).toFixed(2)+' DH' }}
                                        </span>
                                </p>
                                </div>
                                </form>
                        </div>
                    </div>   
                </div>
</template>

<script>
export default {
        name: 'CartHeaderProduct',
     
        props:{
                product:Object,
        },

      
        methods:{
          
            deleteProduct(e){
                this.$store.dispatch("deleteProduct",e)
            },
        },
        computed:{
             
                getFinalPrice(){
                        let product = [this.product.id,this.product.category_name];
                        return this.$store.getters.getFinalPrice(product)
                },
                 
        }
                
            
       
}
</script>

<style>

</style>