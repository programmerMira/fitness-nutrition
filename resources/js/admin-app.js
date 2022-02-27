require('./bootstrap');
import store from './store';

window.Vue = require('vue').default;

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

Vue.component('Todolistmenu', require('./components/admin/MenuOneEdit.vue').default);
Vue.component('Todolistinfo', require('./components/admin/TodoListInfo.vue').default);
Vue.component('Todolistvideo', require('./components/admin/TodoListVideo.vue').default);

Vue.component('Addtodolistmenu', require('./components/admin/add/MenuOneDayAdd.vue').default);
Vue.component('Addtodolistinfo', require('./components/admin/add/TodoListInfoAdd.vue').default);
Vue.component('Addtodolistvideo', require('./components/admin/add/TodoListVideoAdd.vue').default);

const app = new Vue({
    el: '#app',
    store
});
