<template>
    <div>        
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayItem' }" class="btn btn-success">К списку задач</router-link></div>
        </div>

        <form v-on:submit.prevent="updateItem">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" v-model="item.name">
            </div>

            <div class="form-group">
                <label>Описание</label>
                <textarea rows="3" class="form-control" v-model="item.description"></textarea>
            </div>

            <div class="form-group">
              <label>Статус:</label>
              <select class="form-control col-md-6" v-model="item.status">
                <option v-for="stat in status" v-bind:value="stat">
                  {{ stat }}
                </option>
              </select>              
            </div>
            
            <div class="form-group">
                <br>
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default{
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
        created: function(){
            this.getItem();
        },
        methods: {
            getItem()
            {
              let uri = `/api/profile/tasks/items/${this.$route.params.id}/edit`;
                this.axios.get(uri, this.$root.token).then((response) => {
                    this.item = response.data;
                });
            },
            updateItem()
            {
              let uri = '/api/profile/tasks/items/'+this.$route.params.id;
                this.axios.patch(uri, this.item, this.$root.token).then((response) => {
                  this.$router.push({name: 'DisplayItem'});
                });
            }
        }
    }
</script>