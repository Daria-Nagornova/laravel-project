<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user/child-diary/add-notes">Добавить запись</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Прививки</li>
            </ol>
        </nav>
        <h2 class="title">Прививки</h2>
        <div class="row">
            <form @submit.prevent="saveVaccination" class="add-post col-8">
                <div class="form-group">
                    <label for="timeFeeding">Название вакцины</label>
                    <input class="form-control" type="text" v-model="name">
                    <div class="error">{{ errorName }}</div>
                    <label for="productsFeeding">Комментарий(как перенес ребенок)</label>
                    <input class="form-control" type="text" v-model="comment">
                    <div class="error">{{ errorComment }}</div>
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
  name: "Vaccination",
  data() {
    return {
      comment: '',
      name: '',
      errorComment: '',
      errorName: '',
      path: 'vaccination'
    }
  },
  methods: {
      saveVaccination() {
          axios.post('/api/profile-user/child-diary/add-notes/vaccination', {
              name: this.name,
              comment: this.comment,
              child_id: 3,
          })
              .then(r => console.log(r))
              .catch(e => console.log(e))
          this.cancel()
      },
      cancel () {
          this.$router.push('/profile-user/child-diary')
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
