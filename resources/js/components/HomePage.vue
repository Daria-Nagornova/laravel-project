<template>
    <div>
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h1>Самый полезный сайт для мам и малышей</h1><a href="#intro" class="hero-link">Читать больше</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Intro Section-->
        <section id="intro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="h3">Добро пожаловать на сайт Mom and Baby</h2>
                        <p class="text-big">Наш сайт предназначет для мам малышей и тех, кто находится в ожидании.
                            Здесь вы найдете <span>единомышленников</span>, получите множество <span>полезной информации</span> и возможность <span>проконсультироваться</span>
                            с врачами различной специализации.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-posts no-padding-top">
            <div class="container">
                <!-- Post-->
                <div class="row d-flex align-items-stretch">
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <router-link to="/communities" class="animsition-link"><h2 class="h4">Сообщества</h2></router-link>
                                </header>
                                <div>Каждый этап беременности и развития ребенка имеет свои особенности. Сообщества предназанчены для общения по интересам, обмена полезной информацией, поиска подруг. Делитесь своим опытом, рассказывайте истории и задавайте вопросы.</div>
                            </div>
                        </div>
                    </div>
                    <div class="image col-lg-5"><img src="img/38.jpg"></div>
                </div>
                <div class="row d-flex align-items-stretch">
                    <div class="image col-lg-5 img-fluid"><img src="img/49.jpg"></div>
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <router-link to="/communities/consultations" class="animsition-link"><h2 class="h4">Консультации</h2></router-link>
                                </header>
                                <div> Предлагаем получить бесплатную онлайн-консультацию педиатра, невролога, психолога. Оставить свой вопрос вы можете в любое время, и наши специалисты на него обязательно ответят. Мы не разглашаем личные данные наших читателей и гарантируем полную анонимность и конфиденциальность.></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-stretch">
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <router-link to="/registration" class="animsition-link"><h2>Дневник ребенка</h2></router-link>
                                </header>
                                <div>Зарегистрируйтесь на сайте и получите доступ к закрытому разделу - Дневник ребенка. Вы сможете ежедевно делать заметки о прогулках, сне, кормлении, отмечать рост и вес вашего малыша, а также даты прорезывания зубов. Наш дневник поможет наладить режим дня малыша, проследив комфортное для него время сна и приемов пищи.</div>
                            </div>
                        </div>
                    </div>
                    <div class="image col-lg-5"><img src="img/48.jpg"></div>
                </div>
            </div>
        </section>
        <!-- Latest Posts -->
        <section class="latest-posts no-padding-top">
            <div class="container">
                <header>
                    <h2>Последние посты блога</h2>
                </header>
                <div class="row">
                    <div v-for="post in postData.data" :key="post.id" class="post col-md-4">
                        <div class="post-thumbnail">
                            <router-link :to="'/communities/' + post.category_id + '/' + post.id" class="animsition-link">
                                <img :src="$store.state.site + post.image.path" class="img-fluid">
                            </router-link>
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">{{ post.created_at }}</div>
                                <div class="category">{{ post.subcategory_name }}</div>
                            </div>
                            <router-link :to="'/communities/' + post.category_id + '/' + post.id" class="animsition-link">
                                <h3 class="h4">{{ post.title }}</h3>
                            </router-link>
                            <p class="text-muted">{{ post.content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
name: "HomePage",
    data() {
        return {
            postData: {},
        }
    },
    methods: {
        loadLastPost(page = 1) {
            axios.get('/api/')
                .then(r => this.postData = r.data)
                .catch(e => console.log(e))
        }
    },
    mounted() {
        this.loadLastPost()
    }
}
</script>

<style scoped>
.text-big span {
    font-weight: bold;
}
section {
   padding: 30px 0 !important;
}
.category {
    color: #796AEE;
    font-weight: 700;
    text-transform: uppercase;
}
h2 {
    font-size: 1.35rem;
    font-weight: 600;
}
</style>
