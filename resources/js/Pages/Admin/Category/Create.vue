<template>
    <Master>
        <template slot="header">
            create category
        </template>
        <template slot="body">
            <form @submit.prevent="store">
                <div class="form-group">
                    <label for="name" class="font-weight-700">Category Name</label>
                    <input type="text" v-model="name" id="name" class="form-control">
                    <small class="text-danger font-weight-bolder" v-show="errors.name">{{"*" + errors.name}}</small>
                </div>
                <button class="btn btn-primary float-right" :disabled="loading">
                    Create
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
name: "Create",
    components: {Master},
    props : {errors : Object},
    data(){
        return{
            name : "",
            loading : false,
        }
    },
    methods:{
        store(){
            this.loading = true;
            this.$inertia.post("/admin/category",{name : this.name},{
                onSuccess : () => {
                    this.loading = false;
                    this.name = "";
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
