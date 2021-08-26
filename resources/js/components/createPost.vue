<template>
            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                         <editor v-model="text" language='en-US' previewOnly='true' ></editor>
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
  }
});
</script>