<template>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-12 col-lg-4">
            <div class="card p-2 m-3">
                <div class="card-body">
                    <it-progressbar v-show="isLoading" :height="3" infinite />
                    <h1>Register</h1>
                    <div class="m-1">
                         <form @submit.prevent="Register">
                             <label for="name" class="form-label">Name</label>
                             <input v-model="name" class="form-control serch_ rounded-pill" type="text"  placeholder="Your Name" required>
                             <label for="email" class="form-label">Email</label>
                             <input v-model="email" class="form-control serch_ rounded-pill" type="email"  placeholder="Your Email" required>
                             <label for="password" class="form-label">Password</label>
                             <input v-model="password" class="form-control serch_ rounded-pill" type="password"  placeholder="Your Passowrd" required>
                             <label for="repassword" class="form-label">Repassword</label>
                             <input v-model="repassword" class="form-control serch_ rounded-pill" type="password"  placeholder="Confirm Password" required>
                             <span class="text-danger" >{{conf}}</span>
                             <div class="d-flex justify-content-star align-items-center mt-3">
                                    <button class="m-2 btn shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">Register</button>
                                    <button  @click.prevent="login()" class="m-2 btn shadow-none boreder-0 btn-comment-circle w-auto rounded-pill">Google &nbsp;<i class="mdi mdi-google"></i></button>
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