<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Профиль врача</li>
            </ol>
        </nav>
        <div class="questions">
            <div class="questions-form">Консультации</div>
            <ul>
                <li v-for="consultation in consultationData.data" :key="consultation">
                    <div>{{ consultation.text }}</div>
                    <form @submit.prevent="saveAnswer(consultation.id)" class="add-comment">
                        <div class="form-group">
                            <label for="post">Комментарий:</label>
                            <textarea class="form-control" id="post" rows="4" v-model="text"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary btn-post">Отправить</button>
                    </form>
                    <div class="post-details">
                        <p class="text-muted">Текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст отзыва текст</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
name: "DoctorProfile",
    data() {
        return {
            consultationData: {},
            text: ''
        }
    },
    methods: {
        loadConsultation(page = 1) {
            axios.get('/api/doctor-consultations', { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token }
            })
                .then(r => this.consultationData = r.data)
                .catch(e => console.log(e))
        },
        saveAnswer(id) {
            axios.post('/api/add-answer',
                {
                    text: this.text,
                    consultation_id: this.id
                },
                { headers: {
                        'Authorization': 'Bearer ' + this.$store.state.token }
                })
                .then(r => this.loadBlogPost())
                .catch(e => this.error(e))
            this.text = ''
        }
    },
    mounted() {
        this.loadConsultation()
    }
}
</script>

<style scoped>

</style>
