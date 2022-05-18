<template>

    <div  v-if="(this.get_product_count > 0)" class="row m-0 ">
                <div class="col-8">
                    
                    <div class="row bg-white p-3">
                        <span style="font-weight: 500;font-size: 25px;">Panier ({{this.get_product_count}} Articles)</span>
                        <div class="d-inline-block cart-select ps-3 pt-1">
                            <input type="checkbox" name="" id="select-product">
                            <label class="ps-1" for="select-product">Tout sélectionner</label>
                        </div>
                    </div>

                    <div class="row bg-white mt-3 p-3">
                            <div class="ps-4 py-4" style="font-family: 'lato',sans-serif;font-size:1.2rem;font-weight: 400;">
                                <span style="color: #812C2C;">Remarque :</span>
                                    Un montant total minimum de 100 DH est requis pour valider votre commande.
                            </div>
                        <div class="vr-custom"></div>
                    </div>
                    
                    <div class="row bg-white justify-content-center ">
                        <div class="col-11 col-xxl-11 ">
                            <form method="POST" novalidate>
                                <table class="cart-product-table mb-4  ">
                                    <thead>
                                        <tr>
                                            <th width="8%"></th>
                                            <th width="8%"></th>
                                            <th width="20%" >Produit</th>
                                            <th width="15%">Prix</th>
                                            <th width="18%">Quantité</th>
                                            <th width="15%">Sous-total</th>
                                            <th width="10%"></th>
                                        </tr>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        
                                    <cartProduct :key="product.id" v-for="product in this.getIncartProducts" :product="product"></cartProduct>
                            
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-3 col-md-4 offset-1 offset-md-0  ">
                    <div class="row justify-content-end ">
                        <div class="col-10 bg-white rounded-2">
                            <div class="col-8 mx-auto mt-5 cart-total-container">
                                <h4>TOTAL PANIER</h4>
                                <div class="mt-5">
                                    <span>Sous-total :</span>
                                    <span class="float-end">{{ (this.total).toFixed(2)+' DH' }}</span>
                                </div>
                                <div class="mt-4">
                                    <span>Livraison :</span>
                                    <span class="float-end">{{ (this.shipping_price).toFixed(2)+' DH'}}</span>
                                </div>
                                <div class="vr-custom w-75 mt-5"></div>
                                <div class="mt-4 fw-bolder">
                                    <span>Total TTC :</span>
                                    <span class="float-end">{{ (this.total+this.shipping_price).toFixed(2)+' DH'}}</span>
                                </div>
                                <div class="text-center mt-4 mb-5">
                                    <button class="validate-btn" @click="checkout">
                                        Valider la commande
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
    
    <div v-else class="row m-0 bg-white">
        <div class="col-12 d-flex ">
            <div class="col-3 offset-2 d-flex justify-content-start align-items-center ">
                <img src="/img/cart-vector.png" alt="" >
            </div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-center text-center pt-5 pe-xxl-3 " style="gap: 4rem;">
                <div class="cart-empty-msg">Votre panier est actuellement vide.</div>
                <a href="shop">
                <input class="cart-empty-return-btn" type="button" value="RETOUR A LA BOUTIQUE">
                </a>
            </div>
        </div>
    </div>
         
</template>

<script>
import cartProduct from './components/cartProduct.vue'
export default {
    data(){
        return{
            total : 0,
            shipping_price : this.$store.state.shipping_price
        }
    },
    components:{
        cartProduct,
    },

    methods:{
        checkout(){
            if(this.total > 100) {
                location.href = "/checkout"
            } else {
                console.log("u can't")
            }
        }
    },
    watch:{
       "$store.state.subTotal": {
            handler: function(nv) {
                this.total = nv;
            },
            immediate: true
        }
    },
    computed:{
       get_product_count(){
            return this.$store.getters.get_cart_count
        },
        getIncartProducts(){
            return this.$store.getters.get_incart_products
        },
      
    },
  
}
</script>

<style>

</style>