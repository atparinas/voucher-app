<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Voucher Code</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <VoucherTableItem v-for="(voucher, index) in vouchers" :key="voucher.id"
                          :voucher="voucher" :count="firstItem + index" />
        </tbody>
    </table>
</template>

<script>
    import StatusBadge from "../ui/StatusBadge";
    import VoucherTableItem from "./VoucherTableItem";
    export default {
        name: "UserVouchersTable",
        components: {VoucherTableItem, StatusBadge},
        props: {
            vouchers: {required: true, type: Array},
            firstItem: {type: [Number, null]}
        }
    }
</script>

<style scoped>

</style>
