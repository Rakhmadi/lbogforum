<template>
    <div class="p-0 m-0">
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-12 col-md-9 col-lg-9">
                <div class="card mb-3 border-0 c_shadow" data-aos="fade-up">
                            <div class="px-4 pt-4 d-flex flex-row align-items-center">
                                <img style="width:60px ;height:60px" class="rounded-circle" src="https://avatarfiles.alphacoders.com/843/thumb-84318.jpg">
                                <div class="ms-2">
                                    <h5 class="m-0 p-0 text-break user_s inintColorthemesMode" style="">Avche</h5>
                                    <h6 class="p-0 m-0 fw-normal inintColorthemesMode" style="font-size:13px">8/31/2021, 12:41:31 AM</h6>
                                </div>
                            </div>
                            <div class="p-4 pt-2">
                                 <h2 class="m-0 user_s inintColorthemesMode">Impelementasi Big-O Notation</h2>
                            </div>
                            <div class="p-2 border-top">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-like-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-heart"></i>
                                            </button> 
                                            </div>
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-comment-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-comment"></i> 
                                            </button> 
                                        </div>
                                        <div class="ms-auto ">
                                            <button @click="bookmark(index,bookmarkCheker(item.bookmark_check_count),item.id)" class="btn btn-sm shadow-none boreder-0 btn-add-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-bookmark"></i>
                                            </button>
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
import cekMode from '../mode.js'
export default {
    mounted(){
        cekMode()
    }
}
</script>