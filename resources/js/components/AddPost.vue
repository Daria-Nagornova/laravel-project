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
                    <input type="text" class="form-control" :class="{ 'is-invalid': active }" id="title" v-model="title">
                </div>
                <div class="error">{{ errTitle }}</div>
                <div class="form-group">
                    <label for="subcategory">Выберите подкатегорию:</label>
                    <select class="form-control" :class="{ 'is-invalid': activeSub }" id="subcategory" v-model="subcategory">
                        <option value="1">Питание</option>
                        <option value="2">Занятия</option>
                    </select>
                </div>
                <div class="error">{{ errSub }}</div>
                <div class="form-group">
                    <label for="post">Текст публикации</label>
                    <textarea class="form-control" :class="{ 'is-invalid': activeContent }" id="post" rows="6" v-model="content"></textarea>
                </div>
                <div class="error">{{ errContent }}</div>
                <div class="form-group">
                    <label for="file">Прикрепите изображение:</label>
                    <input type="file" class="form-control-file" :class="{ 'is-invalid': activeFile }" id="file" @change="selectFile">
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
                        <h5 class="modal-title" id="exampleModalLabel">Данные успешно сохранены. Пост добавлен!</h5>
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
    data() {
        return {
            title: '',
            content: '',
            subcategory: '',
            image: '',
            massage: '',
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
        savePost() {
            this.active = false
                this.activeSub = false
                this.activeContent = false
                this.activeFile = false

            let form = new FormData()
            form.append('image', this.image)
            form.append('title', this.title)
            form.append('content', this.content)
            form.append('subcategory_id', this.subcategory)
            form.append('category_id', this.$route.params.categories)
            form.append('user_id', '61')

            axios.post('/api/communities/' +  this.$route.params.categories + '/add/post', form)
                .then(r => this.success())
                .catch(e => this.error(e))

        },
        success() {
            $('#myModal').modal('toggle')
        },
        error(e) {
            this.massage = e.response.data.errors
            this.errTitle = this.massage.title[0]
            this.errSub = this.massage.subcategory_id[0]
            this.errContent = this.massage.content[0]
            this.errFile = this.massage.image[0]

            /*this.errTitle = ''
            this.errSub = ''
            this.errContent = ''
            this.errFile = ''*/
            for(let key in this.massage) {

                if(key === 'title') {
                    this.active = true
                }

                if(key === 'subcategory_id') {
                    this.activeSub = true
                }

                if(key === 'content') {
                    this.activeContent = !this.activeContent
                }

                if(key === 'file') {
                    this.activeFile = true
                }

            }
        },
        cancel () {
            this.$router.push('/communities/' +  this.$route.params.categories)
        }
    }
}
</script>

<style scoped>

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
}

</style>
