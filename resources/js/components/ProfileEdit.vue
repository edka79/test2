<template>
    <div>       
        

        <form v-on:submit.prevent="updateFields">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>Поле</td>
                    <td>Значение</td>
                </tr>
                </thead>

                <tbody>
                    <tr v-for="(item, index) in items[0]">
                        <td>{{ helpers[index] }}</td>
                        <td> <input class="form-control" v-model="items[0][index]"> </td>
                    </tr>
                </tbody>
            </table>
            <br />
            
            <div class="form_errors">
                <div v-for="item in errors"> {{ item[0] }} </div>
            </div>

            <div v-if="success != ''" class="alert alert-success">
               {{success}}
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>    
    </div>
</template>

<script>
    export default {
        data(){
            return{
                helpers: {
                    name: 'Логин *',
                    email: 'Email *', 
                    fullname: 'ФИО',
                    phone: 'Телефон *',                    
                    rank: 'Должность', 
                    telegram: 'Telegram',
                    whatsapp: 'Whatsapp', 
                    status: 'Статус'
                },
                items: [],
                success: '',
                errors: []
            }
        },
        created: function()
        {
            this.fetchItems();
        },
        methods: {
            fetchItems()
            {
              let uri = '/api/profile/edit/fields';
              this.axios.get(uri, this.$root.token).then((response) => {
                  this.items = response.data;
              });
            },
            updateFields()
            {
                this.errors = [];
                let uri = '/api/profile/update/fields';                
                this.axios.patch(uri, this.items[0], this.$root.token).then((response) => {                    
                   this.$router.push({name: 'ProfileEdit'});
                   this.success = 'Профиль обновлен!';
                }).catch(error => {
                    if (error.response) {
                        for(let i in error.response.data.errors){
                            this.errors.push(error.response.data.errors[i]);
                            this.success = '';
                        }

                    }
                });
            }
        }
    }
</script>