<template>
    <div>
                              <div class="card border-0 c_shadow">
                                <div class="p-2">
                                    <button @click="$router.go(-1)" class="btn btn-U btn-sm rounded-circle btn-circle"><i class="fs-6 mdi mdi-arrow-left"></i></button>
                                </div>
                                <div class="card-body pt-0">
                                    <h4>Add Tag</h4>
                                      <div>
                                          <span v-for="(item, index) in tags" :key="index" class="badge rounded-pill bg-primary p-2 m-1" style="background-color: #566ae854 !important;color: #5669e8  !important;transition: .5s ease;">{{item.tag_name}} <i @click="deleteTag(item.id,index)" class="mdi mdi-close-circle" style="cursor: pointer;color: rgb(252 121 121) !important;"></i></span>
                                          <div class="spinner-grow m-1" v-show="isLoading" style="background-color:#e23e;height: 7px; width: 7px;" role="status"></div>
                                      </div>
                                    <input v-on:keyup.enter="addTag()" v-model="tagName" class="form-control serch_ rounded-pill mt-2 inintColorthemesMode form-control-sm" type="text" placeholder="Add Tag" required="">
                                </div>
                              </div> 
    </div>
</template>
<script>
import axios from 'axios'
import cekMode from "../mode"
export default {
    mounted() {
        cekMode()
        axios.get(`${window.location.origin}/api/allTag/${this.$route.params.pos_id}?token=${sessionStorage['token']}`).then(x=>{
          this.tags=x.data.tag
        })
    },
    data(){
        return{
            tags:[],
            isLoading:false
        }
    },
    methods:{
      
      addTag(){
         console.log({
          tag_name:this.tagName.replace(/\s/g,'_'),
          articel_id:this.$route.params.pos_id,
        })
      if(this.tagName != '' && this.tagName != null){
        this.isLoading = true
        axios.post(`${window.location.origin}/api/createTag?token=${sessionStorage['token']}`,{
          tag_name:this.tagName.replace(/\s/g,'_'),
          articel_id:this.$route.params.pos_id,
        }).then(x=>{
           this.tags.push(x.data.tag)
           this.isLoading = false
           this.tagName = ''
        })
        } 
      },
      deleteTag(id,index){
           this.isLoading = true
        axios.delete(`${window.location.origin}/api/deleteTag/${id}/${this.$route.params.pos_id}?token=${sessionStorage['token']}`).then(x=>{
           this.tags.splice(index,1);
           this.isLoading = false
           })
      }
    }
}
</script>
