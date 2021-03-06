/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-component', require('./components/users/show.vue').default);
Vue.component('spinner', require('./components/Spinner.vue').default);
Vue.component('create-user-component', require('./components/users/create.vue').default);

Vue.component('create-article-component', require('./components/articles/create.vue').default);
Vue.component('article-component', require('./components/articles/show.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.prototype.$alertName = function(name){
    alert('Hola '+name+', el articulo ha sido guardado');
};

const app = new Vue({
    el: '#app',
});

$(document).ready( function () {
    $('#users').DataTable({
        serverSide: true,
        ajax: '/api/users',
        columns : [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'},
        ]
    });
} );





