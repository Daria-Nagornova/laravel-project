<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Авторизация</div>
                    <div class="card-body">
                        <form @submit.prevent="authUser">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Введите email:</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus v-model="email">
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ message }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Введите пароль:</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" v-model="password">
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ message }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="error">
                                <span>{{ error }}</span>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        Войти
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "Login",
    data() {
        return {
            message: '',
            password: '',
            email: '',
            error: ''
        }
    },
    methods: {
        authUser() {
            this.$store.dispatch('retrieveToken', {
                email: this.email,
                password: this.password,
            })
                .then(r => this.cancel())
                .catch((error) => {
                    this.error = 'Не верные данные'
                })
        },
        cancel () {
            this.$router.push('/')
        }
    }
}
</script>

<style scoped>
.error {
    color: red;
    margin-bottom: 10px;
    text-align: center;
}
</style>
