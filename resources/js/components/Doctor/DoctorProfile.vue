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
                <li v-for="consultation in consultationData.doctor.consultations" :key="consultation">
                    <div>{{ consultation.text }}</div>
                    <add-answer :data="consultation" @update="loadConsultation"></add-answer>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import AddAnswer from "./AddAnswer";
export default {
name: "DoctorProfile",
    components: {AddAnswer},
    data() {
        return {
            consultationData: {},
        }
    },
    methods: {
        loadConsultation() {
            axios.get('/api/doctor-consultations', { headers: {
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

</style>
