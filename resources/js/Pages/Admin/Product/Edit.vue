<template>
    <Master>
        <template slot="header">Edit Product Info</template>
        <template slot="body">
            <inertia-link href="/admin/product/" class="btn btn-primary btn-sm mb-2"><i class="fas fa-list-dots mr-2"></i>All Products</inertia-link>
            <form @submit.prevent="update" enctype="multipart/form-data">
                <!--                for name -->
                <div class="form-group">
                    <label for="name" class="font-weight-700">Product Name</label>
                    <input type="text" v-model="name" id="name" class="form-control" :class="{'border-danger' : errors.name}">
                    <small class="text-danger font-weight-bolder" v-show="errors.name">{{"*" + errors.name}}</small>
                </div>
                <!--                for description-->
                <div class="form-group">
                    <label for="description" class="font-weight-700">Product Description</label>
                    <textarea type="text" v-model="description" id="description" class="form-control" :class="{'border-danger' : errors.description}"></textarea>
                    <small class="text-danger font-weight-bolder" v-show="errors.description">{{"*" + errors.description}}</small>
                </div>
                <!--                for price-->
                <div class="form-group">
                    <label for="price" class="font-weight-700">Product Price</label>
                    <input type="text" v-model="price" id="price" class="form-control" :class="{'border-danger' : errors.price}">
                    <small class="text-danger font-weight-bolder" v-show="errors.price">{{"*" + errors.price}}</small>
                </div>
                <!--                for category-->
                <div class="form-group">
                    <label for="category_id" class="font-weight-700">Product Category</label>
                    <select class="form-control custom-select" name="category_id" id="category_id" :class="{'border-danger' : errors.category_id}" v-model="category_id">
                        <option value="" disabled selected>Choose Category</option>
                        <option :value="c.id" v-for="c in cat" :key="c.id">{{c.name}}</option>
                    </select>
                    <small class="text-danger font-weight-bolder" v-show="errors.category_id">{{"*" + errors.category_id}}</small>
                </div>
                <!--                for product image-->
                <div class="form-group">
                    <label for="image" class="font-weight-700">Choose Image</label>
                    <img :src="`/${product.image}`" alt="" width="80" class="d-block mb-2">
                    <input type="file" @change="chooseImage" id="image" class="form-control pt-2 pl-2" :class="{'border-danger' : errors.image}">
                    <small class="text-danger font-weight-bolder" v-show="errors.image">{{"*" + errors.image}}</small>
                </div>
                <!--                submit button -->
                <button class="btn btn-primary float-right" :disabled="loading && !errors">
                    Add
                    <div class="spinner-grow text-success" role="status" style="width: 1rem;height: 1rem" v-show="loading && !errors">
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
    props : {product : Object, errors : Object, cat : Array},
    data(){
        return{
            name : "",
            description : "",
            price :  "",
            image : "",
            loading : false,
            category_id : "",
        }
    },
    created() {
        this.category_id = this.product.category_id;
        this.description = this.product.description;
        this.price = this.product.price;
        this.name = this.product.name;
        },
    methods:{
        chooseImage (e){
            this.image = e.target.files[0];
        },
        update(){
            const data = new FormData();
            data.append('name',this.name);
            data.append('category_id',this.category_id);
            data.append('price',this.price);
            data.append('image',this.image);
            data.append('description',this.description);
            data.append('_method','PUT');
            this.loading = true ;
            this.$inertia.post('/admin/product/'+ this.product.id, data,{
                onSuccess : ()=>{
                    this.loading = false;
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
