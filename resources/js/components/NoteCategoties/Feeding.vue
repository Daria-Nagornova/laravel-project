<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user/child-diary/add-notes">Добавить запись</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Кормление</li>
            </ol>
        </nav>
        <h2 class="title">Кормление</h2>
        <div class="row">
            <form @submit.prevent="saveFeeding" class="add-post col-8">
                <div class="form-group">
                    <label for="timeFeeding">Время приема пищи</label>
                    <input class="form-control" type="time" v-model="time">
                </div>
                <div class="form-group">
                    <div class="error">{{ errorTime }}</div>
                    <label for="productsFeeding">Продукты</label>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" v-model="product">
                    <div class="error">{{ errorProducts }}</div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-secondary">Сохранить</button>
                    <button class="btn btn-outline-secondary" @click="cancel">Отменить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

export default {
  name: "Feeding",
  data() {
    return {
      time: '',
      product: '',
      errorTime: '',
      errorProducts: ''
    }
  },
  methods: {
    saveFeeding () {

        this.cancel()

    },
    cancel () {
      this.$router.push('/profile-user/child-diary/add-notes')
    }
  }
}
</script>

<style scoped>
.add-post {
    margin: 40px auto;
    font-family: "Nunito", sans-serif;
    font-size: 1rem;
    font-weight: 400;
    color: #494f54;
}
h2 {
    text-align: center;
    color: #494f54;
}
</style>
