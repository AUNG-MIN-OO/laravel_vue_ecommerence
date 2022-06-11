<template>
    <UserMaster>
        <div class="row">
            <!-- Loop Product -->
            <div class="col-md-4 mt-3" v-for="p in product.data" :key="p.id">
                <inertia-link :href="`/product/detail/${p.slug}`">
                    <div class="card">
                        <img class="card-img-top"
                             :src="`/${p.image}`"
                             alt="" height="200">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="text-nowrap overflow-auto">{{p.name}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href=""
                                       class="badge badge-primary">{{p.price}} Ks</a>
                                </div>
                                <div class="col-md-4">
                                    <inertia-link href=""
                                       class="badge badge-warning">{{p.category.name}}</inertia-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </inertia-link>

            </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-6 offset-3">
                <Pagination :data="product.links"></Pagination>
            </div>
        </div>
    </UserMaster>
</template>
<script>
import UserMaster from "./Layout/UserMaster";
import Pagination from "../Share/Pagination";
export default {
    name: "Index",
    components: {Pagination, UserMaster},
    props : {product : Object},
}
</script>

<style scoped>

</style>
