<template>
    <div class="container">
        <form @submit.prevent="saveCategory" class="add-post col-8">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" v-model="name">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" rows="6" v-model="description"></textarea>
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
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
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
    name: "AddCategory",
    data() {
        return {
            name: '',
            description: '',
            image: '',
        }
    },
    methods: {
        selectFile(event) {
            this.image = event.target.files[0]
        },
        saveCategory() {
            let form = new FormData()
            form.append('image', this.image)
            form.append('name', this.name)
            form.append('description', this.description)

            axios.post('/api/admin/communities/', form, { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token } })
                .then(r => this.success())
                .catch(e => this.error(e))

        },
        success() {
            $('#myModal').modal('toggle')
        },
        cancel () {
            this.$router.push('/admin')
        },
    },
}
</script>

<style scoped>

</style>
