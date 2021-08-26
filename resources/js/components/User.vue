<template>
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm">
          <div class="container">
              <div class="d-flex w-100 align-items-center">
                <div class="navbar-brand">Hello</div>
                    <input class="form-control rounded-pill me-2 serch_ shadow-none" @focus="showals = false" @blur="showals = true" placeholder="Search" type="text">
                     <div class=" ms-auto d-flex align-items-center">
                      <div class="me-2" data-aos="zoom-in"  v-if="showals" >
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" @click="createPost" style=""><i class="fs-6 mdi mdi-feather"></i></button>
                     </div>
                     <div class="me-2" data-aos="zoom-in"  v-if="!showals">
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style=""><i class="fs-6 mdi mdi-magnify"></i></button>
                     </div>
                      <div class="me-2" data-aos="zoom-in"  v-if="showals" >
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style=""><i class="fs-6 mdi mdi-bookmark"></i></button>
                     </div>
                      <div class="me-2" data-aos="zoom-in"  v-if="showals" >
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style=""><i class="fs-6 mdi mdi-brightness-4"></i></button>
                     </div>
                      <img @click="gotoprof" style="border:2px solid #3051FF;cursor:pointer;width:40px !important; height:40px !important" class="rounded-circle" :src="avatar" :alt="avatar">
                     </div>
              </div>
          </div>
      </nav>

    <main role="main" style="margin-top:75px;">
    <div class="container-fluid ">
        <router-view></router-view>
    </div>
    </main>
    <div class="back-to-top" v-if="totop" data-aos="zoom-in">
        <button class="btn btn-U btn-sm rounded-circle btn-circle" @click="scrollToTop" style="background-color: rgb(218 224 255) !important;"><i class="fs-6 mdi mdi-arrow-up"></i></button>
    </div>
</template>
<script>
import axios from "axios";
import { useMeta } from 'vue-meta'
export default {
  
  setup () {
    useMeta({
      title: 'Home',
      htmlAttrs: { lang: 'en', amp: true }
    })
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
          },createPost(){
              this.$router.push({
                  name:'createPost'
              })
          }
    },
}
</script>