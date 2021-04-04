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
      <div class="box">
          <div>
              <button class="btn btn-primary btn-teeth btn11" @click="name='Центральный верхний резец'"></button>
              <button class="btn btn-primary btn-teeth btn11" @click="name='Центральный верхний резец'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn1" @click="name='Боковой верхний резец'"></button>
              <button class="btn btn-primary btn-teeth btn1" @click="name='Боковой верхний резец'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn2" @click="name='Верхний клык'"></button>
              <button class="btn btn-primary btn-teeth btn2" @click="name='Верхний клык'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn3" @click="name='Верхний первый моляр'"></button>
              <button class="btn btn-primary btn-teeth btn3" @click="name='Верхний первый моляр'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn4" @click="name='Верхний второй моляр'"></button>
              <button class="btn btn-primary btn-teeth btn4" @click="name='Верхний второй моляр'"></button>
          </div>

          <div>
              <button class="btn btn-primary btn-teeth btn16" @click="name='Нижний второй моляр'"></button>
              <button class="btn btn-primary btn-teeth btn16" @click="name='Нижний второй моляр'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn12" @click="name='Нижний первый моляр'"></button>
              <button class="btn btn-primary btn-teeth btn12" @click="name='Нижний первый моляр'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn13" @click="name='Нижний клык'"></button>
              <button class="btn btn-primary btn-teeth btn13" @click="name='Нижний клык'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn14" @click="name='Боковой нижний резец'"></button>
              <button class="btn btn-primary btn-teeth btn14" @click="name='Боковой нижний резец'"></button>
          </div>
          <div>
              <button class="btn btn-primary btn-teeth btn15" @click="name='Центральный нижний резец'"></button>
              <button class="btn btn-primary btn-teeth btn15" @click="name='Центральный нижний резец'"></button>
          </div>
          <div class="error">{{ errorTeeth }}</div>
          <form @submit.prevent="saveTeeth" class="add-post col-8">
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
    saveTeeth () {

        this.cancel()

    },
    cancel () {
      this.$router.push('/profile-user/child-diary/add-notes')
    }
  }
}
</script>

<style scoped>
.box {
 /*   position: relative;*/
}
.btn-teeth {
   /*position: absolute;*/
  width: 15px;
  height: 15px;
}
.btn11 {
  margin: 0 2px 0 2px;
  background: blueviolet;
}
.btn1 {
  margin: -10px 25px 0 25px;
  background: fuchsia;
}
.btn2 {
  margin: -20px 35px 0 35px;
  background: gold;
}
.btn3 {
  margin: -30px 45px 0 45px;
  background: lightsalmon;
}
.btn4 {
  margin: -40px 55px 0 55px;
  background: crimson;
}

.btn16 {
  margin: 0 55px 0 55px;
  background: crimson;
}
.btn12 {
  margin: -10px 45px 0 45px;
  background: lightsalmon;
}
.btn13 {
  margin: -20px 35px 0 35px;
  background: gold;
}
.btn14 {
  margin: -30px 25px 0 25px;
  background: fuchsia;
}
.btn15 {
  margin: -40px 2px 0 2px;
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
