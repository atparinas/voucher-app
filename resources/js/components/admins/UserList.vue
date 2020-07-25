<template>
    <div>
        <h1 class="mt-2 mb-5 border-bottom py-3 ">Users Admin Page</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div v-if="loading">Loading Users ...</div>
                        <div v-else>
                            Users Table
                            <button @click="downloadCsv">Download CSV</button>
                        </div>
                    </div>
                    <div style="height: 10px">
                        <div class="progress" v-if="loading">
                            <div  class="progress-bar progress-bar-striped progress-bar-animated"
                                  role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                    </div>
                    <div v-if="!loading" class="card-body">
                        <UsersTable :users="users" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UsersTable from "./UsersTable";
    import EventBus from "../utils/EventBus";
    export default {
        name: "UserList",
        components: {UsersTable},
        data(){
            return {
                users: [],
                loading: false
            }
        },
        methods: {

            async getAllUsers(){
                try{
                    this.loading = true;

                    const url = `/api/users`;
                    const response = await axios.get(url)

                    this.users = response.data.data

                }catch (e) {
                    EventBus.$emit('USERS_LOAD_ERROR')
                    console.log(e)
                }finally {
                    this.loading = false
                }
            },

            async downloadCsv(){
                try {
                    const url = `/api/users/downloads`;
                    const response = await axios.get(url)

                    const fileUrl = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = fileUrl;
                    link.setAttribute('download', 'file.csv')
                    document.body.appendChild(link);
                    link.click();

                }catch (e) {
                    console.log(e)
                }
            }
        },
        mounted() {
            this.getAllUsers();
        }
    }
</script>

<style scoped>

</style>
