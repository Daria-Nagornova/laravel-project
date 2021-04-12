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
import UserConsultations from "./components/UserConsultations";
import NotesToday from "./components/NotesToday";
import AddCategory from "./components/Admin/AddCategory";
import DeleteCategory from "./components/Admin/DeleteCategory";
import Subcategory from "./components/Admin/Subcategory";
import AddSub from "./components/Admin/AddSub";
import DeleteSub from "./components/Admin/DeleteSub";
import Doctor from "./components/Admin/Doctor";
import AddDoctor from "./components/Admin/AddDoctor";
import DeleteDoctor from "./components/Admin/DeleteDoctor";



Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: HomePage },
        { path: '/login', component: Login },
        { path: '/register', component: Register },
        { path: '/communities', component: Communities},
        { path: '/communities/:categories', component: Blog, name: 'blog', props: true },
        { path: '/communities/:categories/:post', component: BlogPost },
        { path: '/communities/:categories/add/post', component: AddPost },
        { path: '/communities/:categories/:post/update', component: UpdatePost },
        { path: '/consultations', component: Consultations },
        { path: '/profile-user', component: ProfileUser },
        { path: '/profile-user/child-diary', component: ChildDiary },
        { path: '/profile-user/child-diary/add-child', component: AddChild },
        { path: '/profile-user/child-diary/add-notes/:id', component: AddNotes },
        { path: '/profile-user/child-diary/notes-today/:id', component: NotesToday },
        { path: '/profile-user/child-diary/add-notes/:id/sleep', component: Sleep },
        { path: '/profile-user/child-diary/add-notes/:id/feeding', component: Feeding },
        { path: '/profile-user/child-diary/add-notes/:id/height', component: Height },
        { path: '/profile-user/child-diary/add-notes/:id/teeth', component: Teeth },
        { path: '/profile-user/child-diary/add-notes/:id/vaccination', component: Vaccination },
        { path: '/profile-user/child-diary/add-notes/:id/walk', component: Walk },
        { path: '/profile-user/user-posts', component: UserPost },
        { path: '/profile-user/user-consultations', component: UserConsultations },
        { path: '/profile-doctor', component: DoctorProfile },
        { path: '/admin', component: MainAdmin },
        { path: '/admin/add-category', component: AddCategory },
        { path: '/admin/delete-category/:id', component: DeleteCategory },
        { path: '/admin/subcategories', component: Subcategory },
        { path: '/admin/add-subcategory', component: AddSub },
        { path: '/admin/delete-subcategory/:id', component: DeleteSub },
        { path: '/admin/doctors', component: Doctor },
        { path: '/admin/add-doctor', component: AddDoctor },
        { path: '/admin/delete-doctor/:id', component: DeleteDoctor },
        { path: '/logout', component: Logout },
        { path: '/:notFound(.*)', component: ErrorPage }
    ],
    mode: 'history'
})
