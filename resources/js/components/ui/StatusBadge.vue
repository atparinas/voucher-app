<template>
    <span>
        <span class="app-badge py-2 px-3 font-weight-normal"  :class="`badge ${badgeColor}`">
            {{ title | capitalize }}
        </span>
    </span>
</template>

<script>
    export default {
        name: "StatusBadge",
        props: ['title'],
        computed: {
            badgeColor(){
                switch (this.title) {
                    case 'valid':
                        return 'badge-success';
                    case 'used':
                        return 'badge-danger';
                    default:
                        return 'badge-secondary'
                }
            }
        }
    }
</script>

<style scoped>
    .app-badge {
        font-size: 1em;
        letter-spacing: 1px;
    }
</style>
