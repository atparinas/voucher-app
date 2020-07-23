<template>
    <div >
        <div  v-if="loading">
            <h4> Loading your vouchers... </h4>
        </div >
        <div v-else class="d-flex align-items-center justify-content-between">
            <h4>You have {{ totalVoucher }} Voucher{{ totalVoucher > 1 ? 's' : '' }} </h4>
            <button class="btn btn-primary" >Create Voucher</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserVoucherControl",
        props: ['totalVoucher', 'loading']
    }
</script>

<style scoped>

</style>
