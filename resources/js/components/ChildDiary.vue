<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Дневник ребенка</li>
            </ol>
        </nav>
        <router-link to="/profile-user/child-diary/add-child" class="btn-q">Добавить ребенка</router-link>
        <div v-for="child in childrenData.children" :key="child.id" class="row child">
            <router-link :to="'/profile-user/child-diary/notes-today/' + child.id" class="col-8">
                    <span> {{ child.name }} </span>
                    <span> {{ child.date_birth }} </span>
                    <span> {{ child.gender }} </span>
            </router-link>
            <div class="col-4">
                <router-link :to="'/profile-user/child-diary/add-notes/' + child.id" class="btn btn-outline-secondary add-notes">+ Добавить запись</router-link>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "ChildDiary",
    data() {
        return {
            childrenData: {},
        }
    },
    methods: {
       loadChildren() {
           axios.get('/api/child', { headers: {
                   'Authorization': 'Bearer ' + this.$store.state.token }
           })
                .then(r => this.childrenData = r.data)
                .catch(e => console.log(e))
       }
    },
    mounted() {
        this.loadChildren()
    },
}
</script>

<style scoped>
a {
    text-decoration: none;
}
.btn-q {
    background-color: white;
    border: none;
    border-bottom: 2px solid #95999c;
    font-weight: 500;
    color: #6c757d;
}
.child {
    background: #e9ecef;
    margin: 15px;
    font-size: 1rem;
    font-weight: 600;
    display: flex;
    padding: 15px;
    border-radius: 10px;
}
.add-notes {
    border: none;
}
</style>
