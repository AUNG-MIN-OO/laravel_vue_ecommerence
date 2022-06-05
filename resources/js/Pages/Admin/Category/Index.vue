<template>
    <Master>
        <template slot="header">
            all categories
        </template>
        <template slot="body">
            <inertia-link href="/admin/category/create"  class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus-circle mr-2"></i>Create Category</inertia-link>
            <table class="table table-striped table-dark table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="c in cat.data">
                    <td class="text-capitalize">{{ c.name }}</td>
                    <td>
                        <inertia-link :href="`/admin/category/${c.id}/edit`" class="btn btn-sm btn-warning">Edit</inertia-link>
                        <span @click="destroy(c.id)" class="btn btn-sm btn-danger">Delete</span>
                    </td>
                </tr>
                </tbody>
            </table>
            <Pagination :data="cat.links"/>
        </template>
    </Master>
</template>

<script>
import Master from "../Master";
import Pagination from "../../Share/Pagination";
export default {
name: "Index",
    props : {cat : Object},
    components: {Pagination, Master},
    methods : {
        destroy(id){
            if (confirm('Are you sure to delete?')){
                const data = {id, _method : "DELETE"};
                this.$inertia.delete("/admin/category/" + id, data);
            }
        }
    },
}
</script>

<style scoped>

</style>
