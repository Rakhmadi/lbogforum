<template>
            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                      <a @click="createPost()" :class="{'toggles_order_hint':$route.name === 'createPostC'}" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order" >Create Post</a>
                      <a @click="listPost()" :class="{'toggles_order_hint':$route.name === 'listPOST'}" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">List Post</a>
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
      sc:true,
      sc1:false

    }
  },
  methods: {
    listPost(){
      this.sc = false
      this.sc1 = true
      this.$router.push({
        name:"listPOST"
      })
    },
    createPost(){
      this.sc = true
      this.sc1 = false
      this.$router.push({
        name:"createPostC"
      })
    }
  },
}
</script>

