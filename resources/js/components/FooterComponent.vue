<template>
    <div>
        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p>&copy; 2021. Mom and baby — сайт о беременности и материнстве</p>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-details">
                            <p>Email: <a href="mailto:momandbaby@gmail.com">momandbaby@gmail.com</a></p>
                            <ul class="social-menu">
                                <li class="list-inline-item"><a href="#"><img src="img/icon1.svg"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="img/icon2.svg"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="img/icon3.svg"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="img/icon4.svg"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="menus d-flex">
                            <ul class="list-unstyled">
                                <li> <router-link to="/">Главная</router-link></li>
                                <li> <router-link to="/communities">Сообщества</router-link></li>
                                <li> <router-link to="/consultations">Консультации</router-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
export default {
name: "Footer"
}
</script>

<style scoped>

</style>
