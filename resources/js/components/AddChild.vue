<template>
  <div class="addChild">
    <p>Введите данные ребенка</p>

    <div>
      <div class="form-group">
        <label for="name">Имя</label>
        <input class="form-control" type="text" v-model="name">
      </div>
     <div class="error">{{ errorName }}</div>
      <div class="form-group">
        <label for="dateOfBirth">Дата рождения</label>
        <input class="form-control" type="date" v-model="dateOfBirth">
      </div>
      <div class="error">{{ errorDate }}</div>
      <div class="form-group">
        <label for="gender">Пол ребенка</label>
        <select class="form-control" v-model="gender">
          <option value="женский">Женский</option>
          <option value="мужской">Мужской</option>
        </select>
      </div>
      <div class="error">{{ errorGender }}</div>
    </div>
    <div class="row">
      <div class="col">
        <button class="btn btn-primary" @click="saveChildren">Сохранить</button>
      </div>
      <div class="col">
        <button class="btn btn-primary" @click="cancel">Отменить</button>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'AddChild',
  data() {
    return {
      name: '',
      dateOfBirth: '',
      gender: '',
      childData: [],
      errorName: '',
      errorDate: '',
      errorGender: '',
    }
  },
  methods: {
      saveChildren() {
          axios.post('/api/profile-user/child-diary/add-child', {
              name: this.name,
              date_birth: this.dateOfBirth,
              gender: this.gender,
          },
          { headers: {
               'Authorization': 'Bearer ' + this.$store.state.token }
          })
              .then(r => this.cancel())
              .catch(e => console.log(e))
      },
    cancel () {
      this.$router.push('/profile-user/child-diary')
    }
  }
}
</script>

<style scoped>

</style>
