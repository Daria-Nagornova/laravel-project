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
import Blog from "./components/Blog";
import BlogPost from "./components/BlogPost";
import AddPost from "./components/AddPost";
import UpdatePost from "./components/UpdatePost";
import UserPost from "./components/UserPost";
import Login from "./components/Auth/Login";
import Register from "./components/Auth/Register";
import DoctorProfile from "./components/Doctor/DoctorProfile";
import MainAdmin from "./components/Admin/MainAdmin";
import ErrorPage from "./components/NoteCategoties/ErrorPage";
import Logout from "./components/Auth/Logout";



Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: HomePage },
        { path: '/login', component: Login },
        { path: '/register', component: Register },
        { path: '/communities', component: Communities },
        { path: '/communities/:categories', component: Blog },
        { path: '/communities/:categories/:post', component: BlogPost },
        { path: '/communities/:categories/add/post', component: AddPost },
        { path: '/communities/:categories/:post/update', component: UpdatePost },
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
        { path: '/profile-user/user-posts', component: UserPost },
        { path: '/doctor', component: DoctorProfile },
        { path: '/admin', component: MainAdmin },
        { path: '/logout', component: Logout },
        { path: '/:notFound(.*)', component: ErrorPage }
    ],
    mode: 'history'
})
