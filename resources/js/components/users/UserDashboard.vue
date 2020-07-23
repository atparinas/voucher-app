<template>
    <div class="container">
        <h1 class="my-3">Welcome {{ user.name }} to your voucher wallet </h1>
        <div class="mt-5">
            <div>
                <UserVoucherList :user-id="user.id" />
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
        props: ['user'],
        data(){
            return {

            }
        }
    }
</script>

<style scoped>

</style>
