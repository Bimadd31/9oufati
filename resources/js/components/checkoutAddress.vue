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

                        <div class="accordion-body address-accordion-edit-body">
                            <div class="row mt-4">
                                <div class="col-5 offset-1">
                                        <h6 class="">Informations personnelles</h6>
                                </div>
                            </div>
                            
                            <div class="row input-group mt-3">

                                <div class="col-5 text-center offset-md-1">
                                    
                                    <input class="form-control" type="text" placeholder="Nom" :value="this.user_info.last_name">
                                    
                                </div>
                                
                                <div class="col-5 ms-auto justify-content-center">

                                    <input class="form-control" type="text" placeholder="Prenom" :value="this.user_info.first_name">
                            
                                </div>
                                
                            </div>
                            <div class="row input-group mt-4">
                                <div class="col-5 offset-md-1">
                                    <input class="form-control" type="tel" name="" id="" placeholder="Telephone" :value="this.user_info.phone">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-5 offset-1">
                                    <h6 class="mt-3">Adresse</h6>
                                </div>
                            </div>
                            
                            <div class="row input-group mt-3">
                            
                                <div class="col-5 text-center offset-md-1">
                            
                                    <input class="form-control" type="text" placeholder="Rue, Avenue.." :value="this.user_info.address_line1">
                            
                                </div>
                            
                                <div class="col-5 ms-auto justify-content-center">
                            
                                    <input class="form-control mx-auto" type="text" name="" id="" placeholder="Appartement, bâtiment, etc (optionnel)"
                                    :value="this.user_info.address_line2">
                            
                                </div>
                            </div>
                            <div class="row input-group mt-4 ">
                            
                                <div class="col-5 text-center offset-md-1">
                            
                                    <input class="form-control" type="text" placeholder="Ville" :value="this.user_info.city">
                            
                                </div>
                            
                                <!-- <div class="col-5 ms-auto justify-content-center">
                            
                                    <input class="form-control w-75 float-start" type="text" name="" id="" placeholder="Code postal">
                            
                                </div> -->
                            </div>
                            <div class="row mt-5 justify-content-end">
                                <div class="col-2 text-end">
                                    <input id="cancel-primary" class="btn btn-light w-75" type="button" value="Annuler" @click="cancelAddress">
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
    
                    <div id="collapseTwo" class=" accordion-collapse collapse show" aria-labelledby="extra-address">
    
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
    
                                <div class="col-5 ms-auto justify-content-center">
    
                                    <input class="form-control w-75 float-start" type="text" name="" id=""
                                        placeholder="Code postal">
    
                                </div>
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
            primary_first_name : '',

            
        }
    },
    methods:{
        cancelAddress(e){
            
            if(e.currentTarget.id == 'cancel-primary'){
                $('.edit-primary-address-btn').click();
            }
            
        
        }
    },
    computed:{

    }
}
</script>

<style>

</style>