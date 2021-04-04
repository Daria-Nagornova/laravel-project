<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Консультации</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-8">
                <h3>Педиатры</h3>
                <div class="specialisation">
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                </div>
                <h3>Неврологи</h3>
                <div class="specialisation">
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                </div>
                <h3>Психологи</h3>
                <div class="specialisation">
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                    <div class="doctor">
                        <div class="avatar-doctor">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="doctor-name">Имя врача</div>
                        <span class="doctor-info">Описание</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <h3 class="questions-title">Задать вопрос врачу</h3>
                <form @submit.prevent="saveConsultation">
                    <div class="form-group">
                        <label for="email">Введите email:</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="doctor">Выберите доктора:</label>
                        <select class="form-control" id="doctor" v-model="doctor">
                            <option value="1">Иванов</option>
                            <option value="2">Петров</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question">Введите вопрос:</label>
                        <textarea class="form-control" id="question" rows="3" v-model="question"></textarea>
                    </div>
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
                    <button v-on:click="getShow" class="btn-q">Показать ответ</button>
                    <div v-if="show" class="post-details">
                        <div class="post-footer d-flex align-items-center">
                            <div class="avatar">
                                <img src="img/avatar-3.jpg" class="img-fluid">
                            </div>
                            <div class="title">Имя врача</div>
                        </div>
                        <p class="text-muted">Текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст</p>
                    </div>
                </li>
            </ul>
        </div>
        <pagination :data="consultationData" @pagination-change-page="loadConsultation" class="paginate"></pagination>
    </div>
</template>

<script>
export default {
    name: "Consultations",
    data() {
        return {
            show: false,
            question: '',
            email: '',
            doctor: '',
            consultationData: {},
        }
    },
    methods: {
        getShow() {

           return this.show = !this.show

        },
        loadConsultation(page = 1) {
            axios.get('/api/consultations/'  + '?page=' + page)
                .then(r => this.consultationData = r.data)
                .catch(e => console.log(e))
        },
        saveConsultation() {
            axios.post('/api/consultations/',
                {
                    email: this.email,
                    text: this.question,
                    user_id: 4,
                    doctor_id: this.doctor,
                    status: 'не выполнена'
                })
                .then(r => console.log(r))
                .catch(e => console.log(e))
            this.email = ''
            this.question = ''
            this.doctor = ''
            this.$router.push('/consultations/')
        }
    },
    mounted() {
        this.loadConsultation()
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
.avatar {
    max-width: 40px;
    min-width: 40px;
    height: 40px;
    border-radius: 20px;
}
.avatar-doctor {
    max-width: 100px;
    height: 100px;
    border-radius: 50px;
}
.btn-q {
    background-color: white;
    border: none;
    border-bottom: 2px solid #95999c;
}
.post-details {
    padding: 15px;
}
.paginate {
    margin: 20px auto;
}
ul.paginate {
    width: 250px;
}
</style>
