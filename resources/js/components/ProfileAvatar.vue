<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <img v-bind:src="userinfo.avatar" alt="Avatar" class="avatar_big">    

                <div v-if="success != ''" class="alert alert-success">
                    {{success}}
                </div>
                <form @submit="formSubmit" enctype="multipart/form-data">
                    <input type="file" class="form-control" v-on:change="onChange">
                    <br>
                    <button class="btn btn-primary btn-block">Загрузить</button>
                </form>
                
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                name: '',
                file: '',
                success: '',
                userinfo: {
                    name: '',
                    fullname: '',
                    avatar: '/img/noavatar.png'
                }
            };
        },        
        created: function(){
            this.getUserInfo();
        },
        methods: {
            getUserInfo()
            {
              let uri = `/api/profile/userinfo`;
                this.axios.get(uri, this.$root.token).then((response) => {
                    this.userinfo = response.data[0];
                });
            },
            onChange(e) {
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'Authorization': 'Bearer ' + window.Laravel.api_token,
                    }
                }
                let data = new FormData();
                data.append('file', this.file);
                this.axios.post('/api/upload', data, config)
                    .then(function (res) {
                        existingObj.success = 'Аватар обновлен!';
                        document.querySelector('.avatar').setAttribute("src", res.data.success); 
                        document.querySelector('.avatar_big').setAttribute("src", res.data.success); 
                        this.getUserInfo();                       
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }
</script>