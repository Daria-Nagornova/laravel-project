<template>
    <div>
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <div class="navbar-header d-flex align-items-center justify-content-between">
                        <a href="/"><img src="img/logo.png"></a>
                        <a href="/" class="navbar-brand animsition-link">Mom and baby</a>
                    </div>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto justify-content-between main-menu">
                                <li class="nav-item active">
                                    <router-link to="/" class="nav-link animsition-link">Главная</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/communities" class="nav-link animsition-link">Сообщества</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/consultations" class="nav-link animsition-link">Консультации</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/profile-user" class="nav-link animsition-link">Профиль</router-link>
                                </li>
                            </ul>
                        </div>
                    <ul class="navbar-nav ml-auto align-items-center main-menu">
                        <li class="nav-item"><a href="/login" class="nav-link animsition-link">Вход</a></li>
                        <li class="nav-item"><a href="/register" class="nav-link animsition-link">Регистрация</a></li>
                    </ul>
                </div>
            </nav>

        </header>
    </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>
.main-menu {
    font-family: "Nunito", sans-serif;
    margin: 0 auto;
}
router-link.nav-link:active {
    color: #796AEE;
}
</style>
