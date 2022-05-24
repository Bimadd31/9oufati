<template>
   <div class="row mt-5 justify-content-center">
        <div class="col-11">
            <h5 class="ms-3">Methode de payement :</h5>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-11">
            <div class="row checkout-payement-cod-container p-3 align-items-center m-0">
                <div class="col-1">
                    <img src="https://img.icons8.com/fluency/344/cash-on-delivery.png"
                        alt="" style="width: 40px;">
                </div>
                <div class="col-3">
                    <span>Paiement à la livraison :</span>
                </div>
                <div class="col-2">
                    <span>En espèce</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'checkoutPayement',
    data(){
        return{
            checkoutPayement : 'cash'
        }
    },

    watch:{
        checkoutPayement:{
            handler(newValue){
                this.$store.commit('set_checkout_payement',newValue);
            },
            immediate: true,
        }
    }
}
</script>

<style>

</style>