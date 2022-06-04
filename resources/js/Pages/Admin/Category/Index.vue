<template>
    <Master>
        <template slot="header">
            all categories
        </template>
        <template slot="body">
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
                        <inertia-link class="btn btn-sm btn-warning">Edit</inertia-link>
                        <inertia-link class="btn btn-sm btn-danger">Delete</inertia-link>
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
    components: {Pagination, Master}
}
</script>

<style scoped>

</style>
