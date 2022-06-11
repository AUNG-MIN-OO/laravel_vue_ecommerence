<template>
    <Master>
        <template slot="header">Admin Dashboard</template>
        <template slot="body">
            Welcome !
        </template>
    </Master>
</template>

<script>
import Master from "./Master";
export default {
name: "Dashboard",
    props : {auth_user : Object},
    components: {Master}
}
</script>

<style scoped>

</style>
