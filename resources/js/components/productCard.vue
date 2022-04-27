<template>
        
        <div class="col p-1 shop-product-container" style="border-radius:10px; ">
            <div class="card text-center border-2 " style="border-radius:10px;overflow: hidden;">
                   
            
                     
                    <img :src="this.image" class="card-img-top position-relative" :alt="this.name">

                    <span v-if="this.stock == 0" class="position-absolute top-50 start-50 badge bg-danger p-2">
                        STOCK ÉPUISÉ
                    </span>
                    <span v-if="discountValid" 
                                class="position-absolute top-0 start-0 translate-middle border border-light rounded-circle discount-badge ">
                            -{{this.discount_percent}}%
                    </span>

                    <div class="card-body">
                        <h5 class="card-title">{{ name }}</h5>
                        <p class="card-text">
                            
                            <span v-if="discountValid">
                                <span class="pe-3" style="color:#878181;">
                                    <s>
                                        {{(Math.round(this.price * 100) / 100).toFixed(2)+' DH'}}
                                    </s>
                                </span>
                                <span>{{ getDiscountedPrice }}</span>
                            </span>
                            <span v-else>
                                <span>{{(Math.round(this.price * 100) / 100).toFixed(2)+' DH'}}</span>
                            </span>
                        </p>

                    </div>

                <form  class="form-shop-add-product" method="POST" novalidate>
                
                    <div class="col-6 mb-3 mx-auto d-inline-flex justify-content-center mb-2 product-qte-select">
                        <input type="button" value="-" class="minus" @click="product_qte">
                        <input type="text" name="quantity" class="shop-product-qte-value w-25 text-center" :value="this.min_quantity || 1">
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
                status : 'true',
          
            }
        },
 
        name: 'productCard',
        props:{
            image: String,
            name: String,
            price:  Number,
            id:  Number,
            category_name: String,
            mesure_unit : String,
            discount_active: Number,
            discount_percent: Number,
            discount_startDate : Date,
            discount_endDate : Date,
            min_quantity: Number,
            stock: Number,
        },
         computed : {
            basketStatus (){
                    return (this.status) ? 'AJOUTER AU PANIER' : 'Ajouté';
                },
            getDiscountedPrice(){
                if(this.discount_active){
                    let discounted_price = this.price-(this.price*(this.discount_percent/100));
                    return (Math.round(discounted_price * 100) / 100).toFixed(2)+' DH'
                }else {
                    return this.price
                }
            },
            discountValid(){
                const Currentdate = new Date().toJSON().slice(0, 19).replace('T', ' ')
                return this.discount_active && this.discount_startDate < Currentdate && this.discount_endDate > Currentdate ? true : false
            },
        },
        methods: {
           
           async onSubmit(e){
                    e.preventDefault()
            if(this.stock != 0){
                let form = e.currentTarget.closest("form")
                
                var data = new FormData(form);
                data.append('category_name', this.category_name);

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
                                    price : this.price,
                                    category_name : this.category_name,
                                    quantity : parseInt(data.get('quantity')),
                                    mesure_unit : this.mesure_unit,
                                    discount_active: this.discount_active,
                                    discount_percent: this.discount_percent,
                                    discount_startDate : this.discount_startDate,
                                    discount_endDate : this.discount_endDate,
                                }

                                this.$store.dispatch("add_incart_products",product);  

                                
                                $(".success-alert").click();
                            }
                        });
                }

            },
            product_qte(e) {

                if (e.currentTarget.className === "plus"){
                    let input = e.currentTarget.previousElementSibling;
                    let value = parseInt(input.value, 10);
                    if (value < (this.stock || 5)){
                        value++;
                        input.value = value;
                        
                    }
                }
                if (e.currentTarget.className === "minus") {
                    let input = e.currentTarget.nextElementSibling;
                    let value = parseInt(input.value, 10);
                    if(value > (this.min_quantity || 1)){
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
