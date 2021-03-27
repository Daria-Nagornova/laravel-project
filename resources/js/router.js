import Vue from 'vue';
import VueRouter from 'vue-router';
import Communities from "./components/Communities";
import HomePage from "./components/HomePage";
import ProfileUser from "./components/ProfileUser";
import Consultations from "./components/Consultations";
import ChildDiary from "./components/ChildDiary";
import AddChild from "./components/AddChild";



Vue.use(VueRouter);

export default new VueRouter({
    //history: createWebHistory(),
    routes: [
        { path: '/', component: HomePage },
        { path: '/communities', component: Communities },
        { path: '/consultations', component: Consultations },
        { path: '/profile-user', component: ProfileUser },
        { path: '/profile-user/child-diary', component: ChildDiary },
        { path: '/profile-user/child-diary/add-child', component: AddChild },
    ],
    mode: 'history'
})
