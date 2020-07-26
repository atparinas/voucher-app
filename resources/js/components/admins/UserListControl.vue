<template>
    <div>
        <div v-if="loading">Loading Users ...</div>
        <div v-else class="d-flex align-items-center justify-content-between">
            <h5>Users Table</h5>
            <button class="btn btn-primary" @click="downloadCsv">
                <div v-if="downloading" >
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Downloading ...
                </div>
                <div v-else>
                    Download CSV
                </div>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserListControl",
        props: ['loading'],
        data(){
            return {
                downloading: false
            }
        },
        methods: {

            async downloadCsv(){
                try {
                    this.downloading = true;

                    const url = `/api/users/downloads`;
                    const response = await axios.get(url)

                    const fileUrl = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = fileUrl;
                    link.setAttribute('download', 'user-codes.csv')
                    document.body.appendChild(link);
                    link.click();

                }catch (e) {
                    console.log(e)
                }finally {
                    this.downloading = false;
                }
            }
        }
    }
</script>

<style scoped>

</style>
