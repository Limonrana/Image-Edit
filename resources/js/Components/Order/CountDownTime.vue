<template>
    <div class="content-count-down p-5">
        <h2 class="font-medium text-base">
            Time Left To Deliver
        </h2>
        <div class="wrapper-count-down">
            <div class="digit">
                <div class="label"><div class="inner"><span :style="{ color: colorRed }">{{ displayDays }}</span></div></div>
                <span>DAYS</span>
            </div>

            <span>:</span>

            <div class="digit">
                <div class="label"><div class="inner"><span :style="{ color: colorRed }">{{ displayHours }}</span></div></div>
                <span>HOURS</span>
            </div>

            <span>:</span>

            <div class="digit">
                <div class="label"><div class="inner"><span :style="{ color: colorRed }">{{ displayMinutes }}</span></div></div>
                <span>MINUTES</span>
            </div>

            <span>:</span>

            <div class="digit">
                <div class="label"><div class="inner"><span :style="{ color: colorRed }">{{ displaySeconds }}</span></div></div>
                <span>SECONDS</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CountDownTime",
    props: ['orderCreated', 'deadline'],
    data() {
        return {
            displayDays: '00',
            displayHours: '00',
            displayMinutes: '00',
            displaySeconds: '00',
        }
    },
    computed: {
        _seconds() {
            return 1000;
        },
        _minutes() {
            return this._seconds * 60;
        },
        _hours() {
            return this._minutes * 60;
        },
        _days() {
            return this._hours * 24;
        },
        colorRed() {
            if (this.displayDays  && this.displayHours && this.displayMinutes && this.displaySeconds === '00') {
                return 'red';
            }
        }
    },
    mounted() {
      this.showRemaining();
    },
    methods: {
        showRemaining() {
            const timer = setInterval(() => {
                const start = new Date();
                const end = new Date(this.orderCreated);
                end.setHours( end.getHours() + parseInt(this.deadline) );
                const distance = end.getTime() - start.getTime();

                if (distance < 0) {
                    clearInterval(timer);
                    return;
                }

                this.displayDays = Math.floor(distance / this._days).toString().padStart(2, "0");
                this.displayHours = Math.floor((distance % this._days) / this._hours).toString().padStart(2, "0");
                this.displayMinutes = Math.floor((distance % this._hours) / this._minutes).toString().padStart(2, "0");
                this.displaySeconds = Math.floor((distance % this._minutes) / this._seconds).toString().padStart(2, "0");
            }, 1000);
        }
    }
}
</script>

<style scoped>
.content-count-down {
    background: #ffffff;
    box-shadow: 3px 3px 7px #a6b0bb, -3px -3px 7px #ffffff73;
    margin: auto;
    /*padding: 10px 10px;*/
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: stretch;
}
.content-count-down .wrapper-count-down {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 16px 10px;
}
.content-count-down .wrapper-count-down > span {
    color: #2e4a6c;
    font-size: 2rem;
    transform: translateY(-15px);
}
.content-count-down .wrapper-count-down .digit {
    display: flex;
    flex-direction: column;
}
.content-count-down .wrapper-count-down .digit > span {
    display: flex;
    justify-content: center;
    margin-top: 15px;
    color: #2e4a6c;
}
.content-count-down .wrapper-count-down .label {
    display: flex;
    /*width: 180px;*/
    justify-content: space-around;
}
.content-count-down .wrapper-count-down .inner {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    height: 3rem;
    /*width: 4rem;*/
    padding: 6px;
    margin: 0 5px;
    /*background-color: #c6d2e0;*/
    box-shadow: inset -3px -3px 7px #ffffff73, inset 3px 3px 7px #a6b0bb;
}
.content-count-down .wrapper-count-down .inner > span {
    display: flex;
    flex-direction: column;
    font-size: 2.5rem;
    color: #2e4a6c;
}
.content-count-down .labels {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
    color: antiquewhite;
    border: 1px solid lime;
}
.drop {
    animation: dropnum 0.5s ease-out forwards;
}
@keyframes dropnum {
    0% {
        transform: translateY(-35px);
        opacity: 0;
    }
    40% {
        transform: translateY(30px);
        opacity: 0.7;
    }
    70% {
        transform: translateY(-10px);
        opacity: 0.9;
    }
    100% {
        transform: translateY(0px);
        opacity: 1;
    }
}
</style>
