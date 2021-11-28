<script>
import { Doughnut } from "vue-chartjs";

export default {
    name: "DonutChart",
    extends: Doughnut,
    props: {
        chartData: {
            type: Array | Object,
            required: false
        },
        chartLabels: {
            type: Array,
            required: true
        }
    },
    data () {
        return {
            options: {
                legend: {
                    display: false,
                },
                cutoutPercentage: 80,
            }
        }
    },
    mounted () {
        this.renderChart({
            labels: this.chartLabels,
            datasets: [
                {
                    backgroundColor: ["#2BB6D0", "#E63b1f", "#203f90"],
                    hoverBackgroundColor: ["#2BB6D0", "#E63b1f", "#203f90"],
                    borderWidth: 5,
                    borderColor: document.documentElement.classList.contains("dark")
                        ? "#303953"
                        : "#fff",
                    data: this.chartData
                }
            ]
        }, this.options)
    }
}
</script>

<style scoped>

</style>
