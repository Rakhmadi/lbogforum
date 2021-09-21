<template>
      <nav class="navbar navbar-expand-lg fixed-top navbar-light shadow-sm  inintColorthemesMode" style="background-color:#fff;">
          <div class="container">
              <div class="d-flex w-100 align-items-center bg-transparent">
                <div @click="gotoHome()" style="cursor:pointer;" class="inintColorthemesMode navbar-brand">
                    <img src="/icon/icon-192x192.png" style="width:35px;heigth:35px;" alt="logo" srcset="">
                </div>
                    <input @input="search(),goSpin()" v-model="searchText" class="form-control rounded-pill me-2 serch_ shadow-none inintColorthemesMode" @focus="showals = false" @blur="showals = true" placeholder="Search" type="text">
                     <div class=" ms-auto d-flex align-items-center">
                      <div class="me-2" data-aos="zoom-in"  v-if="showals" >
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" @click="createPost" style=""><i class="fs-6 mdi mdi-feather"></i></button>
                     </div>
                     <div class="me-2" data-aos="zoom-in"  v-if="!showals">
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style=""><i v-if="!goSpin" class="fs-6 mdi mdi-magnify"></i><i v-if="goSpin" class="fs-6 mdi mdi-spin mdi-loading"></i></button>
                     </div>
                      <div class="me-2" data-aos="zoom-in"  v-if="showals" >
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style=""><i class="fs-6 mdi mdi-bookmark"></i></button>
                     </div>
                      <div class="me-2" data-aos="zoom-in" @click="changeTheme()"  v-if="showals" >
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style="">
                            <i v-if="isDark" class="fs-6 mdi mdi-brightness-4"></i>
                            <i v-if="!isDark" class="fs-6 mdi mdi-brightness-7"></i>
                        </button>
                     </div>
                      <img @click="gotoprof" referrerpolicy="no-referrer" style="cursor:pointer;width:40px !important; height:40px !important" class="rounded-circle" :src="avatar" :alt="avatar">
                     </div>
              </div>
          </div>
      </nav>

    <main role="main" style="margin-top:75px;">
    <div class="container-fluid ">
        <router-view  :key="$route.fullPath" @goSpin="goSpin = $event" ></router-view>
    </div>
    </main>
    <div class="back-to-top" v-if="totop" data-aos="zoom-in">
        <button class="btn btn-U btn-sm rounded-circle btn-circle" @click="scrollToTop" style="background-color: rgb(218 224 255) !important;">
            <i class="fs-6 mdi mdi-arrow-up"></i>
        </button>
    </div>
</template>
<script>
import axios from "axios";
import pDebounce from '../debounce.js';
import cekMode from "../mode"
import { useMeta } from 'vue-meta'
export default {
  
  setup () {
    useMeta({
      title: 'Home',
      htmlAttrs: { lang: 'en', amp: true }
    })
  },
  watch:{
      searchText:pDebounce(async function tangani(searchText){
          if(searchText && searchText.length >= 1){
              await this.search(searchText)
          }else{
          }
      },250)
  },
    async mounted(){
        this.avatar = JSON.parse(localStorage.getItem('user')).avatar
        console.log(this.avatar)
        window.document.body.onscroll = ()=> {
            if (window.pageYOffset >= 200) {
                this.totop = true
            }else{
                this.totop = false
            }
        }
    },
    data() {
        return {
           post:[],
           showals:true,
           totop:false,
           avatar:'',
           isDark:false,
           searchText:'',
           goSpin:false
        }
    },methods: {
          scrollToTop() {
                window.scrollTo(0,0);
          },
          totops(x){
            this.totop = x
          },
          gotoprof(){
                  this.$router.push({
                      name:'profile'
                  })
          },
          gotoHome(){
              this.$router.push({
                  name:'home'
              })
          },
          createPost(){
              this.$router.push({
                  name:'createPostC'
              })
          },
          changeTheme(){
            let isDark = localStorage.getItem('isDark')
              if(isDark === 'true'){
                  localStorage.setItem('isDark',false)
                  this.isDark = false
                    cekMode()
              }else{
                  localStorage.setItem('isDark',true)
                  this.isDark = true
                    cekMode()
              }
          },
          async search(t){
              this.$router.push({
                  name:'searchPage',
                  params:{
                      serch:t
                  }
              })
          },
    },
}
</script>