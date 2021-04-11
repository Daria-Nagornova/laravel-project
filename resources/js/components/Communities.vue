<template>
    <section class="featured-posts no-padding-top">
        <div class="container">
            <nav aria-label="breadcrumb" class="path">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                    <li class="breadcrumb-item active" aria-current="page"><router-link to="/communities">Сообщества</router-link></li>
                </ol>
            </nav>
            <h1>Сообщества</h1>
            <h2>Обменивайтесь знанием и опытом в тематических сообществах, общайтесь и находите новых подруг</h2>
            <div v-for="category in categoriesData.data" :key="category.id" class="row d-flex align-items-stretch community">
                <div class="image col-lg-4"><img :src="$store.state.site + category.image"></div>
                <div class="text col-lg-8">
                    <div class="text-inner d-flex align-items-center">
                        <div class="content">
                            <router-link :to="{name: 'blog', params: {categories: category.id, name: category.name}}" class="animsition-link">
                                <h2 class="h4">{{ category.name }} </h2>
                            </router-link>
                            <p>{{ category.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Communities",
    data() {
        return {
            categoriesData: {},
        }
    },
    methods: {
        loadCommunity() {
            axios.get('/api/communities')
                .then(r => this.categoriesData = r.data)
                .catch(e => console.log(e))
        }
    },
    created() {
        this.loadCommunity()
    }
}
</script>

<style scoped>
.featured-posts h1{
    border-bottom: 2px solid darkgray;
    margin: 20px auto;
    text-align: center;
}
.featured-posts h2{
    margin: 20px auto;
    text-align: center;
}
.container {
    margin: 30px auto;
}
</style>
