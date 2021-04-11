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
                <div v-for="feeding in noteData.feedings" :key="feeding"  class="item">
                    <span> Кормление </span>
                    <span>Время: {{ feeding.time }}</span>
                    <span>Продукты: {{ feeding.products }} </span>
                </div>
                <div v-for="heighth in noteData.heighths" :key="heighth"  class="item">
                    <span> Рост и вес </span>
                    <span>Рост: {{ heighth.height }}</span>
                    <span>Вес: {{ heighth.weight }} </span>
                </div>
                <div v-for="sleep in noteData.sleeps" :key="sleep"  class="item">
                    <span> Сон </span>
                    <span>Начало: {{ sleep.start }}</span>
                    <span>Конец: {{ sleep.end }} </span>
                    <span>Комментарий: {{ sleep.comment }} </span>
                </div>
                <div v-for="teeth in noteData.teeths" :key="teeth"  class="item">
                    <span> Прорезывание зубов </span>
                    <span>Дата: {{ teeth.date }}</span>
                    <span> {{ teeth.name }} </span>
                </div>
                <div v-for="vaccination in noteData.vaccinations" :key="vaccination"  class="item">
                    <span> Прививки </span>
                    <span>Название: {{ vaccination.name }}</span>
                    <span>Комментарий: {{ vaccination.comment }} </span>
                </div>
                <div v-for="walk in noteData.walks" :key="walk"  class="item">
                    <span>Начало: {{ walk.start }}</span>
                    <span>Конец: {{ walk.end }} </span>
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
            if(this.date === '')
            {
                return ((new Date()).getDate() + '-0' + ((new Date()).getMonth() + 1) + '-' + (new Date()).getFullYear())
            }
            else
                return this.date;
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
.item {
    background: #fafafa;
    padding: 10px;
    color: #777;
    font-weight: 700;
}
.item:nth-of-type(2n+1) {
    background: none;
}
</style>
