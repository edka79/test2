<template>
  <div>
    <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayItem' }" class="btn btn-success">К списку задач</router-link></div>
        </div>
    
    <form v-on:submit.prevent="addItem">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Название:</label>
            <input type="text" class="form-control" v-model="item.name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Описание:</label>
              <textarea rows="3" class="form-control col-md-6" v-model="item.description"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Статус:</label>
              <select class="form-control col-md-6" v-model="item.status">
                <option v-for="stat in status" v-bind:value="stat">
                  {{ stat }}
                </option>
              </select>
            </div>
          </div>
        </div>
        <br />
        <div class="form-group">
          <button class="btn btn-primary">Добавить</button>
        </div>
    </form>
  </div>
</template>
<script>
  export default {
    data(){
        return{
          item:{},
          status: [
            'Новая',
            'В работе',
            'Выполнено'
          ]
        }
    },
    methods: {
      addItem(){
        let uri = '/profile/tasks/items';
        this.axios.post(uri, this.item).then((response) => {
          this.$router.push({name: 'DisplayItem'})
        })
    }
  }
}
</script>