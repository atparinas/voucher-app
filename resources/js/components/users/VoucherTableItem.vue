<template>
    <tr>
        <th scope="row">{{ count }}</th>
        <td>{{ voucher.code }}</td>
        <td>
            <StatusBadge :title="voucher.status" />
        </td>
        <td>
            {{ voucher.createdAt }}
        </td>
        <td>
            <button class="btn btn-sm btn-danger" @click="deleteVoucher(voucher.id)" >Delete</button>
        </td>
    </tr>
</template>

<script>
    import StatusBadge from "../ui/StatusBadge";
    export default {
        name: "VoucherTableItem",
        components: {StatusBadge},
        props: ['voucher', 'count'],
        methods: {
            deleteVoucher(voucherId){

            }
        }
    }
</script>

<style scoped>

</style>
