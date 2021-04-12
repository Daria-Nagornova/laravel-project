<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/communities">Сообщества</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">{{ name }}</li>
            </ol>
        </nav>
        <div class="row">
            <main class="posts-listing col-lg-8">
                <div class="container">
                    <div class="row">
                        <!-- post -->
                        <div v-for="post in postData.data" :key="post.id" class="post col-xl-6">
                            <div class="post-thumbnail">
                                <router-link :to="'/communities/' + category + '/' + post.id" class="animsition-link">
                                    <img :src="$store.state.site + post.image" class="img-fluid">
                                </router-link>
                            </div>
                            <div class="post-details">
                                <div class="post-meta d-flex justify-content-between">
                                    <div class="date meta-last">{{ post.created_at }}</div>
                                    <div class="category"><a href="#">{{ post.subcategory_name }}</a></div>
                                </div>
                                <router-link :to="'/communities/' + category + '/' + post.id" class="animsition-link">
                                    <h3 class="h4">{{ post.title }}</h3>
                                </router-link>
                                <p class="text-muted">{{ post.content.slice(0, 200) + '...' }}</p>
                                <footer class="post-footer d-flex align-items-center">
                                    <div class="title">{{ post.user_name }}</div>
                                    <div v-if="count !== 0" class="comments meta-last comments-icon">{{ count }}</div>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <pagination :data="postData" @pagination-change-page="loadPost" class="paginate"></pagination>
                </div>
            </main>
            <aside class="col-lg-4">
                <div v-if="loggedIn" class="widget search">
                    <router-link :to="'/communities/' + category + '/add/post'" class="write">Написать в сообществе</router-link>
                </div>
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6 write">Самые интересные посты</h3>
                    </header>
                    <div class="blog-posts">
                        <div v-for="item in popular" :key="item.id" class="item d-flex align-items-center">
                            <div class="image"><img :src="$store.state.site + item.post.image.path" class="img-fluid"></div>
                            <router-link :to="'/communities/' + category + '/' + item.post.id">
                                <div class="title"><strong>{{ item.post.title }}</strong>
                                    <div class="d-flex align-items-center">
                                        <div class="comments comments-icon">{{ item.copies }}</div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
                <!-- Widget [Categories Widget]-->
                <div class="widget categories">
                    <header>
                        <h3 class="h6 write">Подкатегории</h3>
                    </header>
                    <div v-for="item in arr" :key="item.id" class="item d-flex justify-content-between">
                        <a href="#">{{ item.name }}</a>
                        <span>{{ item.posts.length }}</span>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</template>

<script>
export default {
name: "Blog",
    props: ['name'],
    data() {
        return {
            postData: {},
            count: 0,
            arr: '',
            comments: '',
            popular: ''
        }
    },
    methods: {
        loadPost(page = 1) {
            axios.get('/api/communities/' + this.$route.params.categories + '?page=' + page)
                .then(r => this.postData = r.data)
                .catch(e => console.log(e))
        },
        loadCount(id) {
            axios.get('/api/count/' + id)
                .then(r => this.count = r.data)
                .catch(e => console.log(e))
        },
        loadSub() {
            axios.get('/api/sub/' + this.$route.params.categories)
                .then(r => this.arr = r.data)
                .catch(e => console.log(e))
        },
        loadPopular() {
            axios.get('/api/popular/' + this.$route.params.categories)
                .then(r => this.popular = r.data)
                .catch(e => console.log(e))
        }
    },
    computed: {
        category: function() {
            return  this.$route.params.categories
        },
        loggedIn() {
            return this.$store.getters.loggedIn
        }
    },
    created() {
        this.loadPost()
        this.loadSub()
        this.loadPopular()
    }
}
</script>

<style scoped>
    .paginate {
        justify-content: center;
        display: flex;
    }
    .container {
        margin: 30px auto;
    }
    .write {
        background-color: white;
        border: none;
        border-bottom: 2px solid darkgray;
        font-size: 20px;
        color: #494f54;
    }
    .path {
        background-color: white;
        color: #494f54;
    }
    .post {
        margin: 20px 0;
    }
    .comments-icon {
        background: url(../../../storage/content/massage.png) 0 50% no-repeat;
    }
    main {
        padding-top: 0 !important;
    }
    aside {
        margin-top: 50px;
    }
</style>
