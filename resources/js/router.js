import {createRouter,createWebHashHistory,createWebHistory} from 'vue-router';
import Home from './components/Home.vue';
import User from './components/User.vue';
import About from './components/ExampleComponent.vue';
import login from './components/login.vue';
import register from './components/register.vue';
import post from './components/post.vue';
import profile from './components/profile.vue';


import f from './components/f.vue';
const routes = [
    { path: '/f',
      component: f ,
      children:[
        {
          path:'login',
          name:'login',
          component:login
        },{
          path:'register',
          component:register
        }
      ]
     },
    { 
      path: '/f/U/', 
      beforeEnter: async function (to,from,next) {
        const resp = await fetch(`${window.location.origin}/api/CEK_TOKEN?token=${sessionStorage['token']}`)
        const X = await resp.json()
        if (X.msg === 'logged') {
          next() // Silahkan masuk ke route ini
          console.log('isLooged');
        }
        else{
          next({name:'login'}) // Dilempar ke route dengan name: home
          console.log('noTLo');
        }
      },
      component: User,
      children:[
        {
          path:'home',
          name:'home',
          component:Home
        },{
          path:'post',
          component:post
        },{
          name:'profile',
          path:'profile',
          component:profile
        }
      ],
    },
  ]

const router = createRouter({
    history: createWebHistory(),
    base: `/${window._locale}/`,
    routes, 
})
export default router