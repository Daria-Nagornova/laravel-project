<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/communities">Сообщества</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Добавление поста</li>
            </ol>
        </nav>
        <div class="row">
            <form @submit.prevent="savePost" class="add-post col-8">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" v-model="title">
                </div>
                <div class="form-group">
                    <label for="subcategory">Выберите подкатегорию:</label>
                    <select class="form-control" id="subcategory" v-model="subcategory">
                        <option value="1">Питание</option>
                        <option value="2">Занятия</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="post">Текст публикации</label>
                    <textarea class="form-control" id="post" rows="6" v-model="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Прикрепите изображение:</label>
                    <input type="file" class="form-control-file" id="file" @change="selectFile">
                </div>
                <div class="form-group btn-box">
                    <button type="submit" class="btn btn-outline-secondary btn-post">Опубликовать</button>
                    <button class="btn btn-outline-secondary btn-post" @click="cancel">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
name: "AddPost",
    data() {
        return {
            title: '',
            content: '',
            subcategory: '',
            image: ''
        }
    },
    methods: {
        selectFile(event) {
            this.image = event.target.files[0]
            console.log(this.image)
        },
        savePost() {
            console.log(this.image, this.title)
            let form = new FormData()
            form.append('image', this.image)
            form.append('title', this.title)
            form.append('content', this.content)
            form.append('subcategory_id', this.subcategory)
            form.append('category_id', this.$route.params.categories)
            form.append('user_id', '61')

           /* axios.post('/api/communities/' +  this.$route.params.categories + '/add/post', {
                title: this.title,
                content: this.content,
                subcategory_id: this.subcategory,
                category_id: this.$route.params.categories,
                user_id: 5,
                image: this.image
            })*/
            axios.post('/api/communities/' +  this.$route.params.categories + '/add/post', form)
                .then(r => console.log(r.data))
                .catch(e => console.log(e))
            //this.cancel()
        },
        cancel () {
            this.$router.push('/communities/' +  this.$route.params.categories)
        }
    }
}
</script>

<style scoped>
* {
    margin: 10 auto;
}

.add-post {
    margin: 40px auto;
    font-family: "Nunito", sans-serif;
    font-size: 1rem;
    font-weight: 400;
    color: #494f54;
}
.btn-box {
    display: flex;
    align-items: center;
    justify-content: center;
}
.btn-post {
    border-radius: 15px !important;
    margin: 0 20px;
    max-width: 150px;
}

</style>
