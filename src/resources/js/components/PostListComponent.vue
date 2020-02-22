<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="inputtodo" v-model="post_form"/>
                    <button type="button" class="btn btn-primary" @click="addPost">Add</button>
                </div>
                <div class="card" v-for="post in posts" :key="post.id">
                    <div class="card-header">
                        <!-- <div>
                            <img v-if="account.image_path != null" :src="'/storage/account_images/' + account.id + '/' + account.id + '.jpg'" width="100px" height="100px"/>
                            <img v-else src="/storage/account_images/init/init.jpg" width="100px" height="100px"/>
                        </div> -->
                        <div class="post_info">
                            <p style="white-space: pre">{{post.body}}</p>
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
        name: "PostListComponet",
        props: {
            accountId: "",
            authId: "",
        },
        data() {
            return {
                posts: [],
                post_form: "",
                // imagePath: "/storage/account_images/" + accountId + "/"  + accountId + ".jpg",
            }
        },
        methods: {
            addPost() {
                let data = {
                    body:this.post_form,
                    accountId:this.accountId,
                    authId:this.authId,
                    }
                this.post_form = ""
                data._token = document.getElementsByName('csrf-token')[0].content;
                axios.post("/api/post/", data).then((result)=>{
                    console.log(result);
                    this.getPostList()
                })
            },
            getPostList() {
                let data = {
                    params: {
                        accountId: this.accountId,
                    },
                }
                data._token = document.getElementsByName('csrf-token')[0].content;
                axios.get("/api/post", data).then((result) => {
                    console.log(result);
                    this.posts = result.data
                })
            },
        },
        mounted() {
            console.log("accountId : " + this.accountId)
            // console.log('Component mounted.')
            this.getPostList()
        }
    }
</script>
