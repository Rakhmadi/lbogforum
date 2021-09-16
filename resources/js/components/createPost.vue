<template>
            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                      <a @click="a(),createPost()" :class="{'toggles_order_hint':sc}" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order" >Create Post</a>
                      <a @click="b(),listPost()" :class="{'toggles_order_hint':!sc}" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">List Post</a>
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
    },
    listPost(){
      this.$router.push({
        name:"listPOST"
      })
    },
    createPost(){
      this.$router.push({
        name:"createPostC"
      })
    }
  },
}
</script>

