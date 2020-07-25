<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name </th>
            <th scope="col" class="text-right">Number Of Codes</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(user, index) in users" :key="index">
                <td>{{ index + 1 }}</td>
                <td> {{ user.name }} </td>
                <td class="text-right" > {{ user.vouchersCount }} </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "UsersTable",
        props: ['users']
    }
</script>

<style scoped>

</style>
