<template>
    <nav id="sidebarMenu">
        <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <router-link class="nav-link" to="/">
                        Dashboard
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/users">
                        Users
                    </router-link>

                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "SideNav"
    }
</script>

<style scoped>

</style>
