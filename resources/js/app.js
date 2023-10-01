import '@/bootstrap.js'
import { createApp } from 'vue'

import HelloWorld from './components/HelloWorld.vue'
import Login from './components/Login.vue'
import Register from './components/Register.vue'

const HelloWorldVue = createApp(HelloWorld).mount('#HelloWorld')
const LoginVue = createApp(Login).mount('#Login')
const RegisterVue = createApp(Register).mount('#Register')
