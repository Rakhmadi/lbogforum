import {createRouter,createWebHashHistory,createWebHistory} from 'vue-router';
import Home from './components/Home.vue';
import User from './components/User.vue';
import About from './components/ExampleComponent.vue';
import login from './components/login.vue';
import register from './components/register.vue';
import post from './components/post.vue';
import profile from './components/profile.vue';
import folower from './components/folower.vue';
import createPost from './components/createPost.vue';
import createPostC from './components/createPostC.vue';
import listPOST from './components/listPOST.vue';
import createTag from './components/createTag.vue';
import Galery from './components/Galery.vue';



async function cekLogin(to,from,next) {
  const resp = await fetch(`${window.location.origin}/api/CEK_TOKEN?token=${sessionStorage['token']}`)
  const X = await resp.json()
  if (X.msg === 'logged' ) {
    next() // Silahkan masuk ke route ini
  }
  else if (resp.status === 401) {
    next({name:'login'}) // Dilempar ke route dengan name: home
  }else{
    next({name:'login'}) // Dilempar ke route dengan name: home
  }
}

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
      component: User,
      children:[
        {
          path:'home',
          beforeEnter: cekLogin,
          name:'home',
          component:Home
        },{
          path:'post',
          beforeEnter: cekLogin,
          component:post
        },{
          name:'profile',
          beforeEnter: cekLogin,
          path:'profile',
          component:profile
        },{
          name:'folower',
          path:'folower',
          component:folower
        },{
          beforeEnter: cekLogin,
          name:'createPost',
          path:'createPost',
          component:createPost,
          children:[
            {
              name:'createPostC',
              path:'createPostC',
              component:createPostC
            },{
              name:'listPOST',
              path:'listPOST',
              component:listPOST
            },{
              name:'createTag',
              path:'createTag',
              component:createTag
            },{
              name:'Galery',
              path:'Galery',
              component:Galery
            }
          ]
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