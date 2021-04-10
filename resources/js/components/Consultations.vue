<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Консультации</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-8">
                <h3>Педиатры</h3>
                <div class="row specialisation">
                    <div v-for="doctor in doctorsData" :key="doctor.id" v-if="doctor.specialisation_id === 1" class="col-sm-6 col-lg-3">
                        <div class="doctor">
                            <div class="avatar-doctor">
                                <img :src="$store.state.site + doctor.image" class="img-fluid">
                            </div>
                            <div class="doctor-name">{{ doctor.name }}</div>
                            <span class="doctor-info">{{ doctor.description }}</span>
                        </div>
                    </div>
                </div>
                <h3>Неврологи</h3>
                <div class="row specialisation">
                    <div v-for="doctor in doctorsData" :key="doctor.id" v-if="doctor.specialisation_id === 2" class="col-sm-4">
                        <div class="doctor">
                            <div class="avatar-doctor">
                                <img :src="$store.state.site + doctor.image" class="img-fluid">
                            </div>
                            <div class="doctor-name">{{ doctor.name }}</div>
                            <span class="doctor-info">{{ doctor.description }}</span>
                        </div>
                    </div>
                </div>
                <h3>Психологи</h3>
                <div class="row specialisation">
                    <div v-for="doctor in doctorsData" :key="doctor.id" v-if="doctor.specialisation_id === 3" class="col-sm-4">
                        <div class="doctor">
                            <div class="avatar-doctor">
                                <img :src="$store.state.site + doctor.image" class="img-fluid">
                            </div>
                            <div class="doctor-name">{{ doctor.name }}</div>
                            <span class="doctor-info">{{ doctor.description }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="loggedIn" class="col-lg-4">
                <h3 class="questions-title">Задать вопрос врачу</h3>
                <form @submit.prevent="saveConsultation">
                    <div class="form-group">
                        <label for="email">Введите email:</label>
                        <input type="email" :class="{ 'is-invalid': active }" class="form-control" id="email" placeholder="name@example.com" v-model="email">
                    </div>
                    <div class="error">{{ errEmail }}</div>
                    <div class="form-group">
                        <label for="doctor">Выберите доктора:</label>
                        <select class="form-control" :class="{ 'is-invalid': activeDoctor }" id="doctor" v-model="doctor">
                            <option v-for="doctor in doctorsData" :key="doctor.id" :value="doctor.id">{{ doctor.name }}</option>
                        </select>
                    </div>
                    <div class="error">{{ errDoctor }}</div>
                    <div class="form-group">
                        <label for="question">Введите вопрос:</label>
                        <textarea class="form-control" :class="{ 'is-invalid': activeQuestion }" id="question" rows="3" v-model="question"></textarea>
                    </div>
                    <div class="error">{{ errQuestion }}</div>
                    <button type="submit" class="btn btn-outline-secondary btn-cons">Отправить</button>
                    <small>*Врачи отвечают в течении 24 часов. Ответ появится в личном кабинете, на вкладке консультации</small>
                </form>
            </div>
        </div>
        <div class="questions">
            <div class="questions-form">Ответы специалистов</div>
            <ul>
                <li v-for="consultation in consultationData.data" :key="consultation">
                    <div>{{ consultation.text }}</div>
                    <answer :data="consultation"></answer>

                </li>
            </ul>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Данные отправлены!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cancel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <pagination :data="consultationData" @pagination-change-page="loadConsultation" class="paginate"></pagination>
    </div>
</template>

<script>
import Answer from "./Answer";
export default {
    name: "Consultations",
    components: {Answer},
    data() {
        return {
            show: false,
            question: '',
            email: '',
            doctor: '',
            consultationData: {},
            doctorsData: {},
            massage: '',
            active: false,
            activeQuestion: false,
            activeDoctor: false,
            errQuestion: '',
            errDoctor: '',
            errEmail: '',
        }
    },
    methods: {
        getShow() {
           return this.show = !this.show
        },
        loadConsultation(page = 1) {
            axios.get('/api/consultations/?page=' + page)
                .then(r => this.consultationData = r.data)
                .catch(e => console.log(e))
        },
        loadDoctors() {
            axios.get('/api/doctors')
                .then(r => this.doctorsData = r.data)
                .catch(e => console.log(e))
        },
        saveConsultation() {
            this.active = false
            this.activeQuestion = false
            this.activeDoctor = false

            this.errQuestion = ''
            this.errDoctor = ''
            this.errEmail = ''

            axios.post('/api/consultations/',
                {
                    email: this.email,
                    text: this.question,
                    doctor_id: this.doctor,
                    status: 'не выполнена'
                },
                { headers: {
                        'Authorization': 'Bearer ' + this.$store.state.token }
                })
                .then(r => this.success())
                .catch(e => this.error(e))
        },
        error(e) {
            this.massage = e.response.data.errors

            for (let key in this.massage) {

                if (key === 'email') {
                    this.active = true
                    this.errEmail = this.massage[key][0]
                }

                if (key === 'text') {
                    this.activeQuestion = true
                    this.errQuestion = this.massage[key][0]
                }

                if (key === 'doctor_id') {
                    this.activeDoctor = true
                    this.errDoctor = this.massage[key][0]
                }
            }
        },
        cancel () {
            this.$router.push('/consultations')
        },
        success() {
            this.email = ''
            this.question = ''
            this.doctor = ''

            $('#myModal').modal('toggle')
        },
    },
    computed: {
        loggedIn() {
            return this.$store.getters.loggedIn
        }
    },
    mounted() {
        this.loadConsultation()
        this.loadDoctors()
    }
}
</script>

<style scoped>
.specialisation {
    background-color: #e9ecef;
    border-radius: 15px;
    display: flex;
    justify-content: space-between;
    margin: 20px auto;
}
.doctor {
    margin: 20px;
    text-align: center;
}
.questions ul li {
    padding: 15px 0;
    border-bottom: 1px solid darkgray;
}
.questions-title {
    text-align: center;
    border-bottom: 2px solid #95999c;
    margin: 20px 0;
    font-size: 20px;
}
.questions-form {
    text-align: center;
    border-bottom: 2px solid #95999c;
    margin: 20px 0;
    font-size: 28px;
}
.btn-cons {
    width: 100%;
    border-radius: 15px !important;
}
.avatar-doctor img {
    max-width: 100px;
    height: 100px;
    border-radius: 50px;
}
.paginate {
    margin: 20px auto;
}
ul.paginate {
    width: 250px;
}
.error {
    color: red;
    margin-bottom: 10px;
}
.doctor-name {
    border-bottom: 2px darkviolet;
    font-weight: 500;
    padding: 5px;
}
.doctor-info {
    font-size: 0.8rem;
    padding: 5px;
 }
</style>
