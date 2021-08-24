import { createStore } from 'vuex'
import axios from "axios";

export const store = createStore({
  state:{
      userDetail: [],
      postList: [],
  },
  mutations:{
    setUserDetail (state, userDetail) {
      state.userDetail = userDetail
    },
    postLists (state, postList) {
      return state.postList = postList
    },
    
  },actions: { 
    getUserInfo (store,userId) {
      return fetch(`/api/userDetail/${userId}?token=${sessionStorage['token']}`)
      .then(x=>x.json())
      .then(data=>{
        localStorage.setItem('userDetail',JSON.stringify(data))
        store.commit('setUserDetail',data)
        return store.state.userDetail
      })
    },
    getPost ({commit,state},{order,page}) {
      return axios.get(`${window.location.origin}/api/post?order=${order}&page=${page}&token=${sessionStorage['token']}`).then(x=>{
        commit('postLists',x.data)
        return state.postList 
      }) 
    },
    registerPost({commit},{name,email,password}){
      return axios.post('/api/Auth/Register',{
        name:name,
        email:email,
        password:password
      }).then(x=>{
        return x
      })
    },registerGooglePost({commit},{data}){
      return axios.post('/api/Auth/GoogleAuth',{
        email:data.email,
        name:data.name,
        avatar:data.avatar,
        google_id:data.google_id
      }).then(x=>{
        return x
      })
    }
   }
})