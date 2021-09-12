<template>

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-9 col-lg-9 ">
                    <h1 class="inintColorthemesMode">{{$route.query.type}}</h1>
                    <div class=" mb-3 border-0 " >
                        <div class="p-2 border-bottom" v-for="item in data" :key="item">
                        <div class="p-2 d-flex flex-row align-items-center ">
                            <div>
                                <img style="border:2px solid #3051FF;width:50px; height:50px;" class="rounded-circle"  src="https://avatarfiles.alphacoders.com/845/84595.png">
                            </div>
                            <div class="ms-2">
                                <h5 class="m-0 p-0 text-break user_s  inintColorthemesMode"  v-text="item.name" style=""></h5>
                                <h6 class="p-0 m-0 fw-normal inintColorthemesMode"  v-text="item.email" style="font-size:14px"></h6>
                            </div>
                            <div class="ms-auto">
                                    <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                    <span class="mx-1"> Unfollow</span>
                                    </button> 
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</template>
<script>
import cekMode from "../mode"

export default {
    async mounted() {

         const k = await JSON.parse(localStorage.getItem('userDetail'));
            let cek = ()=>{
                 if (this.$route.query.type === 'Following') {
                     this.data = k.mengikuti 
                      cekMode()
                  }else if(this.$route.query.type === 'Followers'){
                      cekMode()
                      this.data = k.pengikut
                  }
            }
            await cek()
            await cekMode()

    },
    data() {
        return {
            data:[]
        }
    },
}
</script>