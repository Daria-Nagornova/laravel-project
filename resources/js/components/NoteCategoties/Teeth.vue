<template>
  <div class="container">
      <nav aria-label="breadcrumb" class="path">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
              <li class="breadcrumb-item"><router-link to="/profile-user/child-diary/add-notes">Добавить запись</router-link></li>
              <li class="breadcrumb-item active" aria-current="page">Прорезывание зубов</li>
          </ol>
      </nav>
      <h2 class="title">Прорезывание зубов</h2>
      <div>
          <div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn11" @click="name='Центральный верхний резец'"></button>
                  <button class="btn btn-primary btn-teeth btn11" @click="name='Центральный верхний резец'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn1" @click="name='Боковой верхний резец'"></button>
                  <button class="btn btn-primary btn-teeth btn1" @click="name='Боковой верхний резец'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn2" @click="name='Верхний клык'"></button>
                  <button class="btn btn-primary btn-teeth btn2" @click="name='Верхний клык'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn3" @click="name='Верхний первый моляр'"></button>
                  <button class="btn btn-primary btn-teeth btn3" @click="name='Верхний первый моляр'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn4" @click="name='Верхний второй моляр'"></button>
                  <button class="btn btn-primary btn-teeth btn4" @click="name='Верхний второй моляр'"></button>
              </div>
          </div>
          <div class="teeth-2">
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn16" @click="name='Нижний второй моляр'"></button>
                  <button class="btn btn-primary btn-teeth btn16" @click="name='Нижний второй моляр'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn12" @click="name='Нижний первый моляр'"></button>
                  <button class="btn btn-primary btn-teeth btn12" @click="name='Нижний первый моляр'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn13" @click="name='Нижний клык'"></button>
                  <button class="btn btn-primary btn-teeth btn13" @click="name='Нижний клык'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn14" @click="name='Боковой нижний резец'"></button>
                  <button class="btn btn-primary btn-teeth btn14" @click="name='Боковой нижний резец'"></button>
              </div>
              <div class="box">
                  <button class="btn btn-primary btn-teeth btn15" @click="name='Центральный нижний резец'"></button>
                  <button class="btn btn-primary btn-teeth btn15" @click="name='Центральный нижний резец'"></button>
              </div>
          </div>
          <div class="error">{{ errorTeeth }}</div>
          <form @submit.prevent="saveTeeth(childId)" class="add-post col-8">
              <div class="form-group">
                  <label class="elem-margin">{{ name }} прорезался:</label>
                  <input class="form-control elem-margin" type="date" v-model="date">
              </div>
              <div class="error">{{ errorDate }}</div>
              <div class="form-group">
                  <button type="submit" class="btn btn-outline-secondary elem-margin">Сохранить</button>
                  <button class="btn btn-outline-secondary elem-margin" @click="cancel">Отменить</button>
              </div>
          </form>
      </div>
  </div>
</template>

<script>
export default {
  name: "Teeth",
  data() {
    return {
      date: '',
      name: '',
      errorDate: '',
      errorTeeth: ''
    }
  },
  methods: {
      saveTeeth(id) {
          axios.post('/api/teeth', {
              name: this.name,
              date: this.date,
              child_id: id,
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
.box {
    display: flex;
    justify-content: center;
}
.box button {
    border-radius: 2px !important;
    border: none;
}
.teeth-2 {
    margin-top: 20px;
}
.btn-teeth {
  width: 15px;
  height: 15px;
}
.btn11 {
  margin: 0 2px 0 2px;
  background: blueviolet;
}
.btn1 {
  margin: 2px 25px 0 25px;
  background: fuchsia;
}
.btn2 {
  margin: 4px 35px 0 35px;
  background: gold;
}
.btn3 {
  margin: 6px 50px 0 50px;
  background: lightsalmon;
}
.btn4 {
  margin: 8px 60px 0 60px;
  background: crimson;
}

.btn16 {
  margin: 0 60px 0 60px;
  background: crimson;
}
.btn12 {
  margin: 8px 50px 0 50px;
  background: lightsalmon;
}
.btn13 {
  margin: 6px 35px 0 35px;
  background: gold;
}
.btn14 {
  margin: 4px 25px 0 25px;
  background: fuchsia;
}
.btn15 {
  margin: 2px 2px 0 2px;
  background: blueviolet;
}
.elem-margin {
  margin: 10px;
}
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
