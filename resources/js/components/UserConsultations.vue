<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Консультации со специалистами</li>
            </ol>
        </nav>
        <div class="questions">
            <div class="questions-form">Ответы специалистов</div>
            <ul>
                <li v-for="consultation in consultationData.consultations" :key="consultation">
                    <div>{{ consultation.text }}</div>
                    <div class="post-details">
                        <p v-if="consultation.answer !== null" class="text-muted">{{ consultation.answer.text }}</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
name: "UserConsultations",
    data() {
        return {
            consultationData: {},
        }
    },
    methods: {
        loadConsultation(page = 1) {
            axios.get('/api/user-consultations', { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token }
            })
                .then(r => this.consultationData = r.data)
                .catch(e => console.log(e))
        },
    },
    mounted() {
        this.loadConsultation()
    }
}
</script>

<style scoped>
.questions ul li {
    padding: 15px 0;
    border-bottom: 1px solid darkgray;
}
.questions-form {
    text-align: center;
    border-bottom: 2px solid #95999c;
    margin: 20px 0;
    font-size: 28px;
}
.post-details {
    padding-left: 20px;
    background-color: #e9ecef;
    margin-top: 10px;
}
</style>
