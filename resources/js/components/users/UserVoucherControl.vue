<template>
    <div >
        <div  v-if="loading">
            <h4> Loading your vouchers... </h4>
        </div >
        <div v-else class="d-flex align-items-center justify-content-between">
            <h4>You have {{ totalVoucher }} Voucher{{ totalVoucher > 1 ? 's' : '' }} </h4>
            <button class="btn btn-primary"  @click="createVoucher" >
                <div v-if="creating" >
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Creating ...
                </div>
                <div v-else>
                    Create Voucher
                </div>
            </button>
        </div>
    </div>
</template>

<script>

    import EventBus from "../utils/EventBus";

    export default {
        name: "UserVoucherControl",
        components: {},
        props: ['totalVoucher', 'loading', 'userId'],
        data(){
            return {
                creating: false
            }
        },
        methods: {

            async createVoucher(){
                try {
                    this.creating = true;

                    const csrf = `${this.backendUrl}/sanctum/csrf-cookie`;
                    await axios.get(csrf);

                    const url = `${this.backendUrl}/api/users/vouchers`
                    const response = await axios.post(url);

                    EventBus.$emit('VOUCHER_CREATED', response.data);

                    console.log('VOUCHER_CREATED', response.data)

                }catch (e) {
                    let errorMessage = ''
                    if(e.response && e.response.data && e.response.data.message){
                        errorMessage = e.response.data.message
                    }else {
                        errorMessage = "Please try again"
                    }

                    EventBus.$emit('VOUCHER_CREATE_ERROR', errorMessage);

                    console.log(e.response)
                }
                finally {
                    this.creating = false
                }

            }


        }
    }
</script>

<style scoped>
    .app-spinner {
        width: 20px;
        height: 20px;
    }
</style>
