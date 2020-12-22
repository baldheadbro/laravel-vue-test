import VueRouter from 'vue-router';

import ServiceList from './components/ServiceList';
import ServiceEdit from './components/ServiceEdit';
import ServiceCreate from './components/ServiceCreate';
import ServiceItem from './components/ServiceItem';

export default new VueRouter({
    routes: [
        { path: '/', component: ServiceList },
        { path: '/edit/:id', component: ServiceEdit, name: 'editService', props: true },
        { path: '/add', component: ServiceCreate },
        { path: '/view/:id', component: ServiceItem, name: 'viewService', props: true }
    ]
});