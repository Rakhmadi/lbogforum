import { createStore } from 'vuex'

export const store = createStore({
  state () {
    return {
      userDetail: []
    }
  },
  mutations:{
    setUserDetail (state, userDetail) {
      state.userDetail = userDetail
    }
  },actions: { 
    getUserInfo (store,userId) {
      return fetch(`/api/userDetail/${userId}?token=${sessionStorage['token']}`)
      .then(x=>x.json())
      .then(data=>{
        localStorage.setItem('userDetail',JSON.stringify(data))
        store.commit('setUserDetail',data)
        return store.state.userDetail
      })
    }
   }
})