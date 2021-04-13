<template>
    <div class="container">
        <form @submit.prevent="saveDoctor" class="add-post col-8">
            <div class="form-group">
                <label for="title">Имя</label>
                <input type="text" class="form-control" id="title" v-model="name">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="6" v-model="description"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Специализация</label>
                <select class="form-control" id="category" v-model="category">
                    <option value=1>Педиатр</option>
                    <option value=2>Невропатолог</option>
                    <option value=3>Психолог</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Id пользователя</label>
                <input type="text" class="form-control" id="title" v-model="userId">
            </div>
            <div class="form-group">
                <label for="file">Прикрепите изображение:</label>
                <input type="file" class="form-control-file" id="file" @change="selectFile">
            </div>
            <div class="form-group btn-box">
                <button type="submit" class="btn btn-outline-secondary btn-post">Добавить</button>
                <button class="btn btn-outline-secondary btn-post" @click="cancel">Отменить</button>
            </div>
        </form>
        <div id="myModal" class="modal fade massage" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Данные успешно сохранены.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cancel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddDoctor",
    data() {
        return {
            name: '',
            description: '',
            category: '',
            userId: '',
            image: '',
        }
    },
    methods: {
        selectFile(event) {
            this.image = event.target.files[0]
        },
        saveDoctor() {
            let form = new FormData()
            form.append('image', this.image)
            form.append('name', this.name)
            form.append('description', this.description)
            form.append('specialisation_id', this.category)
            form.append('user_id', this.userId)

            axios.post('/api/admin/doctors/', form, { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token } })
                .then(r => this.success())
                .catch(e => this.error(e))

        },
        success() {
            $('#myModal').modal('toggle')
        },
        cancel () {
            this.$router.push('/admin/doctors')
        },
    },
}
</script>

<style scoped>
.massage {
    margin-top: 100px;
}
</style>
