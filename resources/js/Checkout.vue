<template>
<form method="POST" @submit="checkout">
         <div class="row m-0 ">
            <div class="col-8 bg-white checkout-form-container">

                                <!-- ACCOUNT ADDRESS -->

                    <div class="row mt-5 justify-content-center">
                        <div class="col-11">
                            <h5 class="ms-3">Adresse de livraison</h5>
                        </div>
                    </div>
                                <checkoutAddress></checkoutAddress>


                                <!-- PAYEMENT METHODS -->
                   
                                <checkoutPayement></checkoutPayement>

                            <!-- ADD NOTE -->
                    <div class="row mt-5 justify-content-center">
                        <div class="col-11">
                            <h5 class="ms-3">Informations complémentaires :</h5>
                        </div>
                    </div>
                    <div class="row m-0 mt-4 mb-5 justify-content-center ">
                        <div class="col-11">
                            <div class="row p-3 checkout-note-container">
                                <span>Notes de commandes (facultatif) :</span>
                                <textarea v-model="this.checkoutNote" class="form-control mt-3" name="checkout-note" id="" rows="5" maxlength="300"
                                placeholder="Commentaires concernant votre commande, ex. : consignes de livraison."></textarea>
                            </div>
                        </div>
                    </div>


            </div>

            <div class="col-4">

                <div class="row justify-content-center">
                    <div class="col-11 bg-white p-2" style="border-radius: 10px;">

                        <div class="row justify-content-center text-center">

                            <div class="col-10 mt-4">

                                <div class="text-start mt-3 mb-4">
                                    <h5>Votre commande</h5>
                                </div>
                                <div class="row overflow-auto checkout-items-container border border-2 border-light rounded-2 p-1" style="max-height: 200px;">
                                  
                                    <checkoutProduct :key="product.id" v-for="product in this.products" 
                                    :product="product"></checkoutProduct>
                                   
                                </div>
                                <div class="row mt-4">
                                    <div class="col-7 offset-5 text-start">

                                        <div class="checkout-subtotal ">
                                            <span>Sous-total :</span>
                                            <span class="float-end ">{{(this.subTotal).toFixed(2)+" DH"}}</span>
                                        </div>
                                        
                                        <div class="checkout-shipping">
                                            <span>Livraison :</span>
                                            <span class="float-end">{{ (shipping_price).toFixed(2)+" DH"}}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-3">
                                     <div class="vr-custom w-75 "></div>
                                </div>
                                <div class="row mt-4 mb-3">
                                    <div class="col-7 text-start ">
                                        <div class="checkout-total">
                                            <span>Total :</span>
                                            <span class="float-end">{{(subTotal + shipping_price).toFixed(2)+" DH TTC"}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="vr-custom" style="width: 95%;"></div>
                                </div>

                                                    <!-- DELIVERY DATE -->
                                                    
                                <div class="text-start mt-4 mb-4">
                                    <h5>Date de livraison</h5>
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <div class="col-9 ">
                                        <!-- <input class="form-control bg-light checkout-delivery" type="text" id="datetimepicker" @change="setDeliveryDate" required > -->
                                         <input class="form-control bg-light checkout-delivery" type="datetime-local" v-model="this.DeliveryDate" required >
                                    </div>
                                </div>
                            

                                <div class="terms text-start mt-5">
                                    <input class="me-1" type="checkbox" name="" required>
                                    <span class="">J’ai lu et j’accepte les conditions générales et
                                        notre politique de confidentialité.</span>
                                </div>
                                <input class="mt-4 mb-4 checkout-submit btn btn-success w-75" type="submit" value="Passer la commande">
                            
                            </div>
                        
                    </div>
                </div>
                   
                    
            </div>
            </div>
         </div>
</form>

                                               <!-- SUCCESS MODAL -->
    <button class="d-none success-order-modal-btn"  data-bs-toggle="modal" data-bs-target="#success">modal</button>
   <div class="modal fade" id="success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body bg-light">
                <div class="success-order-container container-fluid ">
                    <div class="row m-0 d-flex flex-column justify-content-center align-items-center text-center  my-5">
                        <img  src="/img/success-check.png" alt="" style="width:140px">
                        <div class="fs-4 mt-5">Votre commande a été traitée</div>
                        <div class="fs-6 mt-4">Numero de commande: #{{ orderID }}</div>
                        <a href="/shop" class="btn btn-success my-5 w-50" >
                            Voir detail
                        </a>
                    </div>
                
                </div>
                
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import checkoutAddress from './components/checkoutAddress.vue'
import checkoutPayement from './components/checkoutPayement.vue'
import checkoutProduct from './components/checkoutProduct.vue'

export default {
    name: 'Checkout_page',
    props:{
        user: Object,
    },
    data(){
        return{
            products: this.$store.getters.get_incart_products,
            subTotal: '',
            shipping_price : this.$store.state.shipping_price,
            checkoutNote: '',
            DeliveryDate : '',
            orderID: '',
        }
    },
    components:{
        checkoutAddress,
        checkoutProduct,
        checkoutPayement
    },
    created(){
      
        const primary_address = (({ id,first_name,last_name,address_line1, address_line2,phone,city }) => ({ id,first_name,last_name,address_line1, address_line2,phone,city }))(this.user);

         this.$store.dispatch('set_primary_address',primary_address)

    },
  
    methods:{
        deliveryPlan(deliveryDate){
            const today = new Date();
            return deliveryDate == today ? 'aujourd\'hui' : 'planifier'
        },
        checkout(e){
            e.preventDefault();
            var checkoutAddress = this.$store.getters.get_checkout_address
            var checkout_payement = this.$store.getters.get_checkout_payement;
            let missing = false
            for (const property in checkoutAddress){
             
                if(property == 'first_name' ||
                    property=='last_name' ||
                    property=='full_name' ||
                    property =='address_line1' ||
                    property=='city' ||
                    property=='phone'){
                
                    if(checkoutAddress[property] == null || checkoutAddress[property] == ''){
                        missing = true
                    }
                }
            }
            if (missing == true){
                  $(".missing-address-alert").click();
            } else {
                
                return axios({
                    url : `/checkout`,
                    method : 'POST',
                    data : {
                            checkoutAddress: checkoutAddress,
                            total : this.subTotal + this.shipping_price,
                            note : this.checkoutNote,
                            checkoutDeliveryDate: this.DeliveryDate,
                            checkoutPayement : checkout_payement,
                            }
                    }).then(response => {
                            if (response.statusText == 'OK'){
                                this.orderID=response.data
                                $(".success-order-modal-btn").click();
                            }
                    }).catch(err => {
                            console.log(err)
                    })
            }
        }
    },
    watch:{
        '$store.state.subTotal': {
            handler: function(nv) {
                
                this.subTotal = nv;
               
            },
            immediate: true
        }
    }
}
</script>

<style>

</style>