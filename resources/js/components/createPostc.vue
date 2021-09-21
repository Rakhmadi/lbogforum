<template>
    <h2 class="inintColorthemesMode">Create Your Post</h2>

    <div class="mb-4">
                          <form action="">
                             <label for="password" class="form-label inintColorthemesMode">Title</label>
                             <input class="form-control serch_ rounded-pill mb-2 inintColorthemesMode"  v-model="title"  type="text"  placeholder="Title Post" required >
                             <label for="password"  class="form-label inintColorthemesMode">Image Cover</label>
                             <input  @change="fileHandler($event)" class="form-control serch_ rounded-pill mb-2 inintColorthemesMode"  type="file"  accept="image/x-png,image/gif,image/jpeg">
                          </form>
                          <label for="password"  class="form-label inintColorthemesMode">Image Cover</label>
                          <editor v-model="text" class="inintColorthemesMode" language='en-US' ></editor>
                          <br>
                          <button @click="savePost()" class="btn btn-sm me-2 mb-4 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                            <span class="mx-1"> <i class="mdi mdi-content-save"></i> Save</span>
                          </button>
                          <modal titleModal="Galery" idModal="swmodal">
                          </modal>
    </div>
</template>
<script>
import { defineComponent } from 'vue';
import Editor from 'md-editor-v3';
import 'md-editor-v3/lib/style.css';
import cekMode from "../mode"
import axios from 'axios';
export default defineComponent({
  name: 'VueTemplateDemo',
  components: { Editor },
  setup(){
    Editor
  },
  mounted() {
    cekMode()
  },
  data() {
    return {
      text: `Hello`,
    tags:[],
    tagName:'',
    file:'',
    title:''
    };
  },
  methods:{
      date(x){
          return new Date(x).toLocaleString('en-US');
      },
      previewFiles(event) {
         console.log(event.target.files);
      },
      savePost(){
        let formData = new FormData();
        formData.append('title',this.title)
        formData.append('content',this.text)
        formData.append('image_article',this.file)

        axios.post(`${window.location.origin}/api/createPost?token=${sessionStorage['token']}`,formData,{
          headers:{
             'Content-Type': 'multipart/form-data'
          }
        }).then(x=>{
          console.log(x.data)
        })
      },
      fileHandler(event){
        this.file = event.target.files[0]
      },
  }
});
</script>