/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'
import { Form, HasError, AlertError } from 'vform'
import BootstrapVue from 'bootstrap-vue'


window.Vue = require('vue')
Vue.use(VueRouter)


// vform
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


//client 
Vue.component('menu-index', require('./components/Menu.vue').default)




window.Form = Form;

//routes
const routes = [
    { path: '/home', component: require('./components/Home.vue').default },
    { path: '/burger', component: require('./components/Burgers.vue').default },
    { path: '/beverage', component: require('./components/Beverage.vue').default },
    { path: '/combo', component: require('./components/ComboMeals.vue').default },
  ]




const router = new VueRouter({
    mode: 'history',
    routes
  })




if (document.querySelector('#app')) {
  const app = new Vue({
    el: '#app',
    router
  });
}
	

if (document.querySelector('#app2')) {
  const app = new Vue({
    el: '#app2',
    router
  });
}