<template>
    <div class="h-100 w-100" :style="bg_">
        <router-view></router-view>
    </div>
</template>
<script>
export default {
data() {
    return {
        bg_:{
          backgroundImage: `url('${window.location.origin}/Asset 4.svg')`,
          backgroundSize:'cover'
        }
    }
},
}
</script>
<style lang="css">

</style>