<template>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-12 col-lg-4">
            <div class="card p-2 m-3">
                <div class="card-body">
                    <it-progressbar v-show="isLoading" :height="3" infinite />
                    <h1>Register</h1>
                    <div class="m-1">
                         <form @submit.prevent="Register">
                             <it-input v-model="name" type="text" label-top="Name" placeholder="Your Name" required />
                             <it-input v-model="email" type="email" label-top="Email" placeholder="Your Email" required />
                             <it-input v-model="password" type="password" label-top="Password" placeholder="Your Password" required />
                             <it-input v-model="repassword" type="password" label-top="Confirm Password" :message="conf" placeholder="Your Password" required />
                             <div class="d-flex justify-content-star align-items-center mt-3">
                                    <it-button class="m-2" type="primary">Register</it-button>
                                    <it-button  @click.prevent="login()"  class="m-2" type="primary">Google &nbsp;<i class="mdi mdi-google"></i></it-button>
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
    created(){
        this.$Loading.start()
    },
    mounted(){
        this.$Loading.finish()
    },
    data() {
        return {
            'name':'',
            'email':'',
            'password':'',
            'repassword':'',
            'isLoading':false
        }
    },
    computed:{
        conf(){
            if (this.password === this.repassword) {
                return ''
            }else{
                return '! Password & Confrim password harus sama'
            }
        }
    },
    methods:{
        Register(){
            if (this.password === this.repassword) {
                this.isLoading = true
                fetch(`${window.location.origin}/api/Auth/Register`,{
                    method:"POST",
                    headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name:this.name,
                        email:this.email,
                        password:this.password
                    })
                }).then(x=>x.json()).then(resp=>{
                    this.isLoading = false                    
                })
                console.log('sdf');
            }
        }
    }
}
</script>