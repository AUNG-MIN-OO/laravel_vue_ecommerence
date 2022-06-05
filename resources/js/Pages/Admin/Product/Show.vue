<template>
    <Master>
        <template slot="header">Product Detail</template>
        <template slot="body">
            <div class="d-flex justify-content-between">
                <inertia-link href="/admin/product/"  class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle mr-2"></i>All Products</inertia-link>
                <div class="">
                    <inertia-link :href="`/admin/product/${product.id}/edit`" class="badge badge-circle  badge-warning">
                        <i class="fas fa-file-edit"></i>
                    </inertia-link>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img :src="`/${product.image}`" alt="" width="300" class="rounded img-thumbnail">
                </div>
                <div class="col-md-6">
                    <table class="table table-hover table-dark table-striped table-responsive">
                        <tr>
                            <td>Title</td>
                            <td>{{ product.name }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><span class="badge badge-pill badge-primary">{{product.category.name}}</span></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ product.description }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{ product.price }}</td>
                        </tr>
                        <tr>
                            <td>Viewers</td>
                            <td>{{ product.view_count }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </template>
    </Master>
</template>

<script>
import Master from "../Master";
export default {
name: "Show",
    props : {product : Object},
    components: {Master},

}
</script>

<style scoped>

</style>
