<template>
               

                <div :key="product.id" v-for="product in filteredProducts" 
                    class="card nav-cart-item mb-1 d-flex justify-content-center" style="width: 300px;height: 80px;">
                 
                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                                <img :src="product.image" class="nav-cart-item-img">
                        </div>

                        <div class="col-8">
                                <form class="header-product-form" method="POST" novalidate >
                                        
                                <input name="product_id" type="hidden" :value="product.id">
                                <input name="category" type="hidden" :value="product.category_name">

                                <div class="card-body">

                                <input  @click="deleteProduct" type="submit"  class="submit rounded-circle nav-cart-item-del-btn position-absolute d-block"
                                        style="width: 18px;height: 18px;" value="">
                                <p class="card-title">{{ product.name }}</p>
                                <p class="card-text text-end">
                                        <span class="nav-cart-item-quantity pe-1">
                                                {{  product.quantity }} 
                                                {{  product.mesure_unit || 'Piece'}}
                                        </span>x<span
                                        class="nav-cart-item-price ps-1">
                                        {{ (Math.round((product.sell_price || product.price) * 100) / 100).toFixed(2)}} DH
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
     
      
        methods:{

         
            remove_incart_product(product){
                this.$store.dispatch("remove_incart_product",product)
            },
          
            deleteProduct(e){

                e.preventDefault()

                let form = e.currentTarget.closest("form");
                var form_data = new FormData(form);

                let product_id = form_data.get('product_id');
                let category = form_data.get('category');

                let product = [product_id,category];

                axios({
                        url : `/cart/${product_id}`,
                        method : 'DELETE',
                        data : {category_name : category}
                }).then(response => {
                        if (response.statusText == 'OK'){
                                this.remove_incart_product(product)
                        }
                }).catch(err => {
                        console.log(err)
                })


                //     axios.delete(`/cart/${product_id}`,{category_name : category}) .then(response =>{
                //             console.log(response);
                //             this.remove_incart_product(product)

                //     }).catch(err =>{
                //             console.log(err);
                //     });
                   
            },

    
        },
        computed:{
            
           
             filteredProducts(){
                var incart_products = this.$store.getters.get_incart_products;

                return  incart_products

            }
                
            },
       
}
</script>

<style>

</style>