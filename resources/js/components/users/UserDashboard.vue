<template>
    <div class="container">
        <h1 class="my-3">Welcome {{ user.name }} to your voucher </h1>
        <div class="card mt-5">
            <div class="card-header">
                <UserVoucherControl />
            </div>
            <div class="card-body">
                <UserVoucherList />
                <Pagination />
            </div>
        </div>

    </div>
</template>

<script>
    import UserVoucherList from "./UserVoucherList";
    import UserVoucherControl from "./UserVoucherControl";
    import Pagination from "../ui/Pagination";
    export default {
        name: "UserDashboard",
        components: {Pagination, UserVoucherControl, UserVoucherList},
        props: ['user']
    }
</script>

<style scoped>

</style>
