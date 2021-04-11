<template>
  <div class="container">
      <nav aria-label="breadcrumb" class="path">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary/add-notes">Добавить запись</router-link></li>
              <li class="breadcrumb-item active" aria-current="page">Прогулка</li>
          </ol>
      </nav>
      <h2 class="title">Прогулка</h2>
      <div class="row">
          <form @submit.prevent="saveWalk(childId)" class="add-post col-8">
              <div class="form-group">
                  <label for="startWalk">Начало прогулки</label>
                  <input class="form-control" type="time" v-model="start">
                  <div class="error">{{ errorStart }}</div>
                  <label for="endWalk">Конец прогулки</label>
                  <input class="form-control" type="time" v-model="end">
                  <div class="error">{{ errorEnd }}</div>
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
  name: "Walk",
  data() {
      return {
          start: '',
          end: '',
          errorStart: '',
          errorEnd: '',
      }
  },
  methods: {
        saveWalk(id) {
            axios.post('/api/walk/', {
                start: this.start,
                end: this.end,
                child_id: id
            })
                .then(r => this.cancel())
                .catch(e => console.log(e))
        },
        cancel () {
            this.$router.push('/profile-user/child-diary')
        }
    },
    computed: {
        childId() {
            return this.$route.params.id;
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
.title {
    text-align: center;
    color: #494f54;
}
</style>
