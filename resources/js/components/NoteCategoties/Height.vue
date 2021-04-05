<template>
  <div class="container">
      <nav aria-label="breadcrumb" class="path">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary/add-notes">Добавить запись</router-link></li>
              <li class="breadcrumb-item active" aria-current="page">Рост и вес</li>
          </ol>
      </nav>
      <h2 class="title">Рост и вес</h2>
      <div class="row">
          <form @submit.prevent="saveHeight" class="add-post col-8">
              <div class="form-group">
                  <label for="childHeight">Рост ребенка, см</label>
                  <input class="form-control" type="text" v-model="height">
                  <div class="error">{{ errorHeight }}</div>
              </div>
              <div class="form-group">
                  <label for="childWeight">Вес ребенка, кг</label>
                  <input class="form-control" type="text" v-model="weight">
                  <div class="error">{{ errorWeight }}</div>
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
  name: "Height",
  data(){
    return {
      height: '',
      weight: '',
      errorWeight: '',
      errorHeight: ''
    }
  },
  methods: {
      saveHeight() {
          axios.post('/api/profile-user/child-diary/add-notes/height', {
              height: this.height,
              weight: this.weight,
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
