<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="inputtodo" v-model="account_form">
                        <button type="button" class="btn btn-primary" @click="addAccount">Add</button>
                    </div> -->
                </div>
                <div class="card" v-for="account in accounts" :key="account.id">
                    <div class="card-header" style="display: flex;">
                        <a class="card-link" :href="'/accountpreview/' + account.id" />
                        <div>
                            <img v-if="account.image_path != null" :src="'/storage/account_images/' + account.id + '/' + account.id + '.jpg'" width="100px" height="100px"/>
                            <img v-else src="/storage/account_images/init/init.jpg" width="100px" height="100px"/>
                        </div>
                        <div>
                            <ul class="account_text">
                                <li class="sns_name" style="display: flex">
                                    <label>sns :</label>
                                    <p>{{account.sns.sns_name}}</p>
                                </li>
                                <li class="account_name">
                                    <label>name :</label>
                                    <p>{{account.account_name}}</p>
                                </li>
                                <li class="url">
                                    <label>comment :</label>
                                    <p>{{account.comment}}</p>
                                </li>
                            </ul>
                        </div>
                        <!-- <button type="button" class="btn btn-danger" @click="deleteTodo(todo.id)">Delete</button>
                        <button type="button" class="btn btn-info" @click="updateTodo(todo.id)">Update</button> -->
                        <!-- <input type="text" class="form-control" id="account_name" v-model="account.account_name"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AccountListComponet",
        data() {
            return {
                accounts: [],
                // imagePath: "/storage/account_images/" + accountId + "/"  + accountId + ".jpg",
            }
        },
        methods: {
            getAccountList() {
                let data = {}
                data._token = document.getElementsByName('csrf-token')[0].content;
                axios.get("/api/account", data).then((result) => {
                    console.log(result);
                    this.accounts = result.data
                })
            },
        },
        mounted() {
            // console.log('Component mounted.')
            this.getAccountList()
        }
    }
</script>
