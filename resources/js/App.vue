<template>
    <metainfo>
        <template v-slot:title="{ content }">{{ content ? `${content} | SITE_NAME` : `SITE_NAME` }}</template>
    </metainfo>
    <router-view></router-view>
</template>
<script>
import { useMeta } from 'vue-meta'

export default {
mounted(){

}
}
</script>
<style lang="css">
p{
  font-size: 1.05rem!important;
}
  html{
    width:100%;
    height: 100%;
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
  color:rgb(34, 26, 87);
  font-weight: 700;
}
.linkc_tag:hover{
  color:rgb(59, 43, 162);
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
</style>