<template>
               

                <div  class="card nav-cart-item mb-1 d-flex justify-content-center" style="width: 300px;height: 80px;">
                 
                    <div class="row g-0">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                                <img :src="image" class="nav-cart-item-img">
                        </div>

                        <div class="col-8">
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
                                        {{ (Math.round(getDiscountedPrice * 100) / 100).toFixed(2)+' DH' }}
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
                price:  Number,
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

            remove_incart_product(product){
                this.$store.dispatch("remove_incart_product",product)
            },
          
            deleteProduct(e){

                e.preventDefault()

                let form = e.currentTarget.closest("form");
                var form_data = new FormData(form);

                let product_id = form_data.get('product_id');
                let category = form_data.get('category_name');

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

            },

    
        },
        computed:{
                discountValid(){
                const Currentdate = new Date().toJSON().slice(0, 19).replace('T', ' ')
                return this.discount_active && this.discount_startDate < Currentdate && this.discount_endDate > Currentdate ? true : false
            },
           getDiscountedPrice(){
                
                if(this.discountValid){
                    let discounted_price = this.price-(this.price*(this.discount_percent/100));
                    return discounted_price
                } else {
                    return this.price
                }
            }
                
            },
       
}
</script>

<style>

</style>