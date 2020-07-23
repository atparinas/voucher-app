<template>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Voucher Code</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>5F192AD3EDD01</td>
                <td>
                    <StatusBadge title="valid" />
                </td>
                <td>
                    <button class="btn btn-sm btn-danger" >Delete</button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>5F192AD3EDD01</td>
                <td>
                    <StatusBadge title="valid" />
                </td>
                <td>
                    <button class="btn btn-sm btn-danger" >Delete</button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>5F192AD3EDD01</td>
                <td>
                    <StatusBadge title="valid" />
                </td>
                <td>
                    <button class="btn btn-sm btn-danger" >Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import StatusBadge from "../ui/StatusBadge";
    export default {
        name: "UserVoucherList",
        components: {StatusBadge}
    }
</script>

<style scoped>

</style>
