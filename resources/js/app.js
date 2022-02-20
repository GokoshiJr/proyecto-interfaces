/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import moment from 'moment'; // plugin fechas

import Swal from 'sweetalert2' // plugin alertas bonitas
window.Swal = Swal;

import Form from 'vform'; // plugin de formulario-vue
window.Form = Form;

import {
  Button,
  HasError,
  AlertError,
  AlertErrors,
  AlertSuccess
} from 'vform/src/components/bootstrap5';
// 'vform/src/components/bootstrap4'
// 'vform/src/components/tailwind'
  
Vue.component(Button.name, Button);
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertErrors.name, AlertErrors);
Vue.component(AlertSuccess.name, AlertSuccess);

// vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// barrita de progreso
import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '5px'
});

const routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/profile',   component: require('./components/Profile.vue').default },
  { path: '/users',     component: require('./components/Usuarios.vue').default },
  { path: '/home',      component: require('./components/Home.vue').default },
  { path: '/',          component: require('./components/Home.vue').default },
  { path: '/contact',   component: require('./components/Contact.vue').default },
  { path: '/messages',  component: require('./components/UserMessages.vue').default },
  { path: '/dev/:id',   component: require('./components/DevGallery.vue').default}
]

// router - modo history para que recuerde las rutas al hacer get en el barra del navegador
const router = new VueRouter({
  mode: 'history',
  routes // short for `routes: routes`
});

// filtros
Vue.filter('upText', function(text) {
  return text.charAt(0).toUpperCase() + text.slice(1);
});
Vue.filter('myDate', function(created) {
  return moment(created).format('MMMM Do YYYY');
});
Vue.filter('myAgo', function(time) {
  return moment(time).fromNow();
});
Vue.filter('myAccess', function(n) {
  if (n == 1) {
    return "Normal";
  } else {
    return "Baneado";
  }
});
/* 
  instancia vue reactiva que llamamos Fire donde registramos eventos

  uso
  Fire.$emit('AfterCreate');

  registro
  Fire.$on('AfterCreate', () => {
    this.loadPrograms();
  });
*/

window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// componente para el paginado
Vue.component('pagination', require('laravel-vue-pagination')); 
Vue.component('register',   require('./components/Register.vue').default);
Vue.component('login',      require('./components/Login.vue').default);
Vue.component('home',       require('./components/Home.vue').default);
Vue.component('program',    require('./components/Program.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
  router
});