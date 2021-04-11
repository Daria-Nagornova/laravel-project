<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Записи</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-8">
                <div class="date">{{ todayDate }}</div>
                <div class="item">
                    <span>{{ $route.params.id }}</span>
                    <span> Начало-конец </span>
                    <span>Длительность </span>
                </div>
            </div>
            <div class="col-4">
                <div class="col">
                    <label>Выбрать дату</label>
                    <input class="form-control" type="date" v-model="date">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "NotesToday",
    data() {
        return {
            noteData: {},
            date: ''
        }
    },
    methods: {
        loadNotes() {
            axios.get('/api/notes/' + this.$route.params.id)
                .then(r => this.noteData = r.data)
                .catch(e => console.log(e))
        },
    },
    computed: {
        todayDate() {
            return ((new Date()).getDate() + '-0' + ((new Date()).getMonth() + 1) + '-' + (new Date()).getFullYear())
        }
    },
    created() {
        this.loadNotes()
    }
}
</script>

<style scoped>
.date {
    text-align: center;
}
</style>
