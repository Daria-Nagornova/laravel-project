<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/communities">Сообщества</router-link></li>
                <li v-for="post in postData.data" :key="post" class="breadcrumb-item active" aria-current="page">{{ post.category_name }}</li>
            </ol>
        </nav>
        <div class="row">
            <main class="posts-listing col-lg-8">
                <div class="container">
                    <div class="row">
                        <!-- post -->
                        <div v-for="post in postData.data" :key="post" class="post col-xl-6">
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
            </main>
            <aside class="col-lg-4">
                <div class="widget search">
                    <router-link :to="'/communities/' + category + '/add/post'" class="write">Написать в сообществе</router-link>
                </div>
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6 write">Самые интересные посты</h3>
                    </header>
                    <div class="blog-posts"><a href="#">
                        <div class="item d-flex align-items-center">
                            <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Какие продукты помогают повысить гемоглобин?</strong>
                                <div class="d-flex align-items-center">

                                    <div class="comments">12</div>
                                </div>
                            </div>
                        </div></a><a href="#">
                        <div class="item d-flex align-items-center">
                            <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Какие продукты помогают повысить гемоглобин?</strong>
                                <div class="d-flex align-items-center">

                                    <div class="comments">12</div>
                                </div>
                            </div>
                        </div></a><a href="#">
                        <div class="item d-flex align-items-center">
                            <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Какие продукты помогают повысить гемоглобин?</strong>
                                <div class="d-flex align-items-center">

                                    <div class="comments">12</div>
                                </div>
                            </div>
                        </div></a></div>
                </div>
                <!-- Widget [Categories Widget]-->
                <div class="widget categories">
                    <header>
                        <h3 class="h6 write">Подкатегории</h3>
                    </header>
                    <div class="item d-flex justify-content-between"><a href="#">Питание</a><span>12</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Спорт</a><span>25</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Анализы</a><span>8</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Покупки</a><span>17</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Выплаты, пособия</a><span>25</span></div>
                </div>

            </aside>
        </div>
    </div>
</template>

<script>
export default {
name: "Blog",
    data() {
        return {
            postData: {},
        }
    },
    methods: {
        loadPost(page = 1) {
            axios.get('/api/communities/' + this.$route.params.categories + '?page=' + page)
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
        this.loadPost()
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

</style>
