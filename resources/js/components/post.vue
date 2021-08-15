<template>

            <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-9 col-lg-9 ">
                        <div class="card mb-3 border-0 c_shadow" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <img src="https://images.unsplash.com/photo-1627483262769-04d0a1401487?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" class="card-img-top" alt="...">
                            <div class="p-2">
                            <div class="p-2">
                                <h1 class="user_s" style="cursor:pointer;fs-1-text">Zona Waktu Dunia</h1 >
                                <router-link class="linkc_tag me-2" to="">#transs</router-link>
                                <router-link class="linkc_tag me-2" to="">#transs</router-link>
                            </div>
                            <div class="p-2 d-flex flex-row align-items-center ">
                                <div>
                                    <img style="border:3px solid #3051FF;" class="rounded-circle" width="60px" height="60px" src="https://avatarfiles.alphacoders.com/845/84595.png">
                                </div>
                                <div class="ms-2">
                                    <h5 class="m-0 p-0 text-break user_s" style="">Hataraku Hataraku Hataraku Hataraku</h5>
                                    <h6 class="p-0 m-0 fw-normal" style="font-size:14px">Jumat, 13 Agustus 2021</h6>
                                </div>
                            </div>
                            <div class="p-2 ">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, dolores non? Ipsa similique ab saepe officiis eligendi consectetur dolores libero suscipit maiores. Dolorem inventore nam unde neque consequuntur, perspiciatis magni.</p>
                                
                            </div>
                            <div class="p-2 border-top">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="m-2 "><i style="color:#ff6464;" class="mdi mdi-heart"></i> 99</div>
                                        <div class="m-2 "><i style="color:#5669e8;" class="mdi mdi-comment"></i> 1</div>
                                        <div class="ms-auto ">
                                            <i style="" class="h5 mdi mdi-bookmark-outline"></i>
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
    created(){
        this.$Loading.start()
    },
    mounted(){
        this.$Loading.finish()
    },
}
</script>