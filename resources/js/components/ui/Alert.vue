<template>
    <div class="alert fade show" :class="`alert-${messageType}`" role="alert">
        <strong>{{ catchPhrase }}</strong> {{ message }}
        <button type="button" class="close" @click="$emit('close')">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
    export default {
        name: "Alert",
        props: ['message', 'messageType'],
        computed: {
            catchPhrase(){
                switch (this.messageType) {
                    case "success":
                        return 'Congratulations!';

                    case "danger":
                        return 'Oops Something went wrong';

                    case 'info':
                        return 'For your information'

                    default:
                        return ''
                }
            }
        }
    }
</script>

<style scoped>

</style>
