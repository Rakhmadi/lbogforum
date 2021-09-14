<template>
    <div class="p-0 m-0">
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-12 col-md-9 col-lg-9">
                    <h5 class="inintColorthemesMode mb-2">Search results for "{{$route.params.serch}}"</h5>
                <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" v-for="item in resp" :key="item.id">
                            <div class="px-4 pt-4 d-flex flex-row align-items-center">
                                <img style="width:60px ;height:60px" class="rounded-circle" src="https://avatarfiles.alphacoders.com/843/thumb-84318.jpg">
                                <div class="ms-2">
                                    <h5 class="m-0 p-0 text-break user_s inintColorthemesMode" style="">{{item.author.name}}</h5>
                                    <h6 class="p-0 m-0 fw-normal inintColorthemesMode" style="font-size:13px">{{date(item.created_at)}}</h6>
                                </div>
                            </div>
                            <div class="p-4 pt-2">
                                 <h2 class="m-0 user_s inintColorthemesMode">{{item.title}}</h2>
                                <router-link v-for="ite in item.tag" :key="ite.id" class="linkc_tag me-2" to="">#{{ite.tag_name}}</router-link>

                            </div>

                            <div class="p-2 border-top">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-like-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-heart"></i>
                                            </button> 
                                            </div>
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-comment-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-comment"></i> 
                                            </button> 
                                        </div>
                                        <div class="ms-auto ">
                                            <button @click="bookmark(index,bookmarkCheker(item.bookmark_check_count),item.id)" class="btn btn-sm shadow-none boreder-0 btn-add-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-bookmark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import cekMode from '../mode.js'
export default {
    mounted(){

        cekMode()
        if(this.$route.params.serch != '' || this.$route.params.serch != null){
            axios.get(`/api/searchPost/${this.$route.params.serch}?order=desc&token=${sessionStorage['token']}`).then(x=>{
                console.log(x.data)
                this.resp = x.data.data
            }).then(()=>{
                        cekMode()
            })
        }
    },
    data(){
        return{
            paramsSearch:'',
            resp:[]
        }
    },
    methods: {
        date(x){
            return new Date(x).toLocaleString('en-US');
        },
    },
}
</script>