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
                <div class="post-thumbnail"><img src="img/blog-post-1.jpeg" class="img-fluid"></div>
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
                <form>
                    <div class="form-group">
                        <label for="post">Комментарий:</label>
                        <textarea class="form-control" id="post" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-post">Отправить</button>
                </form>
                <div v-for="comment in blogPostData.comments" :key="comment" class="post-details">
                    <div class="post-footer d-flex align-items-center">
                        <div class="avatar">
                            <img src="img/avatar-3.jpg" class="img-fluid">
                        </div>
                        <div class="title">{{ comment.user_id }}</div>
                    </div>
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
        }
    },
    methods: {
        loadBlogPost() {
            axios.get('/api/communities/' + this.$route.params.categories+ '/' + this.$route.params.post)
                .then(r => this.blogPostData = r.data)
                .catch(e => console.log(e))
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


</style>
