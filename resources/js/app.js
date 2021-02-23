require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('glavna', require('./components/Glavna.vue').default);
Vue.component('info', require('./components/info.vue').default);
Vue.component('naruci', require('./components/naruci.vue').default);
Vue.component('random', require('./components/random.vue').default);

const app = new Vue({
    el: '#app',
});
