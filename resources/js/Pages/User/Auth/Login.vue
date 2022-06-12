<template>
    <UserMaster>
        <div class="card border-0 shadow-sm shadow-lg--hover">
            <div class="card-body">
                <h4 class="font-weight-bold text-uppercase text-center">Log In</h4>
                <p class="text-center">Welcome to MM-SHOP!</p>
                <hr>
                <form @submit.prevent="login">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="errors.error">
                        {{errors.error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" v-model="email" class="form-control bg-secondary text-primary border-top-0 border-left-0 border-right-0" id="email"
                               :class="{'border-danger' : errors.email}">
                        <small class="text-danger font-weight-bolder" v-show="errors.email">{{"*" + errors.email}}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" v-model="password" class="form-control bg-secondary text-primary border-top-0 border-left-0 border-right-0" id="password"
                               :class="{'border-danger' : errors.password}">
                        <small class="text-danger font-weight-bolder" v-show="errors.password">{{"*" + errors.password}}</small>
                    </div>
                    <button class="btn btn-primary w-100" :disabled="loading && !errors">
                        Login
                        <div class="spinner-grow text-success" role="status" style="width: 1rem;height: 1rem" v-show="loading && !errors">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    <inertia-link href="" class="btn btn-outline-primary w-100 mt-2">Register</inertia-link>
                </form>
            </div>
        </div>
    </UserMaster>
</template>

<script>
import UserMaster from "../Layout/UserMaster";
export default {
    name: "Login",
    components: {UserMaster},
    props : { errors : Object },
    data(){
        return{
            email : "",
            password : "",
            loading : false,
        }
    },
    methods: {
        login(){
            const  data = {email : this.email, password : this.password};
            this.$inertia.post('/login', data, {
                onStart : ()=>this.loading=true,
                onFinish : () =>this.loading=false,
            })
        }
    }
}
</script>

<style scoped>

</style>
