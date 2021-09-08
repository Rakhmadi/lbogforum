<template>

            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-6 col-lg-6 ">
                        <div class="card bg-transparent border-0 shadow-none mb-2" data-aos="fade-up">
                            <div class="card-body p-0">
                                <button @click="getAllPost()" :class="{'toggles_order_hint':!isUFriendPost}" class="btn btn-sm me-1 mt-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
                                    <span class="mx-1">All Post</span>
                                </button> 
                                <button @click="getFriendPost()" :class="{'toggles_order_hint':isUFriendPost}" class="btn btn-sm me-1 mt-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
                                    <span class="mx-1">Friend Post</span>
                                </button> 
                                <button @click="getDsc()" :class="{'toggles_order_hint':!isAsc}" class="btn btn-sm me-1 mt-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
                                    <span class="mx-1">Newer</span>
                                </button> 
                                <button @click="getAsc()" :class="{'toggles_order_hint':isAsc}" class="btn btn-sm me-1 mt-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
                                    <span class="mx-1">Older</span>
                                </button>
                            </div>
                        </div>
                        <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" v-for="(item,index) in Data" :key="item.id">
                            <img style=" object-fit: cover;height:50vh"  v-show="item.image_article" :src="`${origin}/images/${item.image_article}`" :alt="item.image_article">
                            <div class="p-2">
                            <div class="p-2 d-flex flex-row align-items-center">
                                    <img style="width:60px ;height:60px" class="rounded-circle" :src="item.author.avatar">
                                <div class="ms-2">
                                    <h5 class="m-0 p-0 text-break user_s inintColorthemesMode" style="">{{item.author.name}}</h5>
                                    <h6 class="p-0 m-0 fw-normal inintColorthemesMode" style="font-size:13px">{{date(item.created_at)}}</h6>
                                </div>
                            </div>
                            <div class="p-2">
                                <h2 class="user_s inintColorthemesMode" style="cursor:pointer;">{{item.title}}</h2>
                                <router-link v-for="ite in item.tag" :key="ite.id" class="linkc_tag me-2" to="">#{{ite.tag_name}}</router-link>
                            </div>
                            <div class="p-2 border-top">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-like-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-heart"></i> {{item.react_count}}
                                            </button> 
                                            </div>
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-comment-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-comment"></i> {{item.comment_count}}
                                            </button> 
                                        </div>
                                        <div class="ms-auto ">
                                            <button @click="bookmark(index,bookmarkCheker(item.bookmark_check_count),item.id)" class="btn btn-sm shadow-none boreder-0 btn-add-circle rounded-pill">
                                                <i style="font-size:14px" v-if="item.bookmark_check_count == 0" class="mdi mdi-bookmark"></i>
                                                <i style="font-size:14px" v-if="item.bookmark_check_count >= 1" class="mdi mdi-bookmark-check"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                                <div v-if="loading"><i class="mdi mdi-checkbox-blank-circle " style="color:#3f56eb !important"> Waiting...</i></div>
                                <div v-if="isDone"><i class="mdi mdi-checkbox-blank-circle " style="color:#3f56eb !important"></i></div>
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
import { isMobile } from 'mobile-device-detect';
import axios from "axios";
import { useMeta } from 'vue-meta'
import cekMode from "../mode"
export default {


  setup () {
    useMeta({
      title: 'Home',
      htmlAttrs: { lang: 'en', amp: true }
    })
  },

    async mounted(){
         cekMode()
        this.getData()
        if(isMobile){
            console.log('isMobile')
            window.document.ontouchmove = ()=>{

           let xNnc = (window.pageYOffset + 56)
           let xNnb = (window.scrollMaxY || (window.document.documentElement.scrollHeight - window.document.documentElement.clientHeight))
           console.log(xNnc)
            console.log(xNnb)

           if (xNnc >= xNnb) {
               console.log('end of page')
               this.getData()
           }
            }
        }else{
       window.document.onscroll = ()=>{
           let xNnc = (window.pageYOffset)
           let xNnb = (window.scrollMaxY || (document.documentElement.scrollHeight - document.documentElement.clientHeight))
           if (xNnc === xNnb) {
               console.log('end of page')
               this.getData()
           }
       }
        }

       this.$store.dispatch('getPost',{
           order: 'desc',
           page: 1
       }).then(x=>{
           this.post = x.data
       })
    },
    data() {
        return {
            origin:window.location.origin,
           post:[],
           page:1,
           order:'desc',
           isAsc:false,
           isUFriendPost:false,
           Data:[],
           loading:false,
            orders:{
                border:'3px'
            },
            isDone:false,
            loadingSave:false

        }
    },
    computed:{
        postData(){
            return this.$store.state.postList.data
        }
    },
    methods: {
        date(x){
            return new Date(x).toLocaleString('en-US');
        },
        getAsc(){
            this.order = "asc"
            this.Data = []
            this.page = 1
            this.isAsc = true
            this.getData()
        },
        getDsc(){
            this.order = "desc"
            this.Data = []
            this.page = 1
            this.isAsc = false
            this.getData()
        },
        getFriendPost(){
            this.Data = []
            this.page = 1
            this.isUFriendPost = true
            this.getData()
        },
        getAllPost(){
            this.Data = []
            this.page = 1
            this.isUFriendPost = false
            this.getData()
        },
        getData(){
            this.isDone = false;
            this.loading = true
            this.$store.dispatch('getPost',{
                order: this.order,
                page: this.page,
                friendpost: this.isUFriendPost
            }).then(x=>{
                if (x.data.length) {
                    this.loading = false
                    this.Data.push(...x.data)
                    this.page++
                    console.log(this.Data)
                    
                }else{
                    this.loading = false
                    this.isDone = true;

                }
            }).then(x=>{
                        cekMode()
            })
        },
        bookmarkCheker(val){
            if(val >= 1){
                return 'checked'
            }else if(val === 0){
                return 'nocheked'
            }
        },
        bookmark(index,val,id_post){
            let that = this
            if(val === 'checked'){
                axios.delete(`/api/unsavePost/${id_post}?token=${sessionStorage['token']}`).then(x=>{
                    that.Data[index].bookmark_check_count = 0
                    this.msg('Unsaved')
                })

            }else if(val = 'unchecked'){
                axios.post(`/api/savePost/${id_post}?token=${sessionStorage['token']}`).then(x=>{
                    that.Data[index].bookmark_check_count = 1
                    this.msg('Saved')
                })
            }
        },
    msg(title){
        const x = this
        x.$toast.show(title,{
             position:"bottom",
             duration:5142,
        })
}
    },

}
</script>
<style lang="css">
.toggles_order{
      border: #3f56eb59 2px solid !important;
}    
.toggles_order_hint{
      border: #122fe6b3 2px solid !important;
} 
</style>