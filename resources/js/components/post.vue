<template>

            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                        <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <img :src="`${origin}/images/${respPost.image_article}`" class="card-img-top" alt="...">
                            <div class="p-2">
                            <div class="p-2">
                                <h1 class="user_s inintColorthemesMode" style="cursor:pointer;fs-1-text">{{respPost.title}}</h1 >
                                <router-link class="linkc_tag me-2 " v-for="item in respPost.tag" :key="item" to="">#{{item.tag_name}}</router-link>
                            </div>
                            <div class="p-2 d-flex flex-row align-items-center ">
                                <div>
                                    <img style="width:60px;height:60px;" class="rounded-circle" src="https://avatarfiles.alphacoders.com/845/84595.png">
                                </div>
                                <div class="ms-2">
                                    <h5 class="m-0 p-0 text-break user_s inintColorthemesMode" style="">{{respPost.author.name}}</h5>
                                    <h6 class="p-0 m-0 fw-normal inintColorthemesMode" style="font-size:14px">{{date(respPost.created_at)}}</h6>
                                </div>
                            </div>
                            <div class="p-2 ">
                                     <editor class="inintColorthemesMode" :modelValue="respPost.content" language='en-US' previewOnly='true' ></editor>
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
                                            <button class="btn btn-sm shadow-none boreder-0 btn-add-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-bookmark"></i>
                                                <!-- <i style="font-size:14px" v-if="item.bookmark_check_count >= 1" class="mdi mdi-bookmark-check"></i> -->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <h3 class=" mb-3" style="color:#5669e8 !important">Create comment</h3>
                        
                                <editor class="inintColorthemesMode" v-model="text" language='en-US' ></editor>
                                <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill m-3">
                                    <span class="mx-1"> <i class="mdi mdi-send"></i> Send</span>
                                </button>
                                <br>
                                <br>
                        <h3 class="" style="color:#5669e8 !important">Comments</h3>
                        <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <div class="p-2">
                            <div class="p-2 d-flex flex-row align-items-center ">
                                <div>
                                    <img style="width:50px;height:50px;" class="rounded-circle" src="https://avatarfiles.alphacoders.com/845/84595.png">
                                </div>
                                <div class="ms-2">
                                    <h5 class="m-0 p-0 text-break user_s inintColorthemesMode" style="">Hataraku Hataraku Hataraku Hataraku</h5>
                                    <h6 class="p-0 m-0 fw-normal" style="font-size:14px">Jumat, 13 Agustus 2021</h6>
                                </div>
                            </div>
                            <div class="px-2">
                                <h4>Hello</h4>
                            </div>
                            <div class="px-2">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero harum quia inventore ab minus! Esse velit accusamus pariatur adipisci reiciendis, vitae voluptas quam hic eos. Numquam ratione consequatur harum? Quo?</p>
                            </div>
                            </div>
                        </div>

                    </div>
                    </div>
</template>
<script>
import cekMode from '../mode.js';
import { defineComponent } from 'vue';
import Editor from 'md-editor-v3';
import 'md-editor-v3/lib/style.css';
import axios from 'axios';
export default defineComponent({
  name: 'VueTemplateDemo',
  components: { Editor },
  setup(){
    Editor
  },
  mounted(){
      cekMode()
        axios.get(`${window.location.origin}/api/post/${this.$route.params.slug}?token=${sessionStorage['token']}`).then(x=>{
            this.respPost = x.data
        })
  },
  data() {
    return {
      respPost:{
          author:{
          name:''
          }
      },
      origin:window.location.origin,
    };
  },
  methods: {
              date(x){
            return new Date(x).toLocaleString('en-US');
        },

  },
});
</script>