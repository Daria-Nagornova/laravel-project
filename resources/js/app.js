/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import router from './router'
import store from './store'
import ProfileUser from "./components/ProfileUser";
import Consultations from "./components/Consultations";
import ChildDiary from "./components/ChildDiary";
import Communities from "./components/Communities";
import AddChild from "./components/AddChild";
import AddNotes from "./components/AddNotes";
import Feeding from "./components/NoteCategoties/Feeding";
import Height from "./components/NoteCategoties/Height";
import Sleep from "./components/NoteCategoties/Sleep";
import Teeth from "./components/NoteCategoties/Teeth";
import Vaccination from "./components/NoteCategoties/Vaccination";
import Walk from "./components/NoteCategoties/Walk";
import Blog from "./components/Blog";
import BlogPost from "./components/BlogPost";
import AddPost from "./components/AddPost";
import UpdatePost from "./components/UpdatePost";
import UserPost from "./components/UserPost";
import Login from "./components/Auth/Login";
import Register from "./components/Auth/Register";
import MainAdmin from "./components/Admin/MainAdmin";
import DoctorProfile from "./components/Doctor/DoctorProfile";
import ErrorPage from "./components/NoteCategoties/ErrorPage";



require('./bootstrap');

//window.Vue = require('vue').default;

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
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('home-page', require('./components/HomePage.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        Communities,
        ProfileUser,
        Consultations,
        ChildDiary,
        AddChild,
        AddNotes,
        Feeding,
        Height,
        Sleep,
        Teeth,
        Vaccination,
        Walk,
        Blog,
        BlogPost,
        AddPost,
        UpdatePost,
        UserPost,
        Login,
        Register,
        MainAdmin,
        DoctorProfile,
        ErrorPage
    },
    router,
    store
});
