<template>
    <div class="h-100 row p-0 m-0 d-flex justify-content-center align-items-center">
        <div class="col-12 col-lg-4">
            <div class="card p-2 m-3">
                <div class="card-body">
                    <h1>Register</h1>
                    <div class="m-1">
                         <form @submit.prevent="Register">
                             <label for="name" class="form-label">Name &nbsp;&nbsp;<span class="text-danger" >{{cekword}}</span></label>
                             <input v-model="name" class="form-control serch_ rounded-pill" type="text"  placeholder="Your Name" required>
                             <label for="email" class="form-label">Email &nbsp;&nbsp;<span v-show="emailCek!=''" class="text-danger" >{{emailCek}}</span></label>
                             <input v-model="email" @click="emailCek = ''" class="form-control serch_ rounded-pill" type="email"  placeholder="Your Email" required>
                             <label for="password" class="form-label">Password &nbsp;&nbsp;<span class="text-danger" >{{cekpass}}</span></label>
                             <input v-model="password" class="form-control serch_ rounded-pill" type="password"  placeholder="Your Passowrd" required>
                             <label for="repassword" class="form-label">Repassword</label>
                             <input v-model="repassword" class="form-control serch_ rounded-pill" type="password"  placeholder="Confirm Password" required>
                             <span class="text-danger" >{{conf}}</span>
                             <div class="d-flex justify-content-star align-items-center mt-3">
                                    <button class="m-2 btn shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">
                                          <span v-show="isLoading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        Register</button>
                                    <button  @click.prevent="handleClickSignIn()" class="m-2 btn shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">Google &nbsp;<i class="mdi mdi-google"></i></button>
                             </div>
                            <font>Sudah punya akun? <router-link to="/f/login">Login</router-link></font>

                         </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
import { useMeta } from 'vue-meta/dist/vue-meta.esm-browser'

import { required, email, minLength, sameAs } from 'vuelidate/lib/validators'
export default {
    setup(){
        useMeta({
          title: 'Register',
          htmlAttrs: { lang: 'en', amp: true }
        })
    },
    data() {
        return {
            'name':'',
            'email':'',
            'password':'',
            'repassword':'',
            'isLoading':false,
            'emailCek':''
        }
    },
    computed:{
        conf(){
            if (this.password === this.repassword) {
                return ''
            }else{
                return '! Password & Confrim password harus sama'
            }
        },
        cekword(){
            if (this.name.length >= 6) {
                return ''
            }else{
                return '! Length name must  5 >'
            }
        },
        cekpass(){
            let cekRegex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/.test(this.password)
            if(cekRegex){
                return ''
            }else{
                return ' Minimum eight characters, at least one letter, one number and one special character'
            }
        }
    },
    methods:{
        Register(){
            this.emailCek = ''
            this.isLoading = true
            if (this.password === this.repassword && this.cekpass === '' && this.cekword === '') {
                this.$store.dispatch('registerPost',{
                        name:this.name,
                        email:this.email,
                        password:this.password
                }).then(x=>{
                        this.isLoading = false
                        this.$router.push({
                            name:'login',
                            query: {
                                msg:'Account Registered'
                            }
                        })
                }).catch(err=>{
                        this.isLoading = false
                        console.log(err)
                        try {
                             this.emailCek = err.response.data.email[0]
                        } catch (error) {
                            console.log(error)
                        }
                })
            }
        },
        async handleClickSignIn() {
         try {
           const googleUser = await this.$gAuth.signIn();
           if (!googleUser) {
             return null;
           }
           let getDataUser = googleUser.getBasicProfile()
           this.$store.dispatch('registerGooglePost',{
               data:{
                   email:getDataUser.Et,
                   name:getDataUser.Ne,
                   avatar:getDataUser.hJ,
                   google_id:getDataUser.mS
               }
           }).then(x=>{
               sessionStorage['token'] = x.data.token
               localStorage.setItem('user',JSON.stringify({avatar:getDataUser.hJ}))
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
    }
}
</script>