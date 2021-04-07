<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/communities">Сообщества</router-link></li>
                <li class="breadcrumb-item"><router-link :to="'/communities/' + blogPostData.category.id">{{ blogPostData.category.name }}</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Пост</li>
            </ol>
        </nav>
        <div class="row">
            <div class="post blogpost">
                <div class="form-group btn-box">
                    <router-link :to="'/communities/' + category + '/' + post + '/update'" class="btn btn-outline-secondary btn-blogpost">Редактировать</router-link>
                    <button class="btn btn-outline-secondary btn-blogpost" @click="deletePost">Удалить</button>
                </div>
                <div class="post-thumbnail">
                    <img :src="$store.state.site + blogPostData.image.path" class="img-fluid">
                </div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date meta-last"> {{ blogPostData.created_at.slice(0, 10) }}</div>
                        <div class="category"><a href="#">{{ blogPostData.subcategory.name }}</a></div>
                    </div><router-link to="/communities/pregnant/post1" class="animsition-link">
                    <h3 class="h4">{{ blogPostData.title }}</h3></router-link>
                    <p class="text-muted">{{ blogPostData.content }}</p>
                    <footer class="post-footer d-flex align-items-center">
                        <div class="title">{{ blogPostData.user.name }}</div>
                        <div v-if="count !== 0" class="comments meta-last comments-icon">{{ count }}</div>
                    </footer>
                </div>
            </div>
            <div class="add-comment">
                <form @submit.prevent="saveComment">
                    <div class="form-group">
                        <label for="post">Комментарий:</label>
                        <textarea class="form-control" :class="{ 'is-invalid': active }" id="post" rows="4" v-model="text"></textarea>
                    </div>
                    <div class="error">{{ errText }}</div>
                    <button type="submit" class="btn btn-outline-secondary btn-post">Отправить</button>
                </form>
                <div v-for="comment in blogPostData.comments" :key="comment.id" class="post-details">
                    <div class="post-footer d-flex align-items-center">
                        <div class="title">{{ comment.user.name }}</div>
                    </div>
                    <button type="button" class="ml-2 mb-1 close" aria-label="Close" @click="deleteComment(comment.id)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="text-muted">{{ comment.text }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogPost",
    data() {
        return {
            blogPostData: {},
            text: '',
            newComment: '',
            active: false,
            arrText: '',
            massage: '',
            count: 0
        }
    },
    methods: {
        loadBlogPost() {
            axios.get('/api/communities/' + this.$route.params.categories+ '/' + this.$route.params.post)
                .then(r => this.blogPostData = r.data)
                .catch(e => console.log(e))
            axios.get('/api/count/' + this.$route.params.post)
                .then(r => this.count = r.data)
                .catch(e => console.log(e))
        },
        deletePost() {
            axios.delete('/api/communities/' + this.$route.params.categories+ '/' + this.$route.params.post)
                .then(r => this.blogPostData = r.data)
                .catch(e => console.log(e))
            this.cancel()
        },
        cancel () {
            this.$router.push('/communities/' +  this.$route.params.categories)
        },
        saveComment() {
            this.active = false
            this.errText = ''

            axios.post('/api/communities/' + this.$route.params.categories + '/' + this.$route.params.post,
                {
                        text: this.text,
                        user_id: 5,
                        post_id: this.post
                    })
                .then(r => this.loadBlogPost())
                .catch(e => this.error(e))
                this.text = ''
        },
        deleteComment(id) {
            axios.delete('/api/comments/' + id)
                .then(r => this.loadBlogPost())
                .catch(e => console.log(e))
        },
        error(e) {
            this.massage = e.response.data.errors

            for (let key in this.massage) {

                if (key === 'text') {
                    this.active = true
                    this.errText = this.massage[key][0]
                }

            }
        }
    },
    computed: {
        category: function() {
            return  this.$route.params.categories;
        },
        post: function() {
            return this.$route.params.post;
        }
    },
    mounted() {
        this.loadBlogPost()
    }
}
</script>

<style scoped>
.container {
    background-color: #e9ecef;
    font-family: "Nunito", sans-serif;
    color: #494f54;
    border-radius: 15px;
}
.comments-icon {
    background: url(../../../storage/content/massage.png) 0 50% no-repeat;
}
.blogpost, .add-comment {
    margin: 20px auto;
    width: 70%;
    background-color: white;
    padding: 20px;
    border-radius: 15px;
}
.post-details {
    margin: 20px auto;
}
.btn-box {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
}
.btn-blogpost {
    border: none;
    border-bottom: 2px solid gray;
    margin: 0 20px;
}
.post-thumbnail img {
    display: block;
    margin: 0 auto;
}
.error {
    color: red;
    margin-bottom: 10px;
}
</style>
