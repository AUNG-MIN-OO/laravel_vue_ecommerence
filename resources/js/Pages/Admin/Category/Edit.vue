<template>
    <Master>
        <template slot="header">
            update category
        </template>
        <template slot="body">
            <inertia-link href="/admin/category/" class="btn btn-primary btn-sm mb-2"><i class="fas fa-list-dots mr-2"></i>All Categories</inertia-link>
            <form @submit.prevent="update">
                <div class="form-group">
                    <label for="name" class="font-weight-700">Category Name</label>
                    <input type="text" v-model="name" id="name" class="form-control">
                    <small class="text-danger font-weight-bolder" v-show="errors.name">{{"*" + errors.name}}</small>
                </div>
                <button class="btn btn-primary float-right" :disabled="loading">
                    Update
                    <div class="spinner-grow text-success" role="status" style="width: 1rem;height: 1rem" v-show="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                </button>
            </form>
        </template>
    </Master>
</template>

<script>
import Master from "../Master";
export default {
    name: "Edit",
    components: {Master},
    props : {cat : Object, errors : Object},
    data(){
        return{
            name : "",
            loading : false,
        }
    },
    created() {
        this.name = this.cat.name;
    },
    methods:{
        update(){
            this.loading = true;
            this.$inertia.put("/admin/category/" + this.cat.id,{
                name : this.name , _method : "PUT"
            },{
                onSuccess : () => {
                    this.loading = false;
                }
                }
            )
        }
    }
}
</script>

<style scoped>

</style>
