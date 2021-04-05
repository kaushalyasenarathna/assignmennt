import Index from './components/Index.vue';
import Create from './components/create.vue';
 
 
 
import Edit from './components/edit.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Index
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    }
];