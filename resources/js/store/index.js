import { createStore } from 'vuex'


export default createStore({
  state () {
    return {
      incart_products : {},
      deleted_products : [],
    }
  },
  mutations: {
    set_incartProducts(state,data){
      state.incart_products = data;
    },
    set_deleted_product(state,id){
      state.deleted_products.push(id)
    }
  },
  actions:{
    set_deleted_product({commit},id){
      commit('set_deleted_product',id)
    }

  },
  getters:{
      get_deleted_products(state){
        return state.deleted_products
      },
      get_incart_products(state){
        return state.incart_products
      },
      get_cart_count(state){
        return (state.incart_products.length - state.deleted_products.length)
      }
  }
 
})