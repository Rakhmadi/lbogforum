<template>
    <div class="p-0 m-0">
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-12 col-md-9 col-lg-9">
                    <h5 class="inintColorthemesMode mb-2">Search results for "{{$route.params.serch}}"</h5>
                <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" v-for="(item,index) in resp" :key="item.id">
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
            this.$emit("goSpin",this.goSpin = true);
            axios.get(`/api/searchPost/${this.$route.params.serch}?order=desc&token=${sessionStorage['token']}`).then(x=>{
                this.resp = x.data.data
                console.log(this.resp)
            }).then(()=>{
                        cekMode()
            this.$emit("goSpin", this.goSpin = false);

            }).catch(x=>{
            this.$emit("goSpin", this.goSpin = false);

            })
        }
    },
    data(){
        return{
            paramsSearch:'',
            resp:[],
        }
    },
    methods: {
        date(x){
            return new Date(x).toLocaleString('en-US');
        },bookmarkCheker(val){
            if(val >= 1){
                return 'checked'
            }else if(val === 0){
                return 'nocheked'
            }
        },bookmark(index,val,id_post){
            let that = this
            if(val === 'checked'){
                axios.delete(`/api/unsavePost/${id_post}?token=${sessionStorage['token']}`).then(x=>{
                    that.resp[index].bookmark_check_count = 0
                    this.msg('Unsaved')
                })

            }else if(val = 'unchecked'){
                axios.post(`/api/savePost/${id_post}?token=${sessionStorage['token']}`).then(x=>{
                    that.resp[index].bookmark_check_count = 1
                    this.msg('Saved')
                })
            }
        },msg(title){
        const x = this
        x.$toast.show(title,{
             position:"bottom",
             duration:5142,
        })
}
    },
}
</script>