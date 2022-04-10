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
                        <input class="form-control bg-light" type="text" id="input-filter" placeholder="Trouve ton produit">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-10 mt-2 mx-auto">
                            <div class="mb-3">Categorie</div>
                            <div class="ms-4 d-grid gap-1">
                                <div>
                                    <input type="checkbox" name="" id="check-all">
                                    <label class="ms-2" for="check-all">Tout</label>
                                </div>

                                <div :key="category.id" v-for="category in categories">
                                    <input type="checkbox" :class="{selected: isActive(category.name)}" @click="setActive(category.name)">
                                    
                                    <label class="ms-2" for="check-basket">
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
                            :category="product.category_name"></productCard>
                    
                </div>
                
            </div>
        </div>
          
</template>

<script>
import productCard from './components/productCard.vue'

export default {
        name: 'Shop',
        mounted(){
            console.log(this.categories)
        },
        props:{
            products: Object,
            categories: Object,
        },
        data(){
            return {
                // categories : ['fruits','legumes','epices','herbe','panier'],
                filtersAppied: [],


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
                },
        },
        computed:{
              filteredItems: function() {

                return this.products.filter( product => {
 
                return this.filtersAppied.every( filterAppied => {

             
                    if (product.category_name.includes(filterAppied)) {
                        
                        return product.category_name.includes(filterAppied);
                    }
                    // if (product.size.includes(filterAppied)) {
                    //     return product.size.includes(filterAppied);
                    // }
                    });
                });
                
                },
            // productFilter(){
            //     let cat = this.selectedCategory;

                
            //     if(cat != null){
            //          return this.products.filter(item => item.category_id == cat);
                     
            //     }
            //     //  return this.products; 
            // },
        },
}
</script>

<style scoped>
    .badge{
        cursor: pointer;
    }
</style>