<template>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-12 col-lg-4">
            <div class="card p-2 m-3">
                <it-progressbar v-show="isLoading" :height="3" infinite />
                <div class="card-body">
                        <div  class="alert alert-warning alert-dismissible fade show" role="alert" v-show="warning" >
                            Email atau Password Salah
                        </div>
                    <h1>Login</h1>
                    <div class="m-1">
                         <form @submit.prevent="login">
                             <it-input v-model="email" type="email" label-top="Email" placeholder="Your Email" required />
                             <it-input v-model="password" type="password" label-top="Password" placeholder="Your Password" required />
                             <div class="d-flex justify-content-star align-items-center mt-3">
                                    <it-button class="m-2" type="primary">Login</it-button>
                                    <it-button  @click.prevent="login()"  class="m-2" type="primary">Google &nbsp;<i class="mdi mdi-google"></i></it-button>
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
import { required, email, minLength, sameAs } from 'vuelidate/lib/validators'
import { useMeta } from 'vue-meta'
export default {
    setup(){
        useMeta({
          title: 'Login',
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
            'email':'',
            'password':'',
            'resp':[],
            'warning':false,
            'isLoading':false
        }
    },
    computed:{

    },
    methods: {
        async login(){
            this.isLoading = true
            this.warning = false
            const resp = await fetch(`${window.location.origin}/api/Auth/Login`,{
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