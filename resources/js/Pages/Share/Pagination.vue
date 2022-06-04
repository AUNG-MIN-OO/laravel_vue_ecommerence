<template>
    <nav aria-label="...">
        <ul class="pagination justify-content-end">
            <li class="page-item" v-for="d in data" :class="{disabled : d.url == null, active : d.active}">
<!--                for previous-->
                <inertia-link class="page-link" :href="d.url" v-show="d.label === '&laquo; Previous'">
                    <i class="fa fa-angle-left"></i>
                    <span class="sr-only">Prev</span>
                </inertia-link>

<!--                for 1 2 3-->
                <inertia-link class="page-link" :href="d.url" v-if="d.label !== '&laquo; Previous' && d.label !== 'Next &raquo;'">{{d.label}}</inertia-link>

<!--                For next-->
                <inertia-link class="page-link" :href="d.url" v-show="d.label === 'Next &raquo;'">
                    <i class="fa fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                </inertia-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props : {data : Array}
}
</script>

<style scoped>

</style>
