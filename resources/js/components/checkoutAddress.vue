<template>

               <!-- PRIMARY ACCOUNT ADDRESS -->

    <div class="row mt-4 justify-content-center">
        <div class="col-11">
            <div class="address-accordion " id="">
                <div class="address-accordion-item p-3">
                    <!-- row-cols-sm-1 row-cols-md-6 -->
                    <div class="row address-accordion-header " id="main-address">

                        <div class="col-1 text-center"><input type="radio" name="address-option" id=""></div>
                        <div class="col-3 shipping-contact-name">
                            {{ this.user_info.last_name }} {{ this.user_info.first_name }}
                        </div>
                        <div class="col-3 shipping-contact-address">
                            {{ this.user_info.address_line1 ||'---------' }}
                        </div>
                        <div class="col-2 shipping-contact-address-additional">
                             {{ this.user_info.address_line2 ||'---------' }}
                        </div>
                        <div class="col-1 shipping-contact-city">
                           {{ this.user_info.city ||'---------' }}
                        </div>
                        
                        <button class="col-2 edit-primary-address-btn edit-address-btn"
                        type="button"
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne">
                            Modifier
                        </button>
                    </div>

                    <div id="collapseOne"   
                        class=" accordion-collapse collapse hide"
                        aria-labelledby="main-address">

                        <form @submit="editPrimaryAddress" method="POST" class="accordion-body address-accordion-edit-body">
                           
                            <div class="row mt-4">
                                <div class="col-5 offset-1">
                                        <h6 class="">Informations personnelles</h6>
                                </div>
                            </div>
                            
                            <div class="row input-group mt-3">

                                <div class="col-5 text-center offset-md-1">
                                    
                                    <input class="form-control" type="text" name="last_name" placeholder="Nom"  :defaultValue="this.user_info.last_name" required>
                                    
                                </div>
                                
                                <div class="col-5 ms-auto justify-content-center">

                                    <input class="form-control" type="text" name="first_name" placeholder="Prenom" :defaultValue="this.user_info.first_name" required>
                            
                                </div>
                                
                            </div>
                            <div class="row input-group mt-4">
                                <div class="col-5 offset-md-1">
                                    <input class="form-control" type="tel" name="phone" placeholder="Telephone" :defaultValue="this.user_info.phone" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-5 offset-1">
                                    <h6 class="mt-3">Adresse</h6>
                                </div>
                            </div>
                            
                            <div class="row input-group mt-3">
                            
                                <div class="col-5 text-center offset-md-1">
                            
                                    <input class="form-control" type="text" name="address_line1" placeholder="Rue, Avenue.." :defaultValue="this.user_info.address_line1" required>
                            
                                </div>
                            
                                <div class="col-5 ms-auto justify-content-center">
                            
                                    <input class="form-control mx-auto" type="text" name="address_line2" placeholder="Appartement, bâtiment, etc (optionnel)"
                                   :defaultValue="this.user_info.address_line2">
                            
                                </div>
                            </div>
                            <div class="row input-group mt-4 ">
                            
                                <div class="col-5 text-center offset-md-1">
                            
                                    <input class="form-control" type="text" name="city" placeholder="Ville" :defaultValue="this.user_info.city" required>
                            
                                </div>
                            
                                <!-- <div class="col-5 ms-auto justify-content-center">
                            
                                    <input class="form-control w-75 float-start" type="text" name="" id="" placeholder="Code postal">
                            
                                </div> -->
                            </div>
                            <div class="row mt-5 justify-content-end">
                                <div class="col-2 text-end">
                                      <input id="cancel-primary" class="btn btn-light w-75" type="reset" value="Annuler" @click="cancelAddress">
                                </div>
                              
                                <div class="col-2 text-center">
                                    <input class="btn btn-danger w-75" type="submit" value="Confirmer">
                                </div>
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

                <!-- USE ANOTHER ADDRESS -->
            
    <div class="row mt-4 justify-content-center">
        <div class="col-11">
            <div class="address-accordion " id="">
                <div class="address-accordion-item p-3">
                    <!-- row-cols-sm-1 row-cols-md-6 -->
                    <div class="row  address-accordion-header " id="extra-address">
    
                        <div class="col-1 text-center"><input type="radio" name="address-option" id=""></div>

                        <!-- <div class="col-3 shipping-contact-name">El Hassnaoui Imad</div>
                        <div class="col-3 shipping-contact-address">HAY NAKHIL N1987</div>
                        <div class="col-2 shipping-contact-address-additional">HAY RIAD, RABAT</div>
                        <div class="col-1 shipping-contact-postal">12020</div> -->

                        <div class="col-3 fw-bold">Utiliser une autre adresse</div>
    
                        <button class="col-2 ms-auto edit-address-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Modifier
                        </button>
                    </div>
    
                    <div id="collapseTwo" class=" accordion-collapse collapse hide" aria-labelledby="extra-address">
    
                        <div class="accordion-body address-accordion-edit-body">
                            <div class="row mt-4">
                                <div class="col-5 offset-1">
                                    <h6 class="">Informations personnelles</h6>
                                </div>
                            </div>
    
                            <div class="row input-group mt-3">
    
                                <div class="col-5 text-center offset-md-1">
    
                                    <input class="form-control" type="text" placeholder="Nom complet">
    
                                </div>
    
                                <div class="col-5 ms-auto justify-content-center">
    
                                    <input class="form-control w-75 float-start" type="text" name="" id=""
                                        placeholder="Telephone">
    
                                </div>
                            </div>
    
                            <div class="row mt-5">
                                <div class="col-5 offset-1">
                                    <h6 class="mt-3">Adresse</h6>
                                </div>
                            </div>
    
                            <div class="row input-group mt-3">
    
                                <div class="col-5 text-center offset-md-1">
    
                                    <input class="form-control" type="text" placeholder="Rue, Avenue..">
    
                                </div>
    
                                <div class="col-5 ms-auto justify-content-center">
    
                                    <input class="form-control mx-auto" type="text" name="" id=""
                                        placeholder="Appartement, bâtiment, etc (optionnel)">
    
                                </div>
                            </div>
                            <div class="row input-group mt-5 ">
    
                                <div class="col-5 text-center offset-md-1">
    
                                    <input class="form-control" type="text" placeholder="Ville">
    
                                </div>
    
                                <!-- <div class="col-5 ms-auto justify-content-center">
    
                                    <input class="form-control w-75 float-start" type="text" name="" id=""
                                        placeholder="Code postal">
    
                                </div> -->
                            </div>
                            <div class="row mt-5 justify-content-end">
                                <div class="col-2 text-end">
                                    <input class="btn btn-light w-75" type="submit" value="Annuler">
                                </div>
                                <div class="col-2 text-center">
                                    <input class="btn btn-danger w-75" type="submit" value="Confirmer">
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'checkoutAddress',
    data(){
        return{
            user_info: this.$store.getters.get_user_info,
            additional_shipping_address: []

            
        }
    },
    methods:{
        cancelAddress(e){
            
            if(e.currentTarget.id == 'cancel-primary'){
                $('.edit-primary-address-btn').click();
            }
            
        },
        async editPrimaryAddress(e){
            e.preventDefault();
            let form = e.currentTarget.closest("form");
            var form_data = new FormData(form);
            const formDataObject = {
                'first_name' : form_data.get('first_name'),
                        'last_name' : form_data.get('last_name'),
                        'address_line1' : form_data.get('address_line1'),
                        'address_line2' : form_data.get('address_line2'),
                        'phone' : form_data.get('phone'),
                        'city' : form_data.get('city')
            }
            return axios({
                    url : `/account/${this.user_info.id}`,
                    method : "PATCH",
                    data : formDataObject,
            }).then(response => {
                    if (response.statusText == 'OK'){
                        $('.edit-primary-address-btn').click();
                        this.$store.dispatch('update_user_info',formDataObject)
                    }
            }).catch(err => {
                    console.log(err)
            })
        }
    },
}
</script>

<style>

</style>