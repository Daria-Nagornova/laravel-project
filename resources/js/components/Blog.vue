<template>
    <div class="container">
        <div class="row">
            <!-- Latest Posts -->
            <main class="posts-listing col-lg-8">
                <div class="container">
                    <div class="row">
                        <!-- post -->
                        <div v-for="post in postData.data" :key="post" class="post col-xl-6">
                            <div class="post-thumbnail"><router-link to="/communities/pregnant/1" class="animsition-link"><img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"></router-link></div>
                            <div class="post-details">
                                <div class="post-meta d-flex justify-content-between">
                                    <div class="date meta-last">{{ post.created_at }}</div>
                                    <div class="category"><a href="#">{{ post.subcategory_name }}</a></div>
                                </div><router-link :to="'/communities/' + category + '/' + post.id" class="animsition-link">
                                <h3 class="h4">{{ post.title }}</h3></router-link>
                                <p class="text-muted">{{ post.content }}</p>
                                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>{{ post.user_name }}</span></div></a>
                                    <div class="comments meta-last comments-icon">12</div>
                                </footer>
                            </div>
                        </div>
                        <pagination :data="postData" @pagination-change-page="loadPost"></pagination>
                    </div>

                </div>
            </main>
            <aside class="col-lg-4">
                <!-- Widget [Search Bar Widget]-->
                <div class="widget search">
                    <header>
                        <h3 class="h6">Поиск в сообществе</h3>
                    </header>
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <input type="search" placeholder="Что вы ищете?">
                            <button type="submit" class="submit search-icon"></button>
                        </div>
                    </form>
                </div>
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6">Самые интересные посты</h3>
                    </header>
                    <div class="blog-posts"><a href="#">
                        <div class="item d-flex align-items-center">
                            <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Какие продукты помогают повысить гемоглобин?</strong>
                                <div class="d-flex align-items-center">
                                    <div class="views">500</div>
                                    <div class="comments">12</div>
                                </div>
                            </div>
                        </div></a><a href="#">
                        <div class="item d-flex align-items-center">
                            <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Какие продукты помогают повысить гемоглобин?</strong>
                                <div class="d-flex align-items-center">
                                    <div class="views">500</div>
                                    <div class="comments">12</div>
                                </div>
                            </div>
                        </div></a><a href="#">
                        <div class="item d-flex align-items-center">
                            <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>Какие продукты помогают повысить гемоглобин?</strong>
                                <div class="d-flex align-items-center">
                                    <div class="views">500</div>
                                    <div class="comments">12</div>
                                </div>
                            </div>
                        </div></a></div>
                </div>
                <!-- Widget [Categories Widget]-->
                <div class="widget categories">
                    <header>
                        <h3 class="h6">Подкатегории</h3>
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
    mounted() {
        this.loadPost()
    }
}
</script>

<style scoped>

</style>
