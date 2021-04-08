<template>
    <div>
        <button v-on:click="getShow" class="btn-q">Показать ответ</button>
        <div v-if="show" class="post-details">
            <div class="post-footer d-flex align-items-center">
                <div class="avatar">
                    <img src="img/avatar-3.jpg" class="img-fluid">
                </div>
                <div class="title">{{ data.doctor.name }}</div>
            </div>
            <p class="text-muted">{{ data.answer.text }}</p>
        </div>
    </div>
</template>

<script>
export default {
name: "Answer",
    props: ['data'],
    data() {
        return {
            show: false,
        }
    },
    methods: {
        getShow() {
            return this.show = !this.show
        }
    },
    created() {
    console.log(this.data.answer)
    }
}
</script>

<style scoped>
.avatar img {
    max-width: 40px;
    min-width: 40px;
    height: 40px;
    border-radius: 20px;
}
.btn-q {
    background-color: white;
    border: none;
    border-bottom: 2px solid #95999c;
}
.post-details {
    padding: 15px;
}
</style>
