<template>

            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="card border-0 shadow-none mb-2">
                            <div class="card-body p-0">
                            <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                <span class="mx-1">All</span>
                            </button> 
                            <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                <span class="mx-1">Old</span>
                            </button> 
                            <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                <span class="mx-1">All</span>
                            </button> 
                            </div>
                        </div>
                        <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" data-aos-anchor-placement="top-bottom" v-for="item in post" :key="item.id">
                            <img style=" object-fit: cover;height:50vh"  v-show="item.image_article" :src="item.image_article" :alt="item.image_article">
                            <div class="p-2">
                            <div class="p-2 d-flex flex-row align-items-center">
                                    <img style="border:3px solid #3051FF;width:60px ;height:60px" class="rounded-circle" :src="item.author.avatar">
                                <div class="ms-2">
                                    <h5 class="m-0 p-0 text-break user_s" style="">{{item.author.name}}</h5>
                                    <h6 class="p-0 m-0 fw-normal" style="font-size:13px">{{date(item.created_at)}}</h6>
                                </div>
                            </div>
                            <div class="p-2">
                                <h2 class="user_s" style="cursor:pointer;">{{item.title}}</h2>
                                <router-link class="linkc_tag me-2" to="">#transs</router-link>
                                <router-link class="linkc_tag me-2" to="">#transs</router-link>
                            </div>
                            <div class="p-2 border-top">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-like-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-heart"></i> 2000
                                            </button> 
                                            </div>
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-comment-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-comment"></i> {{item.comment_count}}
                                            </button> 
                                        </div>
                                        <div class="ms-auto ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-add-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-bookmark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-3">
                       <div class="position-fixed">
                            <div class="position-static">
                                <div class="col-12">
                                    <div class="card" style="width:250px">
                                        <router-link to="/f/login">Login</router-link>
                                        <router-link to="/f/register">register</router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
</template>
<script>
import axios from "axios";
import { useMeta } from 'vue-meta'
export default {
    created(){
        this.$Loading.start()
    },
  setup () {
    useMeta({
      title: 'Home',
      htmlAttrs: { lang: 'en', amp: true }
    })
  },
    async mounted(){
      this.$Loading.finish()
        axios.get(`${window.location.origin}/api/post?token=${sessionStorage['token']}`).then(x=>{
            this.post = x.data
            console.log(this.post)
        })
    },
    data() {
        return {
           post:[] 
        }
    },
    methods: {
        date(x){
            return new Date(x).toLocaleString('en-US');
        }
    },
}
</script>