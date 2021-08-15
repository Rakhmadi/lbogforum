<template>
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm">
          <div class="container">
              <a class="navbar-brand" href="#">LCode</a>
              <div class="d-flex align-items-center">
                     <div class="me-2">
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style=""><i class="fs-6 mdi mdi-feather"></i></button>
                     </div>
                     <div class="me-2">
                        <button class="btn btn-U btn-sm rounded-circle btn-circle" style=""><i class="fs-6 mdi mdi-magnify"></i></button>
                     </div>
                      <div class="me-2"></div>
                     <img style="border:3px solid #3051FF;cursor:pointer;" class="rounded-circle" width="45px" height="45px" src="https://avatarfiles.alphacoders.com/845/84595.png">
              </div>
          </div>
      </nav>

    <main role="main" style="margin-top:75px;">
    <div class="container-fluid ">
        <router-view></router-view>
    </div>
    </main>
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
        axios.get('/post').then(x=>{
            this.post = x.data
            console.log(this.post)
        })
    },
    data() {
        return {
           post:[] 
        }
    },
}
</script>