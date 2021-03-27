import Vue from 'vue';
import VueRouter from 'vue-router';
import Communities from "./components/Communities";
import HomePage from "./components/HomePage";
import ProfileUser from "./components/ProfileUser";
import Consultations from "./components/Consultations";
import ChildDiary from "./components/ChildDiary";
import AddChild from "./components/AddChild";
import AddNotes from "./components/AddNotes";
import Feeding from "./components/NoteCategoties/Feeding";
import Height from "./components/NoteCategoties/Height";
import Sleep from "./components/NoteCategoties/Sleep";
import Teeth from "./components/NoteCategoties/Teeth";
import Vaccination from "./components/NoteCategoties/Vaccination";
import Walk from "./components/NoteCategoties/Walk";



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
        { path: '/profile-user/child-diary/add-notes', component: AddNotes },
        { path: '/profile-user/child-diary/add-notes/sleep', component: Sleep },
        { path: '/profile-user/child-diary/add-notes/feeding', component: Feeding },
        { path: '/profile-user/child-diary/add-notes/height', component: Height },
        { path: '/profile-user/child-diary/add-notes/teeth', component: Teeth },
        { path: '/profile-user/child-diary/add-notes/vaccination', component: Vaccination },
        { path: '/profile-user/child-diary/add-notes/walk', component: Walk },

    ],
    mode: 'history'
})
