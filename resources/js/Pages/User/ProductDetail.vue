<template>
    <UserMaster>
        <div class="row">
            <div class="col-md-12">
                <h1>{{product.name}}</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href=""
                           class="btn btn-primary rounded">
                            <i
                                class="fas fa-cart-arrow-down"></i>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <small>
                            <i class="fas fa-eye"></i>
                            {{product.view_count}}
                        </small>
                    </div>
                    <div class="col-md-4">
                        <a href=""
                           class="badge badge-primary">{{product.category.name}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img :src="`/${product.image}`" class="w-50" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    {{product.description}}
                </p>
            </div>
        </div>
    </UserMaster>
</template>

<script>
import UserMaster from "./Layout/UserMaster";
export default {
name: "ProductDetail",
    components: {UserMaster},
    props: {product : Object},
}
</script>

<style scoped>

</style>
