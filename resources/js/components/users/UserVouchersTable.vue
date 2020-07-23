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
        <tr v-for="(voucher, index) in vouchers" :key="voucher.id">
            <th scope="row">{{ firstItem + index }}</th>
            <td>{{ voucher.code }}</td>
            <td>
                <StatusBadge :title="voucher.status" />
            </td>
            <td>
                {{ voucher.createdAt }}
            </td>
            <td>
                <button class="btn btn-sm btn-danger" >Delete</button>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    import StatusBadge from "../ui/StatusBadge";
    export default {
        name: "UserVouchersTable",
        components: {StatusBadge},
        props: {
            vouchers: {required: true, type: Array},
            firstItem: {type: [Number, null]}
        }
    }
</script>

<style scoped>

</style>
