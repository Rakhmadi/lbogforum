<template>
    <div class="container">
    <div class="row d-flex justify-content-center">
        <h2 class="inintColorthemesMode">Bookmark</h2>
        <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" v-for="(item,index) in resp" :key="item.id">
                            <div class="px-4 pt-4 d-flex flex-row align-items-center">
                            </div>
                            <div class="p-4 pt-2">
                                 <h2 class="m-0 user_s inintColorthemesMode">{{item.post[0].title}}</h2>
                                <router-link v-for="ite in item.post[0].tag" :key="ite.id" class="linkc_tag me-2" to="">#{{ite.tag_name}}</router-link>
                            </div>

                            <div class="p-2 border-top">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="ms-auto ">
                                            <button @click="s" class="btn btn-sm shadow-none boreder-0 btn-add-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-bookmark-remove"></i>
                                            </button>
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
export default {
    mounted(){
        axios.get(`${window.location.origin}/api/savedPost?token=${sessionStorage['token']}`).then(x=>{
            this.resp = x.data
        })
    },
    data(){
        return{
            resp:[]
        }
    }
}
</script>