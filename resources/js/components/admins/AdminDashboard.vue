<template>
    <div class="container">
        <h1 class="mt-2 mb-2 border-bottom py-3 ">Admin Dashboard</h1>
        <div class="row justify-content-center mt-1">
            <div class="col-md-10">
                <BarChart
                    :min-value="0"
                    :max-value="12"
                    :chart-data="chartData"/>
            </div>
        </div>
    </div>
</template>

<script>
    import Chart from 'chart.js';
    import BarChart from "../ui/BarChart";

    export default {
        name: "AdminDashboard",
        components: {BarChart},
        data(){
            return {
                chartData: {},
            }
        },
        methods: {
            async getData(){

                try{
                    const url = '/api/vouchers/graphs';
                    const response = await axios.get(url);

                    const labels = [];
                    const xData = [];

                    const data = response.data.data;

                    data.map(d => {
                        labels.push(d.createdDate);
                        xData.push(d.numberOfVouchers);
                    })
                    const chartData = {
                        labels: labels,
                        datasets: [
                            {
                                label: "Number of Vouchers",
                                data: xData,
                                backgroundColor: "#f38b4a",
                            }
                        ]
                    }
                    this.chartData = Object.assign({}, chartData)
                    console.log(this.chartData);

                }catch (e) {
                    console.log(e)
                }

            }
        },
        async mounted() {
            await this.getData();
        }
    }
</script>

<style scoped>

</style>
