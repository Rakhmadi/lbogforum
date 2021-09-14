<template>
    <div class="p-0 m-0">
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-12 col-md-9 col-lg-9">
                <div class="card mb-3 border-0 c_shadow" data-aos="fade-up">
                            <div class="px-4 pt-4 d-flex flex-row align-items-center">
                            </div>
                            <div class="p-4 pt-2">
                                 <h2 class="m-0 user_s inintColorthemesMode">Impelementasi Big-O Notation</h2>
                            </div>
                            <div class="p-2 border-top">
                                <div class="container-fluid p-0 m-0">
                                    <div class="d-flex justify-content-star align-items-center ">
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-comment-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-pencil"></i>
                                            </button> 
                                            </div>
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-comment-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-delete"></i> 
                                            </button> 
                                        </div>
                                        <div class="m-1 ">
                                            <button class="btn btn-sm shadow-none boreder-0 btn-comment-circle rounded-pill">
                                                <i style="font-size:14px" class="mdi mdi-tag-plus"></i> 
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