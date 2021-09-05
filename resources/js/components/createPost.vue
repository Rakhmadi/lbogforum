<template>
            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                      <router-link @click="a()" :class="{'toggles_order_hint':sc}" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order" to="createPostC">Create Post</router-link>
                      <router-link @click="b()" :class="{'toggles_order_hint':!sc}" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order" to="listPOST">List Post</router-link>
                      <br>
                      <br>
                      <router-view></router-view> 
                      <br>
                      <br>
                    </div>
            </div>
</template>
<script>
export default {
  data() {
    return {
      sc:true
    }
  },
  methods: {
    a(){
      this.sc = true
    },
    b(){
      this.sc = false
    }
  },
}
</script>

