<template>
    <metainfo>
        <template v-slot:title="{ content }">{{ content ? `${content} | SITE_NAME` : `SITE_NAME` }}</template>
    </metainfo>
    <div class="w-100 h-100 bg-transparent">
          <router-view></router-view>
    </div>
</template>
<script>
import { useMeta } from 'vue-meta'

export default {
mounted(){
},
data() {
  return {
        bg_:{
          backgroundImage: `url('${window.location.origin}/Asset 4.svg') !important`,
          backgroundSize:'cover'
        }
  }
},
}
</script>
<style lang="css">
::-webkit-scrollbar {
    display: none;
}
p{
  font-size: 1.0rem !important;
  line-height: auto;
}
  html,body{
    width:100% !important;
    height: 100% !important;
  }
  .avatar {
    display: inline-flex;
    border-radius: 50%;
    text-align: center;
    vertical-align: middle;
    position: relative;
}
.avatar.avatar-lg .avatar-content, .avatar.avatar-lg img {
    width: 48px;
    height: 48px;
    font-size: 1.2rem;
}
.user_s{
  margin-left: 0px !important;
  cursor: pointer;
  color:rgb(15, 12, 38);
  transition: .5s ease;
}
.user_s:hover{
  color:rgb(34, 26, 87);
}
.c_shadow{
  box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;

}
.linkc_tag{
  color:#3f56eb;
  font-weight: 600;
}
.linkc_tag:hover{
  color:#2640ed;
}
.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.btn-circle {
    width: 35px;
    height: 35px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    line-height: 1.42857;
}
.btn-U{
  border:none !important;
  background-color:#3052ff2c  !important;
  color :#3051FF !important;
  box-shadow: none !important;
  font-size: 16px;
  transition: .5s ease;

}
.btn-U:hover{
    background-color:#3052ff44  !important;
    color :#1f45ff !important;
}
.btn-like-circle {
    text-align: center !important;
    background-color:#ff646436 !important ;
    color: #ff6464 !important;
    font-size: auto;
    transition: .5s ease;

}
.btn-like-circle:hover {

    background-color:#ff646462 !important ;
    color: #fa5454 !important;  
}
.btn-comment-circle {
    text-align: center !important;
    background-color:#566ae833 !important ;
    color: #5669e8 !important;
    font-size: auto;
    transition: .5s ease;

}
.btn-comment-circle:hover {
    background-color:#566ae854 !important ;
    color: #3f56eb !important;
}
.btn-add-circle {
    text-align: center !important;
    background-color:#008f5d35 !important ;
    color: #008f5d !important;
    font-size: auto;
    transition: .5s ease;

}
.btn-add-circle:hover {
    background-color:#008f5d4b !important ;
    color: #038758 !important;
}
.serch_{
      transition: .5s ease;
      box-shadow: none !important;
      border: #a9b1e1bb 2px solid !important;
}
.serch_:focus{
      transition: .5s ease;
      box-shadow: none !important;
      border: #3f56eb95 2px solid !important;
}
.back-to-top {
    position: fixed;
    bottom: 15px;
    right: 15px;
}
.scrl__{
    overflow-x: scroll;
    box-sizing: content-box; /* So the width will be 100% + 17px */
}
.md{
font-family: var(--bs-font-sans-serif) !important;

}
.dark__{
  background-color : #221f2c !important;
  color: #e2e2ff !important;
  transition: .5s ease-in-out;

}
.inintColorthemesMode{
    transition: .3s ease-in-out;
}
.bg_dark__{
  background-color : #221f2c !important;
  color:white !important;
  transition: .5s ease-in-out;
}
#mode{
    transition: .5s ease-in-out;
}
.bg-dark{
  background-color : #221f2c !important;
  color:white !important;
}
.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
    .hint{
border: #3f56eb59 2px solid !important;
}
.md-content p{
  margin:0px
}
</style>
