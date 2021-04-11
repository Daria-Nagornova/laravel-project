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
            <div class="col-md-8">
                <div class="date">
                    <span> {{noteData.name }} </span>
                    <span> {{ todayDate }} </span>
                </div>
                <div v-for="feeding in noteData.feedings" :key="feeding" v-if="feeding.created_at.slice(0, 10) === todayDate" class="item">
                    <span> Кормление </span>
                    <span>Время: {{ feeding.time }}</span>
                    <span>Продукты: {{ feeding.products }} </span>
                    <button type="button" class="ml-2 mb-1 close" aria-label="Close" @click="deleteFeeding(feeding.id)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div v-for="heighth in noteData.heighths" :key="heighth" v-if="heighth.created_at.slice(0, 10) === todayDate" class="item">
                    <span> Рост и вес </span>
                    <span>Рост: {{ heighth.height }}</span>
                    <span>Вес: {{ heighth.weight }} </span>
                    <button type="button" class="ml-2 mb-1 close" aria-label="Close" @click="deleteHeight(heighth.id)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div v-for="sleep in noteData.sleeps" :key="sleep" v-if="sleep.created_at.slice(0, 10) === todayDate" class="item">
                    <span> Сон </span>
                    <span>Начало: {{ sleep.start }}</span>
                    <span>Конец: {{ sleep.end }} </span>
                    <span>Комментарий: {{ sleep.comment }} </span>
                    <button type="button" class="ml-2 mb-1 close" aria-label="Close" @click="deleteSleep(sleep.id)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div v-for="teeth in noteData.teeths" :key="teeth" v-if="teeth.created_at.slice(0, 10) === todayDate" class="item">
                    <span> Прорезывание зубов </span>
                    <span>Дата: {{ teeth.date }}</span>
                    <span> {{ teeth.name }} </span>
                    <button type="button" class="ml-2 mb-1 close" aria-label="Close" @click="deleteTeeth(teeth.id)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div v-for="vaccination in noteData.vaccinations" :key="vaccination" v-if="vaccination.created_at.slice(0, 10) === todayDate" class="item">
                    <span> Прививки </span>
                    <span>Название: {{ vaccination.name }}</span>
                    <span>Комментарий: {{ vaccination.comment }} </span>
                    <button type="button" class="ml-2 mb-1 close" aria-label="Close" @click="deleteVaccination(vaccination.id)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div v-for="walk in noteData.walks" :key="walk" v-if="walk.created_at.slice(0, 10) === todayDate" class="item">
                    <span> Прогулка </span>
                    <span>Начало: {{ walk.start }}</span>
                    <span>Конец: {{ walk.end }} </span>
                    <button type="button" class="ml-2 mb-1 close" aria-label="Close" @click="deleteWalk(walk.id)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
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
        deleteFeeding(id) {
            axios.delete('/api/delete-feeding/' + id)
                .then(r => this.loadNotes())
                .catch(e => console.log(e))
        },
        deleteWalk(id) {
            axios.delete('/api/delete-walk/' + id)
                .then(r => this.loadNotes())
                .catch(e => console.log(e))
        },
        deleteHeight(id) {
            axios.delete('/api/delete-height/' + id)
                .then(r => this.loadNotes())
                .catch(e => console.log(e))
        },
        deleteVaccination(id) {
            axios.delete('/api/delete-vaccination/' + id)
                .then(r => this.loadNotes())
                .catch(e => console.log(e))
        },
        deleteSleep(id) {
            axios.delete('/api/delete-sleep/' + id)
                .then(r => this.loadNotes())
                .catch(e => console.log(e))
        },
        deleteTeeth(id) {
            axios.delete('/api/delete-teeth/' + id)
                .then(r => this.loadNotes())
                .catch(e => console.log(e))
        },
    },
    computed: {
        todayDate() {
            if(this.date === '')
            {
                return ((new Date()).getFullYear() + '-0' + ((new Date()).getMonth() + 1) + '-' + (new Date()).getDate())
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
