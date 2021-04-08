<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Опубликованные посты</li>
            </ol>
        </nav>
        <div class="row">
            <div v-for="post in postData.posts" :key="post" class="post col-xl-6">
                <div class="post-thumbnail">
                    <router-link :to="'/communities/' + category + '/' + post.id" class="animsition-link">
                        <img :src="$store.state.site + post.image.path" class="img-fluid">
                    </router-link>
                </div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date meta-last">{{ post.created_at.slice(0, 10) }}</div>
                    </div><router-link :to="'/communities/' + post.category_id + '/' + post.id" class="animsition-link">
                    <h3 class="h4">{{ post.title }}</h3></router-link>
                    <p class="text-muted">{{ post.content }}</p>
                    <footer class="post-footer d-flex align-items-center">
                        <div class="title">{{ postData.name }}</div>
                    </footer>
                </div>
            </div>
            <pagination :data="postData" @pagination-change-page="loadUserPost" class="paginate"></pagination>
        </div>
    </div>
</template>

<script>
export default {
name: "UserPost",
    data() {
        return {
            postData: {},
            form: {}
        }
    },
    methods: {
        loadUserPost(page = 1) {
            axios.get('/api/profile-user/user-posts?page=' + page, { headers: {
                'Authorization': 'Bearer ' + this.$store.state.token }
            })
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
