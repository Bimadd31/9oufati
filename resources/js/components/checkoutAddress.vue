<template>

               <!-- PRIMARY ACCOUNT ADDRESS -->

    <div class="row mt-4 justify-content-center">
        <div class="col-11">
            <div class="address-accordion " id="">
                <div class="address-accordion-item p-3">
                    <!-- row-cols-sm-1 row-cols-md-6 -->
                    <div class="row address-accordion-header " id="main-address">

                        <div class="col-1 text-center"><input type="radio" name="address-option" value="primary-address" v-model="this.selected_address" :selected="this.selected_address"></div>
                        <div class="col-3 shipping-contact-name">
                            {{ this.primary_address.last_name }} {{ this.primary_address.first_name }}
                        </div>
                        <div class="col-3 shipping-contact-address">
                            {{ this.primary_address.address_line1 ||'---------' }}
                        </div>
                        <div class="col-2 shipping-contact-address-additional">
                             {{ this.primary_address.address_line2 ||'---------' }}
                        </div>
                        <div class="col-1 shipping-contact-city">
                           {{ this.primary_address.city ||'---------' }}
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
                                    
                                    <input class="form-control" type="text" name="last_name" placeholder="Nom"  :defaultValue="this.primary_address.last_name" required>
                                    
                                </div>
                                
                                <div class="col-5 ms-auto justify-content-center">

                                    <input class="form-control" type="text" name="first_name" placeholder="Prenom" :defaultValue="this.primary_address.first_name" required>
                            
                                </div>
                                
                            </div>
                            <div class="row input-group mt-4">
                                <div class="col-5 offset-md-1">
                                    <input class="form-control" type="tel" name="phone" placeholder="Telephone" :defaultValue="this.primary_address.phone" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-5 offset-1">
                                    <h6 class="mt-3">Adresse</h6>
                                </div>
                            </div>
                            
                            <div class="row input-group mt-3">
                            
                                <div class="col-5 text-center offset-md-1">
                            
                                    <input class="form-control" type="text" name="address_line1" placeholder="Rue, Avenue.." :defaultValue="this.primary_address.address_line1" required>
                            
                                </div>
                            
                                <div class="col-5 ms-auto justify-content-center">
                            
                                    <input class="form-control mx-auto" type="text" name="address_line2" placeholder="Appartement, bâtiment, etc (optionnel)"
                                   :defaultValue="this.primary_address.address_line2">
                            
                                </div>
                            </div>
                            <div class="row input-group mt-4 ">
                            
                                <div class="col-5 text-center offset-md-1">

                                    <select class="form-control" name="city" required>
                                        <option value="" disabled>Ville</option>
                                        <option value="Rabat" :selected="this.primary_address.city">Rabat</option>
                                        <option value="Temara" :selected="this.primary_address.city">Temara</option>
                                    </select>
                            
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

                    <div v-if="this.additional_address.name" class="row  address-accordion-header" id="additional-address">
    
                        <div class="col-1 text-center"><input type="radio" name="address-option" value="additional-address" v-model="this.selected_address" :selected="this.selected_address"></div>
                       
                            <div class="col-3 shipping-contact-name">
                                {{ this.additional_address.name }}
                            </div>
                            <div class="col-3 shipping-contact-address">
                                {{ this.additional_address.address_line1 }}
                            </div>
                            <div class="col-2 shipping-contact-address-additional">
                                {{ this.additional_address.address_line2 }}
                            </div>
                            <div class="col-1 shipping-contact-city">
                                {{ this.additional_address.city }}
                            </div>
    
                        <button class="col-2 ms-auto edit-address-btn edit-additional-address-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Modifier
                        </button>
                    </div>

                     <div v-else class="row  address-accordion-header" id="additional-address">
    
                        <div class="col-1 text-center"><input type="radio" name="address-option" value="additional-address" v-model="this.selected_address" :selected="this.selected_address"></div>
                       
                            <div class="col-3 fw-bold">Utiliser une autre adresse</div>
    
                        <button class="col-2 ms-auto edit-address-btn edit-additional-address-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Modifier
                        </button>
                    </div>

    
                    <div id="collapseTwo" class=" accordion-collapse collapse hide" aria-labelledby="extra-address">
    
                        <form @submit="editAdditionalAddress" method="POST" class="accordion-body address-accordion-edit-body">
                            <div class="row mt-4">
                                <div class="col-5 offset-1">
                                    <h6 class="">Informations personnelles</h6>
                                </div>
                            </div>
    
                            <div class="row input-group mt-3">
    
                                <div class="col-5 text-center offset-md-1">
    
                                    <input class="form-control" type="text" placeholder="Nom complet"
                                     v-model="this.additional_address.name" name="full_name" required>
    
                                </div>
    
                                <div class="col-5 ms-auto justify-content-center">
    
                                    <input class="form-control w-75 float-start" type="tel" name="phone"
                                        placeholder="Telephone" 
                                        v-model="this.additional_address.phone" required>
    
                                </div>
                            </div>
    
                            <div class="row mt-5">
                                <div class="col-5 offset-1">
                                    <h6 class="mt-3">Adresse</h6>
                                </div>
                            </div>
    
                            <div class="row input-group mt-3">
    
                                <div class="col-5 text-center offset-md-1">
    
                                    <input class="form-control" type="text" placeholder="Rue, Avenue.." 
                                    v-model="this.additional_address.address_line1" name="address_line1" required>
    
                                </div>
    
                                <div class="col-5 ms-auto justify-content-center">
    
                                    <input class="form-control mx-auto" type="text" name="address_line2"
                                        placeholder="Appartement, bâtiment, etc (optionnel)" 
                                        v-model="this.additional_address.address_line2">
    
                                </div>
                            </div>
                            <div class="row input-group mt-5 ">
    
                                <div class="col-5 text-center offset-md-1">
                                    <select class="form-control" name="city"
                                    v-model="this.additional_address.city" required>
                                        <option disabled value="">Ville</option>
                                        <option value="Rabat" :selected="this.additional_address.city">Rabat</option>
                                        <option value="Temara" :selected="this.additional_address.city">Temara</option>
                                    </select>
    
                                </div>
    
                                <!-- <div class="col-5 ms-auto justify-content-center">
    
                                    <input class="form-control w-75 float-start" type="text" name="" id=""
                                        placeholder="Code postal">
    
                                </div> -->
                            </div>
                            <div class="row mt-5 justify-content-end">
                                <div class="col-2 text-end">
                                    <input @click="cancelAddress" id="cancel-additional" class="btn btn-light w-75" type="reset" value="Annuler">
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
</template>

