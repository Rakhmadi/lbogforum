<template>
    <h2 class="inintColorthemesMode">List Posts</h2>
    <div class="p-0 m-0">
        <div class="row d-flex flex-row justify-content-center p-2">
<input class="form-control rounded-pill m-2 serch_ shadow-none inintColorthemesMode  dark__" v-model="searchText" placeholder="Search" type="text">
<h6 class="inintColorthemesMode mt-2">Page {{reps.current_page}}</h6>
                <div class="card mb-3 border-0 c_shadow" v-for="item in reps.data" :key="item.id">
                            <div class="p-2">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="p-1">
                                             <h5 class="m-0 user_s inintColorthemesMode">{{item.title}}</h5>
                                             <h6 class="p-0 m-0 fw-normal inintColorthemesMode" style="font-size:12px">{{date(item.created_at)}}</h6>
                                        </div>
                                        <div class="ms-auto ">
                <a class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
<i class="fs-6 mdi mdi-pencil"></i>
</a>
               <router-link :to="{name:'createTag',params:{pos_id:item.id}}" class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
<i class="fs-6 mdi mdi-tag-plus"></i>
</router-link>
               <a class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
<i class="fs-6 mdi mdi-delete"></i>
</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
               <button   @click="prev()" :class="{'hint':!fd1}" class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
                <i class="fs-6 mdi mdi-chevron-left"></i>
                </button>
                               <button  @click="next()" :disable="!fd" :class="{'hint':!fd}" class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
                <i class="fs-6 mdi mdi-chevron-right"></i>
                </button>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import cekMode from '../mode.js'
import pDebounce from '../debounce.js';

export default {
    mounted(){
        cekMode()

        this.getData()
    },
    data() {
        return {
            reps:[],
            searchText:'',
            fd:true,
            fd1:true,
        }
    },
    watch:{
      searchText:pDebounce(async function tangani(searchText){
          if(searchText && searchText.length >= 1){
              await this.search(searchText)
          }else{
              this.getData()
          }
      },250)
    },
    methods:{
        getData(){
            axios.get(`${window.location.origin}/api/userPost?token=${sessionStorage['token']}`).then(x=>{
                console.log(x.data)
                this.reps = x.data
            }).then(()=>{
                cekMode()
            })
        },
        search(searchText){
            axios.get(`${window.location.origin}/api/userPost?search=${searchText}&token=${sessionStorage['token']}`).then(x=>{
                console.log(x.data)
                this.reps = x.data
            }).then(()=>{
                cekMode()
            })
        },
        next(){
            if(this.reps.data.length >= 1){
                this.fd = true
                axios.get(`${window.location.origin}/api/userPost?search=${this.searchText}&page=${this.reps.current_page+1}&token=${sessionStorage['token']}`).then(x=>{
                    console.log(x.data)
                    if(x.data.data.length > 0){
                        this.reps = x.data
                    }else{
                        this.fd = false
                    }
                }).then(()=>{
                    cekMode()
                    window.scrollTo(0,0);
                })
            }else{
                this.fd = false
            }
        },
        prev(){
            if(this.reps.data.length >= 0){
                this.fd1 = true
                axios.get(`${window.location.origin}/api/userPost?search=${this.searchText}&page=${this.reps.current_page-1}&token=${sessionStorage['token']}`).then(x=>{
                    console.log(x.data)
                    this.reps = x.data
                }).then(()=>{
                    cekMode()
                    window.scrollTo(0,0);
                })
            }else{
                this.fd1 = false
            }
        },
          date(x){
          return new Date(x).toLocaleString('en-US');
      },gotoEditTag(val){
          console.log('sdf')
          this.$router.push({
              name:'createTag',
              params:{
                  pos_id:val
              }
          })
      }
    }
}
</script>
<style lang="css">

</style>