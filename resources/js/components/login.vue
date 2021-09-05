<template>
    <div class="h-100 row p-0 m-0 d-flex justify-content-center align-items-center">
        <div class="col-12 col-lg-4">
            <div class="card p-2 m-3 border-0 c_shadow">
                <div class="card-body">
<div class="alert alert-primary themd alert-dismissible" v-show="$route.query.msg" role="alert">
  {{$route.query.msg}}
</div>
                        <div  class="alert alert-warning alert-dismissible fade show" role="alert" v-show="warning" >
                            Email atau Password Salah
                        </div>
                    <h1>Login</h1>
                    <div class="m-1">
                         <form @submit.prevent="login">
                             <label for="email" class="form-label">Email</label>
                             <input v-model="email" class="form-control serch_ rounded-pill inintColorthemesMode" type="email"  placeholder="Your Email" required>
                             <label for="password" class="form-label">Password</label>
                             <input class="form-control serch_ rounded-pill inintColorthemesMode"  v-model="password"  type="password" label-top="Password" placeholder="Your Password" required >
                             <div class="d-flex justify-content-star align-items-center mt-3">
                                    <button class="m-2 btn shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                    <span v-show="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Login</button>
                                    <button  @click.prevent="handleClickSignIn()" class="m-2 btn shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">Google &nbsp;<i class="mdi mdi-google"></i></button>
                             </div>
                             <div>
                                 <font>Blum punya akan? <router-link to="/f/register">Register</router-link></font>
                             </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { useMeta } from 'vue-meta'
import cekMode from "../mode"

export default {
    setup(){
        useMeta({
          title: 'Login',
          htmlAttrs: { lang: 'en', amp: true }
        })
            

    },
    mounted() {
         cekMode()
    },
    data() {
        return {
            'email':'rakhmadiwalker@gmail.com',
            'password':'rakhmadiwalker@gmail.com',
            'resp':[],
            'warning':false,
            'isLoading':false
        }
    },
    computed:{

    },
    methods: {
        async loginGoogle() {
        },    
        async handleClickSignIn() {
         try {
           const googleUser = await this.$gAuth.signIn();
           if (!googleUser) {
             return null;
           }
           let getDataUser = googleUser.getBasicProfile()
           console.log(getDataUser)
           this.$store.dispatch('registerGooglePost',{
               data:{
                   email:getDataUser.Ht,
                   name:getDataUser.Qe,
                   avatar:getDataUser.wJ,
                   google_id:getDataUser.US
               }
           }).then(x=>{
               sessionStorage['token'] = x.data.token
               console.log(x.data)
               localStorage.setItem('user',JSON.stringify({avatar:getDataUser.wJ}))
               this.$router.push({
                   name:'home'
               })
           })
           this.isSignIn = this.$gAuth.isAuthorized;
         } catch (error) {
           console.error(error);
           return null;
         }
    },
        async login(){
            this.isLoading = true
            this.warning = false
            await fetch(`${window.location.origin}/api/Auth/Login`,{
                method:"POST",
                headers: {
                  'Accept': 'application/json',
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email:this.email,
                    password:this.password
                })
            }).then(x=>x.json()).then(resps=>{
                 this.isLoading = false
                this.resp = resps
              if (this.resp.msg === 'error') {
                  this.warning = true
              }else if(this.resp.msg === 'success'){
                  sessionStorage['token'] = this.resp.token;
                  localStorage.setItem('user',JSON.stringify({avatar:this.resp.user.avatar}))
                  this.$router.push({
                      name:'home'
                  })
              }
              console.log(resps);
            })
        }
    },
}
</script>
<style lang="css">
    .themd{
    background-color: #566ae833 !important;
    color: #5669e8 !important;
    border:none !important;
    }
</style>