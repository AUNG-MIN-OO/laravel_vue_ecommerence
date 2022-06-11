<template>
    <div class="row bg-secondary vh-100">
        <div class="col-md-4 offset-4">
            <div class="card border-0 shadow-sm shadow-lg--hover mt-5">
                <div class="card-body">
                    <h4 class="font-weight-bold text-uppercase text-center">Log In</h4>
                    <p class="text-center">Welcome to Ecommerce!</p>
                    <hr>
                    <form @submit.prevent="login">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" v-model="email" class="form-control bg-secondary text-primary border-top-0 border-left-0 border-right-0" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" v-model="password" class="form-control bg-secondary text-primary border-top-0 border-left-0 border-right-0" id="password">
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
        </div>
    </div>
</template>

<script>
export default {
name: "Login",
    props : {},
    data(){
    return{
        loading : false,
        email : "",
        password : "",
    }
    },
    methods:{
        login(){
            const  data = {email : this.email, password : this.password};
            this.$inertia.post('/admin/login',data,{
                onStart : () => {
                    this.loading = true
                },
                onFinish : () => {
                    this.loading = false
                },

            })
        }
    },
    watch:{
        "$page.props.success" : function(value){
            this.$toastr.s(value);
        },
        "$page.props.info" : function(value){
            this.$toastr.i(value);
        },
        "$page.props.error" : function(value){
            this.$toastr.e(value);
        }
    }
}
</script>

<style scoped>

</style>
