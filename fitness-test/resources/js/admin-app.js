require('./bootstrap');
import store from './store';

window.Vue = require('vue').default;

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

Vue.component('Todolist', require('./components/TodoList.vue').default);

const app = new Vue({
    el: '#app',
    store
});
