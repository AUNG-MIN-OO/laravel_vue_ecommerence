<template>
    <UserMaster>
        <div class="card border-0 shadow-sm shadow-lg--hover">
            <div class="card-body">
                <h4 class="font-weight-bold text-uppercase text-center">Sign Up</h4>
                <p class="text-center">Welcome to MM-SHOP!</p>
                <hr>
                <form @submit.prevent="register">
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" v-model="name" class="form-control bg-secondary text-primary border-top-0 border-left-0 border-right-0" id="name"
                         :class="{'border-danger' : errors.name}">
                        <small class="text-danger font-weight-bolder" v-show="errors.name">{{"*" + errors.name}}</small>
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
                        Sign Up
                        <div class="spinner-grow text-success" role="status" style="width: 1rem;height: 1rem" v-show="loading && !errors">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    <inertia-link :href="`/login`" class="btn btn-outline-primary w-100 mt-2">Login</inertia-link>
                </form>
            </div>
        </div>
    </UserMaster>
</template>

<script>
import UserMaster from "../Layout/UserMaster";
export default {
name: "Register",
    components: {UserMaster},
    props : {errors : Object},
    data(){
        return{
            name : "",
            email : "",
            password : "",
            loading : false,
        }
    },
    methods: {
        register(){
            const  data = {name : this.name, email : this.email, password : this.password};
            this.$inertia.post('/register',data, {
                onStart : ()=>this.loading=true,
                onFinish : () =>this.loading=false,
            })
        }
    }
}
</script>

<style scoped>

</style>
