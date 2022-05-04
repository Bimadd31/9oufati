<template>
   <tr>
       
        
        <td><input type="checkbox"></td>
        <td><img :src="this.product.image" style="width:80px"></td>
        <td class="cart-item-name">{{this.product.name}}</td>
        <td class="cart-item-price">{{ (Math.round(getFinalPrice * 100) / 100).toFixed(2)+' DH' }}</td>
        <td class="product-qte-select">
            
            <input type="button" value="-" class="minus" @click="product_qte">
            <input type="text" name="quantity" class="shop-product-qte-value text-center border-0" v-model="this.quantity">
            <input type="button" value="+" class="plus" @click="product_qte">
        
        </td>

        <td class="cart-item-price">
            {{ (Math.round((getFinalPrice*this.product.quantity) * 100) / 100).toFixed(2)+' DH' }}
        </td>
        
        <input name="product_id" type="hidden" :value="this.product.id">
        <input name="category_name" type="hidden" :value="this.product.category_name">

        <td>
            <input type="submit" @click="deleteProduct" class="rounded-circle nav-cart-item-del-btn mx-auto border-0" style="width: 25px;height: 25px;" value="&nbsp;">
        </td>
       
    </tr>

</template>

<script>
export default {
    props:{
        product: Object,
    },
    data(){
        return{
            quantity : this.product.quantity
        }
    },
    methods:{
          deleteProduct(e){
                this.$store.dispatch("deleteProduct",e)
            },
           product_qte(e) {
                    
                if (e.currentTarget.className === "plus"){
                    if (this.quantity < this.product.stock){
                        this.quantity++
                    }
                }
                if (e.currentTarget.className === "minus") {
                    if(this.quantity > (this.product.min_quantity || 1)){
                        this.quantity--
                    }
                }
            },

        },
        watch:{
                    quantity(newValue,oldValue){
                        if(newValue != oldValue){
                            return axios({
                                    url : `/cart/${this.product.id}`,
                                    method : 'PATCH',
                                    data : {
                                            category_name : this.product.category_name,
                                            quantity : newValue
                                    }
                            }).then(response => {
                                    if (response.statusText == 'OK'){
                                        let product = [this.product.id,this.product.category_name,newValue]
                                        this.$store.dispatch("setProductQuantity",product)
                                        this.$store.state.subTotal = 0
                                    }
                            }).catch(err => {
                                    console.log(err)
                            })
                            }
                         },
                        // immediate: true
                    
                },
  
    computed:{
        
        getFinalPrice(){
                let product = [this.product.id,this.product.category_name];
                return this.$store.getters.getFinalPrice(product)
        },
    },
   

}
</script>

<style>

</style>