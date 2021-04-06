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
                        <div class="date meta-last">20 мая | 2020</div>
                        <div class="category"><a href="#">{{ blogPostData.subcategory.name }}</a></div>
                    </div><router-link to="/communities/pregnant/post1" class="animsition-link">
                    <h3 class="h4">{{ blogPostData.title }}</h3></router-link>
                    <p class="text-muted">{{ blogPostData.content }}</p>
                    <footer class="post-footer d-flex align-items-center">
                        <div class="avatar">
                            <img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                        </div>
                        <div class="title">{{ blogPostData.user.name }}</div>
                        <div class="comments meta-last comments-icon">12</div>
                    </footer>
                </div>
            </div>
            <div class="add-comment">
                <form @submit.prevent="saveComment">
                    <div class="form-group">
                        <label for="post">Комментарий:</label>
                        <textarea class="form-control" id="post" rows="4" v-model="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-post">Отправить</button>
                </form>
                <div v-for="comment in blogPostData.comments" :key="comment.id" class="post-details">
                    <div class="post-footer d-flex align-items-center">
                        <div class="avatar">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
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
            newComment: ''
        }
    },
    methods: {
        loadBlogPost() {
            axios.get('/api/communities/' + this.$route.params.categories+ '/' + this.$route.params.post)
                .then(r => this.blogPostData = r.data)
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
            axios.post('/api/communities/' + this.$route.params.categories + '/' + this.$route.params.post,
                {
                        text: this.text,
                        user_id: 5,
                        post_id: this.post
                    })
                .then(r => this.loadBlogPost())
                .catch(e => console.log(e))
                this.text = ''
        },
        deleteComment(id) {
            axios.delete('/api/comments/' + id)
                .then(r => this.loadBlogPost())
                .catch(e => console.log(e))
        },
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
</style>
