<template>
         <div class="col p-0  mx-1 shop-product-container" style="border-radius:10px; ">
                    
                        <div class="card text-center border-2 " style="border-radius:10px;overflow: hidden;">

                                <img :src="this.image" class="card-img-top" :alt="this.name">
                                <div class="card-body">
                                    <h5 class="card-title">{{ name }}</h5>
                                </div>

                            <form  id="form-shop-add-product" method="POST" novalidate>
                            
                                <div class="col-6 mb-3 mx-auto d-inline-flex justify-content-center mb-2 product-qte-select">
                                    <input type="button" value="-" id="minus" @click="product_qte">
                                    <input type="text" name="quantity" id="shop-product-qte-value" class="w-25 text-center" value="1">
                                    <input type="button" value="+" id="plus" @click="product_qte">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="product_id" :value="this.id">
                                    
                                    <input @click="onSubmit" type="submit" id="submit" :value="basketStatus">
                                    {{category}}
                                </div>
                            </form>
                        </div>
                    
                    </div>
</template>


<script>

export default {
      mounted() {
            console.log('Component mounted.')
            
        },
        data(){
            return{
                status : true,
            }
        },
        name: 'addProduct',
        props:{
            image: String,
            name: String,
            price:  String,
            id:  String,
            category: String,
        },
         computed : {
            basketStatus (){
                    return (this.status) ? 'AJOUTER AU PANIER' : 'Ajouté';
                }
        },
        methods: {
           async onSubmit(e){
                    e.preventDefault()
                let form = e.currentTarget.closest("form")
                var data = new FormData(form);
            
                
                 await axios.post('/cart',data) .then(response =>{
                            if(response.data == 23000){
                               $(".exist-alert").click();
                            }else{
                                this.status = !this.status
                                $(".success-alert").click();
                            }
                        });
                   

            },
            product_qte(e) {

                if (e.currentTarget.id === "plus"){
                    let input = e.currentTarget.previousElementSibling;
                    let value = parseInt(input.value, 10);
                    if (value < 10){
                        value++;
                        input.value = value;
                        
                    }
                }
                if (e.currentTarget.id === "minus") {
                    let input = e.currentTarget.nextElementSibling;
                    let value = parseInt(input.value, 10);
                    if(value > 1){
                        value--;
                        input.value = value;
                    }
                }
            }
            
              
           
        }
}
</script>



<style>

</style>
