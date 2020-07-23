<template>
    <ul class="pagination" v-if="pagination">
        <li class="page-item" :class="pagination.previousPageUrl ? '' : 'disabled'"  >
            <a v-if="pagination.previousPageUrl" class="page-link"
               @click="previousPageHandler(pagination.previousPageUrl)">
                Previous
            </a>

            <span v-else class="page-link">
                Previous
            </span>

        </li>
        <li class="page-item"  v-for="n in pagination.totalPages" :key="n"
            :class="n === pagination.currentPage? 'active' : ''">
            <span v-if="n === pagination.currentPage" class="page-link" >
                {{ n }}
            </span>
            <a  v-else class="page-link" @click="pageClickHandler(n)">
                {{ n }}
            </a>
        </li>
        <li class="page-item" :class="pagination.nextPageUrl ? '' : 'disabled'">
            <a v-if="pagination.nextPageUrl" class="page-link"
               @click="nextPageHandler(pagination.nextPageUrl)">
                Next
            </a>

            <span v-else class="page-link">
                Next
            </span>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "Pagination",
        props: ['pagination'],
        methods: {
            pageClickHandler(page){
                this.$emit('onPageClicked', page)
            },
            previousPageHandler(url){
                this.$emit('onPageNavClicked', url)
            },
            nextPageHandler(url){
                this.$emit('onPageNavClicked', url)
            }
        }
    }
</script>

<style scoped>
    .page-item {
        cursor: pointer;
    }
    .page-link {
        color: #0275d8;
    }
</style>
