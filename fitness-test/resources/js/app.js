require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('Formstep', require('./components/Formstep.vue').default);
Vue.component('Buy', require('./components/Buy.vue').default);

Vue.component('Workout', require('./components/Workout.vue').default);
Vue.component('Home', require('./components/Home.vue').default);
Vue.component('Diet', require('./components/Diet.vue').default);
Vue.component('Plugin', require('./components/Plugin.vue').default);
Vue.component('Question', require('./components/Question.vue').default);

const app = new Vue({
    el: '#app',
});