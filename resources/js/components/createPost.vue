<template>
            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                          <form action="">
                             <label for="password" class="form-label">Title</label>
                             <input class="form-control serch_ rounded-pill mb-2"  v-model="password"  type="text"  placeholder="Title Post" required >
                             <label for="password"  class="form-label">Image Cover</label>
                             <input  @change="previewFiles" class="form-control serch_ rounded-pill mb-2"  type="file"  accept="image/x-png,image/gif,image/jpeg">
                          </form>
                          <editor v-model="text" language='en-US' ></editor>
                          <br>
                          <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                            <span class="mx-1"> <i class="mdi mdi-content-save"></i> Save</span>
                          </button>
                      </div>
            </div>

</template>

<script>
import { defineComponent } from 'vue';
import Editor from 'md-editor-v3';
import 'md-editor-v3/lib/style.css';

export default defineComponent({
  name: 'VueTemplateDemo',
  components: { Editor },
  setup(){
    Editor
  },
  data() {
    return {
      text: `sdfsdfdsf, <pre><code class="language-ts"><span class="hljs-keyword">export</span> <span class="hljs-keyword">declare</span> <span class="hljs-keyword">const</span> <span class="hljs-attr">getSlot</span>: <span class="hljs-function">(<span class="hljs-params">{ instance, ctx, props }: {
    instance?: ComponentPublicInstance&lt;{}, {}, {}, {}, {}, {}, {}, {}, <span class="hljs-literal">false</span>, <span class="hljs-keyword">import</span>(<span class="hljs-string">"vue"</span>).ComponentOptionsBase&lt;<span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, <span class="hljs-built_in">any</span>, {}&gt;&gt; | <span class="hljs-literal">undefined</span>;
    ctx?: SetupContext&lt;EmitsOptions&gt; | <span class="hljs-literal">undefined</span>;
    props?: <span class="hljs-built_in">any</span>;
}, name?: <span class="hljs-built_in">string</span></span>) =&gt;</span> <span class="hljs-built_in">any</span>;
</code><span class="copy-button">Copy</span></pre>    </div>`
    };
  },
  methods:{
      previewFiles(event) {
         console.log(event.target.files);
      }
  }
});
</script>