<template>
    <div class="row m-0 checkout-card-item p-3 align-items-center">
            <div class="col-4 text-center p-0 checkout-card-item-name text-start text-truncate ">
                <span>{{ product.name }}</span>
            </div>
            <div class="col-5 p-0 text-center">
                <span class="checkout-card-item-quantity fw-bold">{{product.quantity}} {{product.mesure_unit}} x </span>
                <span class="checkout-card-item-price"> {{ (getFinalPrice).toFixed(2)+' DH' }}</span>
            </div>
            <div class="col-3 p-0 border-1 border-start border-dark text-center checkout-card-item-price">
                <span class="fw-bold">{{ (getSubTotal).toFixed(2)+' DH' }}</span>
            </div>
        </div>
</template>

<script>
export default {
    name: 'checkoutProduct',
    props:{
        product: Object,
    },
   
    mounted(){
    },
    methods:{
        
    },
    computed:{
         getFinalPrice(){
                        let product = [this.product.id,this.product.category_name];
                        return this.$store.getters.getFinalPrice(product)
            },
        getSubTotal(){
            return this.product.quantity * this.getFinalPrice
        }
    }
}
</script>

<style>

</style>