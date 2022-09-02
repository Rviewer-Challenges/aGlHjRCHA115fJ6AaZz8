require('./bootstrap');

window.Vue = require('vue').default;

import vuetify from './vuetify';

Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('list-projects-component', require('./components/ListProjectsComponent.vue').default);
Vue.component('list-categories-component', require('./components/ListCategoriesComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);


const app = new Vue({
    el: '#app',
    vuetify
});
