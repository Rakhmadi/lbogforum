<template>
    <div class="mb-4">
                          <form action="">
                             <label for="password" class="form-label inintColorthemesMode">Title</label>
                             <input class="form-control serch_ rounded-pill mb-2 inintColorthemesMode"  v-model="password"  type="text"  placeholder="Title Post" required >
                             <label for="password"  class="form-label inintColorthemesMode">Image Cover</label>
                             <input  @change="previewFiles" class="form-control serch_ rounded-pill mb-2 inintColorthemesMode"  type="file"  accept="image/x-png,image/gif,image/jpeg">
                          </form>
                          <label for="password"  class="form-label inintColorthemesMode">Image Cover</label>
                          <editor v-model="text" class="inintColorthemesMode" language='en-US' ></editor>
                          <br>
                          <div class="row mb-3">
                            <div>
                              <div class="card border-0 c_shadow">
                                <div class="card-body">
                                    <h4>Add Tag</h4>
                                      <div>
                                          <span v-for="(item, index) in tags" :key="index" class="badge rounded-pill bg-primary p-2 m-1" style="background-color: #566ae854 !important;color: #5669e8  !important;transition: .5s ease;">{{item.tag_name}} <i @click="deleteTag(index)" class="mdi mdi-close-circle" style="cursor: pointer;color: rgb(252 121 121) !important;"></i></span>
                                      </div>
                                    <input v-on:keyup.enter="addTag()" v-model="tagName" class="form-control serch_ rounded-pill mt-2 inintColorthemesMode form-control-sm" type="text" placeholder="Add Tag" required="">
                                    {{tags}}
                                </div>
                              </div> 
                            </div>
                          </div>
                          <button class="btn btn-sm me-2 mb-4 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
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
      text: `sdfsdfdsf, <pre><code class="language-ts"><span class="hljs-keyword">export</span> <span class="hljs-keyword">declare</span> <span class="hljs-keyword">const</span> <span class="hljs-attr">getSlot</span>: <span class="hljs-function">(<span class="hljs-params">{ instance, ctx, props }: {
    instance?: ComponentPublicInstance&lt;{}, {}, {}, {}, {}, {}, {}, {}, <span class="hljs-literal">false</span>, <span class="hljs-keyword">import</span>(<span class="hljs-string">"vue"</span>).ComponentOptionsBase&lt;<span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, {}&gt;&gt; | <span class="hljs-literal">undefined</span>;
    ctx?: SetupContext&lt;EmitsOptions&gt; | <span class="hljs-literal">undefined</span>;
    props?: <span class="hljs-built_in">any</span>;
}, name?: <span class="hljs-built_in">string</span></span>) =&gt;</span> <span class="hljs-built_in">any</span>;
</code><span class="copy-button">Copy</span></pre>    </div>`,
    tags:[],
    tagName:''
    };
  },
  methods:{
      date(x){
          return new Date(x).toLocaleString('en-US');
      },
      previewFiles(event) {
         console.log(event.target.files);
      },
      addTag(){
        if(this.tagName != '' && this.tagName != null){
           this.tags.push({
             tag_name:this.tagName.replace(/\s/g,'_')
           })
        } 
        this.tagName = ''
      },
      deleteTag(index){
        this.tags.splice(index,1);
        console.log(index)
      }
      
  }
});
</script>