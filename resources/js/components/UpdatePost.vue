<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/communities">Сообщества</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Редактирование поста</li>
            </ol>
        </nav>
        <div class="row">
            <form @submit.prevent="updatePost" class="add-post col-8">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" :class="{ 'is-invalid': active }" id="title" v-model="blogPostData.title">
                </div>
                <div class="error">{{ errTitle }}</div>
                <div class="form-group">
                    <label for="subcategory">Выберите подкатегорию:</label>
                    <select class="form-control" :class="{ 'is-invalid': activeSub }" id="subcategory" v-model="blogPostData.subcategory_id">
                        <option v-for="item in arr" :key="item.id" :value="item.id">{{ item.name }}</option>
                    </select>
                </div>
                <div class="error">{{ errSub }}</div>
                <div class="form-group">
                    <label for="post">Текст публикации</label>
                    <textarea class="form-control" :class="{ 'is-invalid': activeContent }" id="post" rows="6" v-model="blogPostData.content"></textarea>
                </div>
                <div class="error">{{ errContent }}</div>
                <div class="form-group" :class="{ 'is-invalid': activeFile }">
                    <label for="file">Прикрепите изображение:</label>
                    <input type="file" class="form-control-file" id="file" @change="selectFile">
                </div>
                <div class="error">{{ errFile }}</div>
                <div class="form-group btn-box">
                    <button type="submit" class="btn btn-outline-secondary btn-post">Опубликовать</button>
                    <button class="btn btn-outline-secondary btn-post" @click="cancel">Отменить</button>
                </div>
            </form>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Пост отредактирован!</h5>
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
    name: "AddPost",
    props: ["post"],
    data() {
        return {
            title: '',
            content: '',
            subcategory: '',
            blogPostData: {},
            massage: '',
            arr: '',
            show: true,
            active: false,
            activeSub: false,
            activeContent: false,
            activeFile: false,
            errTitle: '',
            errSub: '',
            errContent: '',
            errFile: '',
        }
    },
    methods: {
        selectFile(event) {
            this.image = event.target.files[0]
        },
        loadBlogPost() {
            axios.get('/api/communities/' + this.$route.params.categories+ '/' + this.$route.params.post)
                .then(r => this.blogPostData = r.data)
                .catch(e => console.log(e))

        },
        updatePost() {
            this.active = false
            this.activeSub = false
            this.activeContent = false
            this.activeFile = false

            this.errTitle = ''
            this.errSub = ''
            this.errContent = ''
            this.errFile = ''

            let form = new FormData()
            form.append('image', this.image)
            form.append('title', this.blogPostData.title)
            form.append('content', this.blogPostData.content)
            form.append('subcategory_id', this.blogPostData.subcategory_id)
            form.append('category_id', this.$route.params.categories)
            form.append('user_id', this.blogPostData.user_id)

            axios.post('/api/communities/' + this.$route.params.categories + '/' + this.$route.params.post  + '/update', form)
                .then(r => this.success())
                .catch(e => this.error(e))
        },
        cancel() {
            this.$router.push('/communities/' + this.$route.params.categories)
        },
        success() {
            $('#myModal').modal('toggle')
        },
        error(e) {
            this.massage = e.response.data.errors

            for(let key in this.massage) {

                if(key === 'title') {
                    this.active = true
                    this.errTitle = this.massage[key][0]
                }

                if(key === 'subcategory_id') {
                    this.activeSub = true
                    this.errSub = this.massage[key][0]
                }

                if(key === 'content') {
                    this.activeContent = true
                    this.errContent = this.massage[key][0]
                }

                if(key === 'image') {
                    this.activeFile = true
                    this.errFile = this.massage[key][0]
                }

            }
        },
        loadSub() {
            axios.get('/api/sub/' + this.$route.params.categories)
                .then(r => this.arr = r.data)
                .catch(e => console.log(e))
        }
    },
    mounted() {
        this.loadBlogPost()
        this.loadSub()
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
.error {
    color: red;
    margin-bottom: 10px;
}
</style>
