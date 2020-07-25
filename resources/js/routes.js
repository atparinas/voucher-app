import Vue from 'vue';
import VueRouter from 'vue-router';
import UserList from "./components/admins/UserList";
import Test from "./components/admins/Test";
import AdminDashboard from "./components/admins/AdminDashboard";

Vue.use(VueRouter)


const routes = [
    {
        path: '/',
        name: 'AdminDashboard',
        component: AdminDashboard
    },
    {
        path: '/users',
        name: 'UsersDashboard',
        component: UserList
    }
]

const router = new VueRouter({
    mode: 'hash',
    routes
})

export default router;
