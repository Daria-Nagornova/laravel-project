<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Регистрация</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Введите имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ message }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Введите email:</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email">

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ message }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Введите пароль:</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ message }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите пароль:</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        Зарегистрироваться
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
    name: "Register",
    data() {
        return {
            message: ''
        }
    }
}
</script>

<style scoped>

</style>
