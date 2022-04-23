<template>
    <div class="row ">
            <div class="col-5 col-xxl-4  d-flex justify-content-start align-items-center ">
                <img src="/img/cart-vector.png" alt="" >
            </div>
            <div class="col-6 col-xxl-4 d-flex flex-column justify-content-center align-items-center text-center pt-5 pe-xxl-3 " style="gap: 4rem;">
                <div class="cart-empty-msg">Votre panier est actuellement vide.</div>
                <a href="shop">
                <input class="cart-empty-return-btn" type="button" value="RETOUR A LA BOUTIQUE">
            </a>
            </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            incart_products : this.$store.getters.get_incart_products
        }
    },
    mounted(){
        console.log(this.incart_products)
    }
}
</script>

<style>

</style>