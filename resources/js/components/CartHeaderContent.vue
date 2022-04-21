<template>
               

                <div :key="product.id" v-for="product in filteredProducts" 
                    class="card nav-cart-item mb-1 d-flex justify-content-center" style="width: 300px;height: 80px;">
                 
                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                                <img :src="product.image" class="nav-cart-item-img">
                        </div>

                        <div class="col-8">
                                <form class="header-product-form" method="POST" novalidate >
                                        
                                <input class="product_id" name="product_id" type="hidden" :value="product.id">
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
</template>

<script>
export default {
        name: 'CartHeaderContent',
     
      
        methods:{

            set_deleted_product(id){
                this.$store.dispatch("set_deleted_product",id)
            },
            remove_incart_product(id){
                this.$store.dispatch("remove_incart_product",id)
            },
            get_deleted_products(){
                return this.$store.getters.get_deleted_products
            },
            deleteProduct(e){

                e.preventDefault()

                let form = e.currentTarget.closest("form");
                var data = new FormData(form);
                let product_id = data.get('product_id');
                
                let deleted = this.get_deleted_products();
                if(!deleted.includes(product_id)){

                    axios.delete('/cart/'+product_id) .then(response =>{

                            this.remove_incart_product(product_id)
                            // this.set_deleted_product(product_id);

                    });
                }
                   
            },

    
        },
        computed:{
            
           
             filteredProducts(){
                var  incart_products = this.$store.getters.get_incart_products;
                return  incart_products.filter(product => {
                    return (this.get_deleted_products() && this.get_deleted_products().length > 0) ? 
                    !this.get_deleted_products().some(d => d.includes(product.id)) : incart_products
                    
                }) 

            }
                
            },
       
}
</script>

<style>

</style>