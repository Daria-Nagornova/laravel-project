<template>
    <div class="container">
        <div class="row">
            <div v-for="post in postData.data" :key="post" class="post col-xl-6">
                <div class="post-thumbnail">
                    <router-link :to="'/communities/' + category + '/' + post.id" class="animsition-link">
                        <img src="img/blog-post-1.jpeg" class="img-fluid">
                    </router-link>
                </div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date meta-last">{{ post.created_at }}</div>
                        <div class="category"><a href="#">{{ post.subcategory_name }}</a></div>
                    </div><router-link :to="'/communities/' + category + '/' + post.id" class="animsition-link">
                    <h3 class="h4">{{ post.title }}</h3></router-link>
                    <p class="text-muted">{{ post.content }}</p>
                    <footer class="post-footer d-flex align-items-center">
                        <div class="avatar"><img src="img/avatar-3.jpg" class="img-fluid"></div>
                        <div class="title">{{ post.user_name }}</div>
                        <div class="comments meta-last comments-icon">12</div>
                    </footer>
                </div>
            </div>
            <pagination :data="postData" @pagination-change-page="loadPost" class="paginate"></pagination>
        </div>
    </div>
</template>

<script>
export default {
name: "UserPost",
    data() {
        return {
            postData: {},
        }
    },
    methods: {
        loadUserPost(page = 1) {
            axios.get('/api/profile-user/user-posts?page=' + page)
                .then(r => this.postData = r.data)
                .catch(e => console.log(e))
        }
    },
    computed: {
        category: function() {
            return  this.$route.params.categories;
        }
    },
    created() {
        this.loadUserPost()
    }
}
</script>

<style scoped>
.paginate {
    margin: 20px auto;
    background-color: #c6e0f5;
}
.container {
    margin: 30px auto;
}
.post {
    margin: 20px 0;
}

</style>
