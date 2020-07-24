<template>
    <div class="container">
        <h1 class="my-3">Welcome {{ user.name }} to your voucher wallet </h1>
        <div v-if="message && messageType">
            <Alert :message="message" :message-type="messageType" @close="closeAlert" />
        </div>
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
    import EventBus from "../utils/EventBus";
    import Alert from "../ui/Alert";
    export default {
        name: "UserDashboard",
        components: {Alert, Pagination, UserVoucherControl, UserVoucherList},
        props: ['user'],
        data(){
            return {
                message: '',
                messageType: ''
            }
        },
        methods: {
            closeAlert(){
                this.message ='';
                this.messageType = '';
            }
        },
        mounted() {
            EventBus.$on('VOUCHER_CREATED',  (voucher) => {
                console.log('Event Triggered', voucher)
                if(voucher){
                    this.message = "You have successfully created a voucher";
                    this.messageType = 'success'
                }
            })
        }
    }
</script>

<style scoped>

</style>
