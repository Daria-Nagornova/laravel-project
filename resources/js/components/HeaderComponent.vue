<template>
    <div>
        <header class="header">
            <nav class="navbar navbar-toggleable-md">
                <div class="container">
                    <div class="navbar-header d-flex align-items-center justify-content-between">
                        <a href="/"><img src="img/logo.png"></a>
                        <a href="/" class="navbar-brand animsition-link">Mom and baby</a>
                        <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
                    </div>
                    <div id="navbarcollapse" class="collapse navbar-collapse align-items-center">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><router-link to="/" class="nav-link animsition-link active">Главная</router-link></li>
                            <li class="nav-item"><router-link to="/communities" class="nav-link animsition-link">Сообщества</router-link></li>
                            <li class="nav-item"><a href="#" class="nav-link animsition-link">Календари</a></li>
                            <li class="nav-item"><a href="#" class="nav-link animsition-link">Полезные материалы</a></li>
                            <li class="nav-item"><router-link to="/consultations" class="nav-link animsition-link">Консультации</router-link></li>
                            <li class="nav-item"><router-link to="/profile-user" class="nav-link animsition-link">Профиль</router-link></li>
                        </ul>
                        <ul class="langs navbar-text">
                            <a href="#" class="active">RU</a><span>           </span><a href="#">EN</a>
                        </ul>

                    </div>
                    <ul class="navbar-nav ml-auto align-items-center">
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

</style>
