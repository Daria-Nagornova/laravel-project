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
            <div class="col-8">
                <div class="child">
                    <span> {{ child.name }} </span>
                    <span> {{ child.date_birth }} </span>
                    <span> {{ child.gender }} </span>
                </div>
            </div>
            <div class="col-4">
                <router-link :to="'/profile-user/child-diary/add-notes/' + child.id" class="btn btn-outline-secondary addNotes">+ Добавить запись</router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div>{{ todayDate }}</div>
                <span>Прогулка</span>
                <span> Начало-конец </span>
                <span>Длительность </span>
            </div>
            <div class="col-4">
                <div class="col">
                    <label>Выбрать дату</label>
                    <input class="form-control" type="date" v-model="date">
                </div>
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
    computed: {
        todayDate() {
            return ((new Date()).getDate() + '-0' + ((new Date()).getMonth() + 1) + '-' + (new Date()).getFullYear())
        }
    }
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
    background: #95999c;
    margin: 15px;
}
</style>