<script>
export default {
    name: 'checkoutAddress',
    data(){
        return{
            primary_address: this.$store.getters.get_primary_address,
            additional_address: {
                name: '',
                phone: '',
                address_line1: '',
                address_line2: '',
                city: '',
            },
            selected_address : 'primary-address'

        }
    },
    watch: {
        selected_address :{
            handler(newValue){

                if (newValue == 'primary-address'){

                    this.$store.dispatch('set_checkout_address',this.primary_address)

                } else if (newValue == 'additional-address'){

                    this.$store.dispatch('set_checkout_address',this.additional_address)
                }
                
            },
            immediate : true
        }

    },
    methods:{
        cancelAddress(e){
          
            switch (e.currentTarget.id){
            case 'cancel-primary':
                $('.edit-primary-address-btn').click();
                break;
            case 'cancel-additional':
                $('.edit-additional-address-btn').click()
                break;
            }
            
        },
        editAdditionalAddress(e){
            e.preventDefault();
            let form = e.currentTarget.closest("form");
            const form_data = new FormData(form);
            this.additional_address.name = form_data.get('full_name')
            this.additional_address.address_line1 = form_data.get('address_line1')
            this.additional_address.address_line2 = form_data.get('address_line2')
            this.additional_address.phone = form_data.get('phone')
            this.additional_address.city = form_data.get('city')
            this.$store.dispatch('set_checkout_address',this.additional_address)
            this.selected_address = 'additional-address';
            $('.edit-additional-address-btn').click();

        },
        async editPrimaryAddress(e){
            e.preventDefault();
            let form = e.currentTarget.closest("form");
            const form_data = new FormData(form);

            const formDataObject = {
                'first_name' : form_data.get('first_name'),
                'last_name' : form_data.get('last_name'),
                'address_line1' : form_data.get('address_line1'),
                'address_line2' : form_data.get('address_line2'),
                'phone' : form_data.get('phone'),
                'city' : form_data.get('city')
            }

            return axios({
                    url : `/account/${this.primary_address.id}`,
                    method : "PATCH",
                    data : formDataObject,
            }).then(response => {
                    if (response.statusText == 'OK'){
                        this.$store.dispatch('update_primary_address',formDataObject)
                        this.$store.dispatch('set_checkout_address',this.primary_address)
                        this.selected_address = 'primary-address'
                        $('.edit-primary-address-btn').click();
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