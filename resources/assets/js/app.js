require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');

Vue.component('clientes-component', require('./components/ClientesComponent.vue'));
//Vue.component('form-component', require('./components/FormComponent.vue'));
Vue.component('cliente-component', require('./components/ClienteComponent.vue'));



const app = new Vue({
    el: '#app'
});
