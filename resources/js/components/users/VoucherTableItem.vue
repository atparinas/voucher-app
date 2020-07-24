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
            <button class="btn btn-sm btn-danger" @click="deleteVoucher(voucher.id)" >
                <div v-if="deleting" >
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Deleting ...
                </div>
                <div v-else>
                    Delete
                </div>
            </button>
        </td>
    </tr>
</template>

<script>
    import StatusBadge from "../ui/StatusBadge";
    import EventBus from "../utils/EventBus";
    export default {
        name: "VoucherTableItem",
        components: {StatusBadge},
        props: ['voucher', 'count'],
        data(){
            return {
                deleting: false
            }
        },
        methods: {
            async deleteVoucher(voucherId){
                try{
                    this.deleting = true;
                    const uri = `${this.backendUrl}/api/users/vouchers/${voucherId}`;

                    const csrf = `${this.backendUrl}/sanctum/csrf-cookie`;
                    await axios.get(csrf);

                    const response = await axios.delete(uri);

                    EventBus.$emit('VOUCHER_DELETED')

                    console.log(response);


                }catch (e) {
                    console.log(e);
                }finally {
                    this.deleting = false;
                }

            }
        }
    }
</script>

<style scoped>

</style>
