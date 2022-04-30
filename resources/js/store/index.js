import { createStore } from 'vuex'


export default createStore({
  state () {
    return {
      incart_products : [],
      allProducts : [],
      subTotal : 0
    }
  },
  mutations: {
     set_allProducts(state,data){
      state.allProducts = data
    },
    set_incart_products(state,data){
      state.incart_products = data
    },
    add_incart_product(state,data){
      
        state.incart_products.push(data)
    },
    remove_incart_product(state,index){
      if(index > -1){
              state.incart_products.splice(index,1)
      }
    },
    
  
     
  },
  actions:{
    set_allProducts({commit},data){
     commit('set_allProducts',data)
    },
    set_incart_products({commit},data){
      commit('set_incart_products',data)
    },
    add_incart_product({commit},data){
        commit('add_incart_product',data);
    },
    remove_incart_product({commit,getters},product){
      let index = getters.find_incart_product(product)
      commit('remove_incart_product',index)
    },
    addProduct({state,getters,dispatch},payload){
        payload.e.preventDefault()
        const index = getters.find_in_allProduct(payload.product);
        const product = state.allProducts[index];

            if(product.stock > 0){
                let form = payload.e.currentTarget.closest("form")

                var data = new FormData(form);
                data.append('category_name', product.category_name);

                 axios.post('/cart',data) .then(response =>{
                      
                            if(response.data == 23000){
                               $(".exist-alert").trigger("click");
                            }else{

                              // this.status = !this.status
                                let item = {
                                    id : product.id,
                                    name : product.name,
                                    image : product.image,
                                    sell_price : product.sell_price,
                                    category_name : product.category_name,
                                    quantity : parseInt(data.get('quantity')),
                                    mesure_unit : product.mesure_unit,
                                    discount_active: product.discount_active,
                                    discount_percent: product.discount_percent,
                                    discount_startDate : product.discount_startDate,
                                    discount_endDate : product.discount_endDate,
                                }
                                  state.subTotal = 0
                                dispatch("add_incart_product",item);

                                $(".success-alert").trigger("click");
                            }
                        });
                }

            }
  
  },
  getters:{
      find_incart_product: (state) => (product) => {
        return state.incart_products.findIndex(p => p.id == product[0] && p.category_name == product[1]);
      },
      find_in_allProduct: (state) => (product) => {
        return state.allProducts.findIndex(p => p.id == product[0] && p.category_name == product[1]);
      },
      get_incart_products(state){
        return state.incart_products
      },
      get_cart_count(state){
        return state.incart_products.length
      },
      get_AllProducts(state){
        return state.allProducts
      },
      get_incartProduct_Qty: (state,getters) => (product) => {
          const index = getters.find_incart_product(product);
          const item = state.incart_products[index];
          return item.quantity;
      },
      getFinalPrice:(state,getters) => (product) =>{
         
          const index = getters.find_incart_product(product)
          const item = state.incart_products[index]
          const Currentdate = new Date().toJSON().slice(0, 19).replace('T', ' ');

          if(item.discount_active && item.discount_startDate < Currentdate && item.discount_endDate > Currentdate){
            let discounted_price =  item.sell_price-(item.sell_price*(item.discount_percent/100));
            return discounted_price
          } else {
            return item.sell_price
          }
          
      },
      get_cartsubTotal(state,getters){
            const incart_products = state.incart_products
            
            for(let i in incart_products){
              const p = [incart_products[i].id,incart_products[i].category_name];
              const price = getters.getFinalPrice(p)
              const quantity = getters.get_incartProduct_Qty(p);
              state.subTotal += price*quantity
            }

            return state.subTotal
      }
  
   

  }

})