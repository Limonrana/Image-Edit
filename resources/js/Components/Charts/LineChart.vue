<script>
import { Line } from 'vue-chartjs';
export default {
    name: "LineChart",
    extends: Line,
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
                scales: {
                    xAxes: [
                        {
                            ticks: {
                                fontSize: "12",
                                fontColor: document.documentElement.classList.contains("dark")
                                    ? "#718096"
                                    : "#777777",
                            },
                            gridLines: {
                                display: false,
                            },
                        },
                    ],
                    yAxes: [
                        {
                            ticks: {
                                fontSize: "12",
                                fontColor: document.documentElement.classList.contains("dark")
                                    ? "#718096"
                                    : "#777777",
                                callback: function (value, index, values) {
                                    return "$" + value;
                                },
                            },
                            gridLines: {
                                color: document.documentElement.classList.contains("dark")
                                    ? "#718096"
                                    : "#D8D8D8",
                                zeroLineColor: document.documentElement.classList.contains("dark")
                                    ? "#718096"
                                    : "#D8D8D8",
                                borderDash: [2, 2],
                                zeroLineBorderDash: [2, 2],
                                drawBorder: false,
                            },
                        },
                    ],
                },
            },
        }
    },
    mounted () {
        this.renderChart({
            labels: this.chartLabels,
            datasets: [
                {
                    label: '# of Votes',
                    borderWidth: 2,
                    borderColor: "#203f90",
                    backgroundColor: "transparent",
                    pointBorderColor: "transparent",
                    data: this.chartData.firstData
                },
                {
                    label: '# of Votes',
                    borderWidth: 2,
                    borderDash: [2, 2],
                    borderColor: "#a0afbf",
                    backgroundColor: "transparent",
                    pointBorderColor: "transparent",
                    data: this.chartData.secondData
                }
            ]
        }, this.options)
    }
}
</script>

<style scoped>

</style>
