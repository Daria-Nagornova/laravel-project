<template>
    <div>
        <form v-if="data.answer === null" @submit.prevent="saveAnswer(data.id)" class="add-comment">
            <div class="form-group">
                <label for="post">Комментарий:</label>
                <textarea class="form-control" rows="4" v-model="text"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-secondary btn-post">Отправить</button>
        </form>
        <div v-else class="post-details">
            <p class="text-muted">{{ data.answer.text }}</p>
        </div>
    </div>
</template>

<script>
export default {
name: "AddAnswer",
    props: ['data'],
    data() {
        return {
            text: '',
        }
    },
    methods: {
        saveAnswer(id) {
            axios.post('/api/add-answer',
                {
                    text: this.text,
                    consultation_id: id
                },
                { headers: {
                        'Authorization': 'Bearer ' + this.$store.state.token }
                })
                .then(r => this.updateConsultation(id))
                .catch(e => console.log(e))

        },
        updateConsultation(id) {
            axios.patch('/api/update-consultation/' + id,
                {
                    status: 'выполнена'
                },
                { headers: {
                        'Authorization': 'Bearer ' + this.$store.state.token }
                })
                .then(r => console.log(r))
                .catch(e => console.log(e))

            this.$emit('update');
        }
    },
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
</style>
