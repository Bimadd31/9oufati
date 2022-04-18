<template>
               

            <div v-if="filteredProducts.length > 0">
                
                <div :key="product.id" v-for="product in filteredProducts" 
                    class="card nav-cart-item mb-1 d-flex justify-content-center" style="width: 300px;height: 80px;">
                 
                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                                <img :src="product.image" class="nav-cart-item-img">
                        </div>

                        <div class="col-8">
                                <form class="header-product-form" method="POST" novalidate >
                                        
                                <input class="product_id" name="product_id" type="hidden" :value="product.product_id">
                                <div class="card-body">

                                <input  @click="deleteProduct" type="submit"  class="submit rounded-circle nav-cart-item-del-btn position-absolute d-block"
                                        style="width: 18px;height: 18px;" value="">
                                <p class="card-title">{{ product.name }}</p>
                                <p class="card-text text-end">
                                        <span class="nav-cart-item-quantity pe-1">
                                                {{  product.quantity}} 
                                                {{  product.mesure_unit }}
                                        </span>x<span
                                        class="nav-cart-item-price ps-1">{{ (Math.round(product.sell_price * 100) / 100).toFixed(2)}} DH</span>
                                </p>
                                </div>
                                </form>
                        </div>
                    </div>   
                </div>
            </div>
            <div v-else>
                <div class="row text-center d-flex justify-content-center">
                    <span style="font-family:Ubuntu">Votre panier est vide !</span>
                </div>
            </div>
</template>

<script>
export default {
        name: 'CartHeaderContent',

        props:{
            basket_products: Object,
        },
        data(){
            return {
                deleted : [],
                
            }
        },
        watch:{
                // filteredProducts :function(val){
                //     this.EmitToParent();
                // }
        },
        methods:{
            deleteProduct(e){

                e.preventDefault()

                let form = e.currentTarget.closest("form");
                var data = new FormData(form);
                let product_id = data.get('product_id');

                if(!this.deleted.includes(product_id)){

                    axios.delete('/cart/'+product_id) .then(response =>{

                            this.deleted.push(product_id);
                    });
                }
                   
            },

    
        },
        computed:{
             filteredProducts(){
                 
                return this.basket_products.filter(product => {
                    return (Object.values(this.deleted) && Object.values(this.deleted).length > 0) ? 
                    !Object.values(this.deleted).some(d => d.includes(product.id)) : this.basket_products 
                    
                    
                }) 

            }
                
            },
       
}
</script>

<style>

</style>