<template>
    <div>
        Тут будет пост
        <div class="post-details">
            <div class="post-meta d-flex justify-content-between">
                <div class="date meta-last">20 мая | 2020</div>
                <div class="category"><a href="#">{{ blogPostData.subcategory.name }}</a></div>
            </div><router-link to="/communities/pregnant/post1" class="animsition-link">
            <h3 class="h4">{{ blogPostData.title }}</h3></router-link>
            <p class="text-muted">{{ blogPostData.content }}</p>
            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><span>{{ blogPostData.user.name }}</span></div></a>
                <div class="comments meta-last comments-icon">12</div>
            </footer>
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
        loadBlogPost(page = 1) {
            axios.get('/api/communities/{category}?page=' + page)
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

</style>
