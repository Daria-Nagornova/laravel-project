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
                    <button v-on:click="getShow" class="btn-q">Показать ответ</button>
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
name: "DoctorProfile"
}
</script>

<style scoped>

</style>
