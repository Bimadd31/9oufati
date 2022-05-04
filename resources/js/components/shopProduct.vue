<template>

        <div class="col p-1 shop-product-container" style="border-radius:10px; ">
            <div class="card text-center border-2 " style="border-radius:10px;overflow: hidden;">



                    <img :src="this.product.image" class="card-img-top position-relative" :alt="this.product.name">

                    <!-- <span
                        v-if="this.stock == 0"
                        class="position-absolute w-100 align-middle text-danger d-flex justify-content-center align-items-center fw-bold"
                        style="height:58%;z-index: 5;">
                        STOCK ÉPUISÉ
                    </span> -->


                    <span v-if="discountValid"
                                class="position-absolute top-0 start-0 translate-middle border border-light rounded-circle discount-badge ">
                            -{{this.product.discount_percent}}%
                    </span>

                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">

                            <span v-if="discountValid">
                                <span class="pe-3" style="color:#878181;">
                                    <s>
                                        {{(Math.round(this.product.sell_price * 100) / 100).toFixed(2)+' DH'}}
                                    </s>
                                </span>
                                <span>{{(Math.round(getFinalPrice * 100) / 100).toFixed(2)+' DH' }}</span>
                            </span>
                            <span v-else>
                                <span>{{(Math.round(this.product.sell_price * 100) / 100).toFixed(2)+' DH'}} / </span>
                                <span class="text-uppercase fw-bold my-2 text-black-50" style="font-family:Ubuntu">{{product.mesure_unit || 'Unité'}}</span>

                            </span>
                        </p>

                    </div>

                <form  class="form-shop-add-product" method="POST" novalidate>

                    <div class="col-6 mb-3 mx-auto d-inline-flex justify-content-center product-qte-select">
                      
                        <input type="button" value="-" class="minus" @click="product_qte">
                        <input type="text" name="quantity" class="shop-product-qte-value w-25 text-center" v-model="this.quantity" >
                        <input type="button" value="+" class="plus" @click="product_qte">
                       
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" :value="this.product.id">
                        <input v-if="this.product.stock > 0" @click="addProduct" type="submit" class="submit" :value="basketStatus">
                         <input v-else type="button" class="submit bg-danger" value="STOCK EPUISÉ">

                    </div>
                </form>
            </div>
        </div>


</template>


<script>

export default {
        data(){
            return{
                status : 'true',
                quantity : this.product.min_quantity || 1
            }
        },
        name: 'productCard',
        props:{
            product: Object,
        },
                       

        methods: {


            addProduct(e){
                let product = [this.product.id,this.product.category_name];
                
                this.$store.dispatch("addProduct",{
                    e : e,
                    product : product,
                }).then(success=>{
                    if(success){
                        setTimeout(()=>{
                            this.status = !this.status
                        },3000)
                            this.status = !this.status
                    }
                })
            },

            product_qte(e) {
                    
                if (e.currentTarget.className === "plus"){
                    if (this.quantity < this.product.stock){
                        this.quantity++
                    }
                }
                if (e.currentTarget.className === "minus") {
                    if(this.quantity > (this.product.min_quantity || 1)){
                        this.quantity--
                    }
                }
            }

        },  
              
        
                computed : {
            basketStatus (){
                    return (this.status) ? 'AJOUTER AU PANIER' : 'Ajouté';
                },
            discountValid(){
                    const Currentdate = new Date().toJSON().slice(0, 19).replace('T', ' ');
                    return this.product.discount_active && this.product.discount_startDate < Currentdate && this.product.discount_endDate > Currentdate ? true : false
                },
            getFinalPrice(){
                    return this.product.sell_price-(this.product.sell_price*(this.product.discount_percent/100));
            }

        },
}
</script>



<style>

</style>
