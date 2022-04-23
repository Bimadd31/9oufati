<template>
        
        <div class="col p-0  mx-1 shop-product-container" style="border-radius:10px; ">
            <div class="card text-center border-2 " style="border-radius:10px;overflow: hidden;">

                    <img :src="this.image" class="card-img-top" :alt="this.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ name }}</h5>
                       
                            
                        <p class="card-text" >{{ (Math.round(price * 100) / 100).toFixed(2) }} DH</p>
                    </div>

                <form  class="form-shop-add-product" method="POST" novalidate>
                
                    <div class="col-6 mb-3 mx-auto d-inline-flex justify-content-center mb-2 product-qte-select">
                        <input type="button" value="-" class="minus" @click="product_qte">
                        <input type="text" name="quantity" class="shop-product-qte-value w-25 text-center" value="1">
                        <input type="button" value="+" class="plus" @click="product_qte">
                        <input type="text" class="disabled border-0" name="mesure_unit" :value="mesure_unit">
                    </div>
                    
                    <div class="mb-3">
                        <input type="hidden" name="id" :value="this.id">
                        
                        <input @click="onSubmit" type="submit" class="submit" :value="basketStatus">
                    </div>
                </form>
            </div>
        </div>
                    
               
</template>


<script>

export default {
        data(){
            return{
                status : true,
            }
        },
        name: 'productCard',
        props:{
            image: String,
            name: String,
            price:  Number,
            id:  Number,
            category: String,
            mesure_unit : String
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
                data.append('category_name', this.category);

                 await axios.post('/cart',data) .then(response =>{
                        console.log(response.data);
                            if(response.data == 23000){
                               $(".exist-alert").click();
                            }else{
                                this.status = !this.status
                                let product = {
                                    id : this.id,
                                    name : this.name,
                                    image : this.image,
                                    sell_price : this.price,
                                    quantity : data.get('quantity'),
                                    mesure_unit : data.get('mesure_unit'),
                                    category_name : this.category
                                }

                                this.$store.dispatch("add_incart_products",product);  

                                
                                $(".success-alert").click();
                            }
                        });
                   

            },
            product_qte(e) {

                if (e.currentTarget.className === "plus"){
                    let input = e.currentTarget.previousElementSibling;
                    let value = parseInt(input.value, 10);
                    if (value < 10){
                        value++;
                        input.value = value;
                        
                    }
                }
                if (e.currentTarget.className === "minus") {
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
