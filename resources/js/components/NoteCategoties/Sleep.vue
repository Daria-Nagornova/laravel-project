<template>
  <div class="container">
      <nav aria-label="breadcrumb" class="path">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary/add-notes">Добавить запись</router-link></li>
              <li class="breadcrumb-item active" aria-current="page">Сон</li>
          </ol>
      </nav>
      <h2 class="title">Сон</h2>
      <div class="row">
          <form @submit.prevent="saveSleep" class="add-post col-8">
              <div class="form-group">
                  <label for="startSleep">Начало сна</label>
                  <input class="form-control" type="time" v-model="start">
                  <div class="error">{{ errorStart }}</div>
              </div>
              <div class="form-group">
                  <label for="endSleep">Конец сна</label>
                  <input class="form-control" type="time" v-model="end">
                  <div class="error">{{ errorEnd }}</div>
              </div>
              <div class="form-group">
                  <label for="commentSleep">Комментарий</label>
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
  name: "Sleep",
  data () {
    return {
      start: '',
      end: '',
      comment: '',
      errorStart: '',
      errorEnd: '',
      errorComment: ''
    }
  },
  methods: {
      saveSleep() {
          axios.post('/api/profile-user/child-diary/add-notes/sleep', {
              start: this.start,
              end: this.end,
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
