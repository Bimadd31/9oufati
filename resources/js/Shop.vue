<template>
<div class="row">

                                        <!-- LEFT SIDE  -->

            <div class="col-md-3 shop-filter-container mt-5">
                <div class="row text-center">
                    <h4>Filtres</h4>
                </div>
                <div class="row pt-5">
                    <div class="col-md-10 mt-2 mx-auto">
                        <label for="input-filter" class="ms-2 mb-2 ">Rechercher</label>
                            
                        <input v-model="searchInput" class="form-control bg-light" type="text" id="input-filter" placeholder="Trouve ton produit">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-10 mt-2 mx-auto">
                            <div class="mb-3">Categorie</div>
                            <div class="ms-4 d-grid gap-1">
                               

                                <div :key="category.id" v-for="category in categories">
                                    <input type="checkbox" :id="category.name" :class="{selected: isActive(category.name)}" @click="setActive(category.name)">
                                    
                                    <label class="ms-2" :for="category.name">
                                    {{category.name.toLowerCase().replace(/^\w/, (c) => c.toUpperCase())}}
                                    </label>
                                </div>

                            </div>
                    </div>
                </div>
            </div>

                                        <!-- RIGHT SIDE  -->

            <div class="col-md-9 shop-product-container p-0">

                <div class="row  mt-4">
                    <div class="col-md-9">
                        <span :key="filterAppied"  v-for ="filterAppied in filtersAppied">
                            <span class="badge bg-danger" @click='removeTags(filterAppied)'>X {{filterAppied}}</span>
                        </span>
                    </div>
                    <div class="col-md-3 justify-content-end">
                        <select name="" id="sort" class="w-75  ">
                            <option value="">Tri par récent au plus ancien</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>

                <div id="shop-products-container" 
                class="row bg-light mt-3 p-4 w-100 row-cols-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5" >

                            
                            <productCard :key="product.id" v-for="product in filteredItems"
                            :image="product.image" 
                            :name="product.name"
                            :id="product.id"
                            :price="product.sell_price"
                            :category="product.category_name"
                            :mesure_unit="product.mesure_unit"></productCard>
                    
                </div>
                
            </div>
        </div>
          
</template>

<script>
import productCard from './components/productCard.vue'

export default {
        name: 'Shop',
        mounted(){

             this.onLoad();

        },
        props:{
            cat : String,
            products: Object,
            categories: Object,
        },
        data(){
            return {
                // categories : ['fruits','legumes','epices','herbe','panier'],
                filtersAppied: [],
                searchInput : ''
                

            }
        },
        components:{
            productCard,
        },
         methods:{

                setActive: function(element){
                        if(this.filtersAppied.indexOf(element) > -1){
                            this.filtersAppied.pop(element)
                        }else{
                            this.filtersAppied.push(element)
                        }
                    },
                isActive: function (menuItem) {
                    return this.filtersAppied.indexOf(menuItem) > -1
                },
                removeTags : function (item) {
                    this.filtersAppied.pop(item)
                    $("#"+item+"").prop('checked', false); 
                },
                onLoad(){

                    if(this.categories.some(cat => cat.name == this.cat.toUpperCase())){
                        let categorie_name = this.cat.toUpperCase();
                        this.setActive(categorie_name);
                        document.getElementById(""+categorie_name+"").checked = true;
                    }
                },
        },
        computed:{
                
              filteredItems: function() {
        
                return this.products.filter( product => {

                    if (this.filtersAppied.length > 0 && this.searchInput.length > 0 ){
                        if (this.filtersAppied.includes(product.category_name)){
                            
                            let ProductName = product.name.split('-');
                            let FrenchName = ProductName[0].toLowerCase();
                            let ArabicName = ProductName[1];
                            return FrenchName.includes(this.searchInput.toLowerCase());
                        }

                    }
                    if(this.filtersAppied.length > 0){
                        return this.filtersAppied.includes(product.category_name)
                    }
                    if(this.searchInput.length > 0 ){
        
                        let ProductName = product.name.split('-');
                        let FrenchName = ProductName[0].toLowerCase();
                        let ArabicName = ProductName[1];
                        return FrenchName.includes(this.searchInput.toLowerCase());
                    }

                    
                    
                    return this.products
                                    
                })
                
                },
        },
}
</script>

<style scoped>
    .badge{
        cursor: pointer;
        
    }
    label{
        cursor: pointer;
    }

</style>