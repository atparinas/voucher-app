<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <SideNav />
            </div>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div>
                    <router-view></router-view>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
    import SideNav from "./SideNav";
    export default {
        name: "AdminPage",
        components: {SideNav}
    }
</script>

<style scoped>

</style>
