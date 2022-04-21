import { createStore } from 'vuex'


export default createStore({
  state () {
    return {
      incart_products : [],
      deleted_products : [],
    }
  },
  mutations: {
    set_incart_products(state,data){
      state.incart_products = data
    },
    set_deleted_product(state,id){
      state.deleted_products.push(id)
    },
    add_incart_products(state,data){
      
        state.incart_products.push(data)
    },
    remove_deleted_product(state,index){
     state.deleted_products.splice(index)
    },
    remove_incart_product(state,id){
      var index = state.incart_products.findIndex(p => p.id == id);

      if(index > -1){
              state.incart_products.splice(index,1)
      }
    }
  },
  actions:{
    set_deleted_product({commit},id){
      commit('set_deleted_product',id)
    },
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
      get_deleted_products(state){
        return state.deleted_products
      },
      get_incart_products(state){
        return state.incart_products
      },
      get_cart_count(state){
        return state.incart_products.length
      }
  }

})