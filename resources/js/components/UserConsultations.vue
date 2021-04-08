<template>
    <div class="questions">
        <div class="questions-form">Ответы специалистов</div>
        <ul>
            <li v-for="consultation in consultationData.data" :key="consultation">
                <div>{{ consultation.text }}</div>
                <div class="post-details">
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
</template>

<script>
export default {
name: "UserConsultations"
}
</script>

<style scoped>
.questions ul li {
    padding: 15px 0;
    border-bottom: 1px solid darkgray;
}
</style>
