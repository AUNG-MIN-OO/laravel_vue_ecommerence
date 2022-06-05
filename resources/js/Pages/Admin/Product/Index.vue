<template>
    <Master>
        <template slot="header">All Products</template>
        <template slot="body">
            <inertia-link href="/admin/product/create"  class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle mr-2"></i>Add New Product</inertia-link>
            <table class="table table-striped table-dark table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="p in product.data">
                    <td class="text-capitalize">
                        <img :src="`/${p.image}`" alt="" class="rounded img-thumbnail" style="width: 50px; height: 50px;">
                    </td>
                    <td class="text-capitalize">{{ p.name }}</td>
                    <td class="text-capitalize">{{ p.price }}</td>
                    <td>
                        <inertia-link :href="`/admin/product/${p.id}`" class="badge badge-circle  badge-success">
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                        <inertia-link :href="`/admin/product/${p.id}/edit`" class="badge badge-circle  badge-warning">
                            <i class="fas fa-file-edit"></i>
                        </inertia-link>
                        <span @click="destroy(p.id)" class="badge badge-circle  badge-danger">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>
            <Pagination :data="product.links"/>
        </template>
    </Master>
</template>

<script>
import Master from "../Master";
import Pagination from "../../Share/Pagination";
export default {
name: "Index",
    components: {Pagination, Master},
    props : {product : Object},
    methods : {
        destroy(id){
            alert('hi');
            const  data = {id, _method:"DELETE"};
            this.$inertia.delete('/admin/product/'+id,data);
        }
    }
}
</script>

<style scoped>

</style>
