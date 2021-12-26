require('./bootstrap');
import store from './store';

window.Vue = require('vue').default;

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

// Vue.component('Todolist', require('./components/TodoList.vue').default);
Vue.component('Todolist', require('./components/admin/MenuOneEdit.vue').default);
Vue.component('Workouttodolist', require('./components/admin/WorkoutOneEdit.vue').default);


const app = new Vue({
    el: '#app',
    store
});