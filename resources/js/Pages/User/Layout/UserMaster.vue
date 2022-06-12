<template>
    <div>
        <!-- Header -->
        <div class="container-fluid" id="header">
            <nav class="navbar navbar-expand-lg">
                <inertia-link class="navbar-brand" :href="`/`" style="color: #5e71e4">MM-Shop</inertia-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <inertia-link class="nav-link" href="#">Home </inertia-link>
                        </li>
                        <li class="nav-item">
                            <inertia-link class="nav-link" href="#">Your Order</inertia-link>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                               id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                User
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div v-if="$page.props.auth == null">
                                    <inertia-link :href="`/login`" class="dropdown-item">Login</inertia-link>
                                    <inertia-link :href="`/register`" class="dropdown-item">Register</inertia-link>
                                </div>
                                <div v-if="$page.props.auth !== null">
                                    <a class="dropdown-item" href="#">Welcome {{$page.props.auth.name}}!</a>
                                    <inertia-link :href="`/logout`" class="dropdown-item text-danger" href="#">Logout</inertia-link>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <inertia-link class="nav-link disabled" href="#" tabindex="-1"
                               aria-disabled="true">
                                Cart
                                <small class="badge badge-danger">7</small>
                            </inertia-link>
                        </li>
                    </ul>
                    <form class="form-inline" @submit.prevent="search">
                        <input class="form-control mr-sm-2" type="text"
                               placeholder="Search"
                               aria-label="Search"
                               v-model="keyword">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </nav>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Welcome From MM-Coder Shopping Website</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Praesentium
                            sequi voluptas similique sed minima rerum labore
                            reprehenderit, illo
                            recusandae quasi tempore placeat aliquam autem, a soluta
                            nisi totam
                            temporibus dolorem!
                        </p>
                        <div v-if="$page.props.auth == null">
                            <inertia-link :href="`/register`" class="btn btn-outline-primary">SignUp</inertia-link>
                            <inertia-link :href="`/login`" class="btn btn-primary">Login</inertia-link>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <img class=""
                             src="https://wp.xpeedstudio.com/seocify/home-fifteen/wp-content/uploads/sites/27/2020/03/home17-banner-image-min.png"
                             alt="" style="height: 300px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
        <div class="container mt-3">
            <div class="row">
                <!-- For Category and Information -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item bg-dark text-white">
                                    Your Order List
                                </li>
                                <li class="list-group-item bg-danger text-white">
                                    Your Profile Info
                                </li>
                                <div v-if="$page.props.auth !== null">
                                    <inertia-link :href="`/logout`" class="list-group-item bg-warning text-white">
                                        Logout <i class="fas fa-arrow-right-from-bracket ml-3"></i>
                                    </inertia-link>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <inertia-link :href="`/`" class="list-group-item bg-primary text-white">
                                    All Category

                                </inertia-link>
                                <inertia-link :href="`/product/category/${c.slug}`" class="list-group-item" v-for="c in $page.props.category" :key="c.id">
                                    {{ c.name }}
                                    <span
                                        class="badge badge-primary float-right">{{ c.product_count }}</span>
                                </inertia-link>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <slot/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserMaster",
    data(){
        return{
            keyword : "",
        }
    },
    methods:{
        search(){
            this.$inertia.get('/product/search/'+this.keyword);
        }
    },
    created() {
        const {success, info, error} = this.$page.props;
        if (success){
            this.$toastr.s(success);
        }else if (info){
            this.$toastr.i(info);
        }else{
            this.$toastr.e(error);
        }
    }
}
</script>

<style scoped>

</style>
