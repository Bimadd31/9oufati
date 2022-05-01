<template>
               

                <div class="card nav-cart-item mb-1 d-flex justify-content-center" style="width: 300px;height: 80px;">
                 
                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                                <img :src="image" class="nav-cart-item-img">
                        </div>

                        <div class="col-8"  >
                                <form class="header-product-form" method="POST" novalidate >
                                        
                                <input name="product_id" type="hidden" :value="id">
                                <input name="category_name" type="hidden" :value="category_name">

                                <div class="card-body">
                                <input  @click="deleteProduct" type="submit"  class="submit rounded-circle nav-cart-item-del-btn position-absolute d-block"
                                        style="width: 18px;height: 18px;" value="">
                                <p class="card-title">{{ name }}</p>
                                <p class="card-text text-end">
                                        <span class="nav-cart-item-quantity pe-1">
                                                {{  quantity }} 
                                                {{  mesure_unit || 'Piece'}}
                                        </span>x<span
                                        class="nav-cart-item-price ps-1">
                                        {{ (Math.round(getFinalPrice * 100) / 100).toFixed(2)+' DH' }}
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
        name: 'CartHeaderContent',
     
        props:{
                image: String,
                name: String,
                sell_price:  Number,
                id:  Number,
                category_name: String,
                mesure_unit : String,
                quantity : Number,
                discount_active: Number,
                discount_percent: Number,
                discount_startDate :String,
                discount_endDate : String,
        },

      
        methods:{
          
            deleteProduct(e){
                this.$store.dispatch("deleteProduct",e)
            },
        },
        computed:{
             
                getFinalPrice(){
                        let product = [this.id,this.category_name];
                        return this.$store.getters.getFinalPrice(product)
                },
                 
        }
                
            
       
}
</script>

<style>

</style>