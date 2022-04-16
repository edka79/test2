<template>
    <div>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateItem' }" class="btn btn-primary">Добавить задачу</router-link>
          </div>
        </div><br />

        <div class="row">
            <div class="col-md-12">
                <div сlass="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Название</td>
                            <td>Описание</td>
                            <td>Статус</td>
                            <td>Пользователь</td>
                            <td>Действия</td>
                        </tr>
                        </thead>

                        <tbody>
                            <tr v-for="item in items">
                                <td>{{ item.id }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.description }}</td>
                                <td>{{ item.status }}</td>
                                <td>{{ item.user_id }}</td>
                                <td><router-link :to="{name: 'EditItem', params: { id: item.id }}" class="btn btn-primary">Редактировать</router-link></td>
                                <td><button class="btn btn-danger" v-on:click="deleteItem(item.id)">Удалить</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>    
    </div>
</template>

<script>
    export default {
        data(){
            return{                
                items: []
            }
        },        
        created: function()
        {
            this.fetchItems();
        },
        methods: {
            fetchItems()
            {
              let uri = '/api/profile/tasks/items';
              this.axios.get(uri, this.$root.token).then((response) => {
                  this.items = response.data;
              });
            },
            deleteItem(id)
            {
              let uri = `/api/profile/tasks/items/${id}`;              
              this.items.map( (item, i) => {
                  if (item.id == id) this.items.splice(i, 1);
              });
              this.axios.delete(uri, this.$root.token);
            }
        }
    }
</script>