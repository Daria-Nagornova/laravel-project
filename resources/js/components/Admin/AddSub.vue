<template>
    <div class="container">
        <form @submit.prevent="saveSubcategory" class="add-post col-8">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" v-model="name">
            </div>
            <div class="form-group">
                <label for="category">Выберите категорию:</label>
                <select class="form-control" id="category" v-model="category">
                    <option value=1>Беременность</option>
                    <option value=2>Дети до года</option>
                    <option value=3>Дети от 1 года до 3 лет</option>
                </select>
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
    name: "AddSub",
    data() {
        return {
            name: '',
            category: '',
        }
    },
    methods: {
        saveSubcategory() {
            let form = new FormData()
            form.append('name', this.name)
            form.append('category_id', this.category)

            axios.post('/api/admin/subcategories/', form, { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token } })
                .then(r => this.success())
                .catch(e => this.error(e))

        },
        success() {
            $('#myModal').modal('toggle')
        },
        cancel () {
            this.$router.push('/admin/subcategories')
        },
    },
}
</script>

<style scoped>
.massage {
    margin-top: 100px;
}
</style>
