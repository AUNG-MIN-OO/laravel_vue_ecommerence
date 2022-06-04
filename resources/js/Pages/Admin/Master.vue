<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <a>
                                <li class="list-group-item bg-primary text-white">
                                    Admin Management
                                </li>
                            </a>
                            <a>
                                <li class="list-group-item">
                                    Category
                                </li>
                            </a>
                            <a>
                                <li class="list-group-item">
                                    Product
                                </li>
                            </a>
                            <a>
                                <li class="list-group-item">
                                    Order
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="bg-primary card-header rounded" style="padding: 13px 20px">
                        <h5 class="text-uppercase text-white font-weight-bolder mb-0">
                            <slot name="header"/>
                        </h5>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <slot name="body"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Master",
    watch:{
        "$page.props.success" : function(value){
            this.$toastr.s(value);
        },
        "$page.props.info" : function(value){
            this.$toastr.i(value);
        },
        "$page.props.error" : function(value){
            this.$toastr.e(value);
        }
    }
}
</script>

<style scoped>
</style>
