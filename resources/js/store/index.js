import { createStore } from 'vuex'


export default createStore({
  state () {
    return {
      incart_products : [],
    }
  },
  mutations: {
    set_incart_products(state,data){
      state.incart_products = data
    },
    add_incart_products(state,data){
      
        state.incart_products.push(data)
    },
    remove_incart_product(state,product){
      var index = state.incart_products.findIndex(p => p.id == product[0] && p.category_name == product[1]);
      
      if(index > -1){
              state.incart_products.splice(index,1)
      }
    }
  },
  actions:{
    add_incart_products({commit},data){
        commit('add_incart_products',data);
    },
    set_incart_products({commit},data){
      commit('set_incart_products',data)
    },
    remove_incart_product({commit},id){
      commit('remove_incart_product',id)
    }


  },
  getters:{
      get_incart_products(state){
        return state.incart_products
      },
      get_cart_count(state){
        return state.incart_products.length
      }
  }

})