<template>
    <div class="card">
        <div class="card-header">
            <UserVoucherControl :totalVoucher="totalVoucher" :loading="loading" :user-id="userId" />
        </div>
        <div style="height: 10px">
            <div class="progress" v-if="loading || paginating">
            <div  class="progress-bar progress-bar-striped progress-bar-animated"
                 role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
            </div>
        </div>

        <div v-if="vouchers.length > 0" class="card-body" >
            <UserVouchersTable :vouchers="vouchers" :first-item="pagination.firstItem" />
            <div class="d-flex align-items-center justify-content-between">
                <Pagination v-if="pagination.totalPages > 1"
                    :pagination="pagination"
                            @onPageClicked="pageClickedHandler"
                            @onPageNavClicked="pageNavHandler" />
            </div>

        </div>
    </div>
</template>

<script>
    import StatusBadge from "../ui/StatusBadge";
    import Pagination from "../ui/Pagination";
    import ProgressBar from "../ui/ProgressBar";
    import UserVouchersTable from  "./UserVouchersTable"
    import UserVoucherControl from "./UserVoucherControl";
    import api from "../utils/api";
    import EventBus from "../utils/EventBus";
    export default {
        name: "UserVoucherList",
        components: {UserVoucherControl, ProgressBar, Pagination, StatusBadge, UserVouchersTable},
        props: ['userId'],
        data(){
            return {
                loading: false,
                paginating: false,
                vouchers: [],
                pagination: null,
                totalVoucher: 0,
            }
        },
        methods: {
            async getUserVouchers(url){
                try{

                    const response = await axios.get(url);

                    this.vouchers = response.data.data;
                    this.pagination = Object.assign({}, response.data.pagination)
                    this.totalVoucher = this.pagination.total

                    console.log(response.data)

                }catch (e) {
                    console.log(e)
                }

            },
            async pageClickedHandler(page){
                this.paginating = true
                const url = `${this.backendUrl}/api/users/vouchers/?page=${page}`;
                await this.getUserVouchers(url)

                this.paginating = false
            },
            async pageNavHandler(url){
                this.paginating = true
                await this.getUserVouchers(url)

                this.paginating = false
            },
            async refreshContent(page){


                const url = `${this.backendUrl}/api/users/vouchers/?page=${page}`

                //Paginating is used as to maintain table visibility
                this.paginating = true
                await this.getUserVouchers(url)

                this.paginating = false

            },

        },
        async mounted() {

            const url = `${this.backendUrl}/api/users/vouchers`;
            this.loading = true;
            await this.getUserVouchers(url);
            this.loading = false;


            EventBus.$on('VOUCHER_CREATED',  (voucher) => {
                if(this.pagination && this.pagination.currentPage){
                    let page = this.pagination.currentPage;
                    this.refreshContent(page);
                }
            })

            EventBus.$on('VOUCHER_DELETED',  () => {
                if(this.pagination && this.pagination.currentPage){
                    let page = this.pagination.currentPage;

                    if(this.pagination.count === 1){
                        if(this.pagination.previousPageUrl !== null && this.pagination.nextPageUrl === null){
                            page = this.pagination.currentPage - 1;
                        }else if (this.pagination.previousPageUrl !== null && this.pagination.nextPageUrl !== null){
                            page = this.pagination.currentPage;
                        }else {
                            page = 1;
                        }
                    }

                    this.refreshContent(page);
                }
            })


        }
    }
</script>

<style scoped>

</style>
