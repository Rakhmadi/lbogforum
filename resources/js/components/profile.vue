<template>
            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                        <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <div class="p-2 ">
                            <div class="p-2 d-flex flex-column align-items-center  border-bottom ">
                                <div>
                                    <img style="border:4px solid #3051FF;width:99px; height:99px;" class="rounded-circle" alt="v" :src="resp.user.avatar">
                                </div>
                                <div>
                                    <h4 class="m-0 p-0 text-break user_s text-center" style="">{{resp.user.name}}</h4>
                                </div>
                                <div class="d-flex flex-row mt-2">
                                    <h6 class="mx-1" style="text-decoration: underline;"><router-link @click="followers" to="">Follower {{resp.pengikut.length}}</router-link></h6>
                                    <h6 class="mx-1" style="text-decoration: underline;"><router-link @click="folowing()"  to="">Folowing {{resp.mengikuti.length}}</router-link></h6>
                                </div>
                                    <div class="my-2">
                                        <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                            <span class="mx-1"> <i class="mdi mdi-pencil"></i> Edit profile</span>
                                        </button> 
                                        <button class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                            <span class="mx-1"> <i class="mdi mdi-pencil"></i> LogOut</span>
                                        </button> 
                                    </div>
                            </div>
                            </div>
                            <div class="p-4  border-bottom">
                                <div class="row">
                                    <div class="col-4 px-1">
                                        <div class="card border-0" style="background-color:#566ae833">
                                            <div class="px-2 py-1">
                                                <h6 style="color: #5669e8 !important">Post</h6>
                                            </div>
                                            <div class="p-2 pt-0 d-flex justify-content-center">
                                                <h2 style="color: #5669e8 !important">
                                                    73
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 px-1">
                                        <div class="card border-0" style="background-color:#566ae833">
                                            <div class="px-2 py-1">
                                                <h6 style="color: #5669e8 !important">Post</h6>
                                            </div>
                                            <div class="p-2 pt-0 d-flex justify-content-center">
                                                <h2 style="color: #5669e8 !important">
                                                    73
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 px-1">
                                        <div class="card border-0" style="background-color:#566ae833">
                                            <div class="px-2 py-1">
                                                <h6 style="color: #5669e8 !important">Post</h6>
                                            </div>
                                            <div class="p-2 pt-0 d-flex justify-content-center">
                                                <h2 style="color: #5669e8 !important">
                                                    73
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
</template>
<script>
export default {
   beforeMount(){
        this.$store.dispatch('getUserInfo',1).then(x=>{
            this.resp = x;
        })
    },
    data(){
        return {
                resp:{
                    user:{},
                    pengikut:[],
                    mengikuti:[]
                }
        }
    },
    methods: {
        folowing(){
            this.$router.push({
                name:'folower',
                query:{
                    type:'Following'
                }
            })
        },
        followers(){
            this.$router.push({
                name:'folower',
                query:{
                    type:'Followers'
                }
            })
        }
    },
}
</script>