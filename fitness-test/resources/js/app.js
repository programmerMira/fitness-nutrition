require('./bootstrap');
import store from './store';

window.Vue = require('vue').default;

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

Vue.component('Formstep', require('./components/modal/Formstep.vue').default);
Vue.component('Buy', require('./components/modal/Buy.vue').default);
Vue.component('Login', require('./components/modal/Login.vue').default);

Vue.component('Workout', require('./components/Workout.vue').default);
Vue.component('Home', require('./components/Home.vue').default);
Vue.component('Diet', require('./components/Diet.vue').default);
Vue.component('Plugin', require('./components/Plugin.vue').default);
Vue.component('Question', require('./components/Question.vue').default);

const app = new Vue({
    el: '#app',
    store
});


