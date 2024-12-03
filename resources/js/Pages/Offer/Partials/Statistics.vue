<script setup>
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from 'chart.js';
import { Line } from 'vue-chartjs';

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
);

const props = defineProps({
    id: {
        type: Number,
        required: true,
    },
});

let chartData = ref(null);
let chartOptions = ref(null);
let showChart = ref(false);
let chartPeriod = ref('');
let chartInstance = ref(null);
let chartInfoInstance = ref(null);
let refCountByPeriodInstance = ref(null);

// Группировка данных
const groupData = (data, period) => {
    let groupedData = [];
    let hours;
    let days;
    let months;

    if (period === 'day') {
        hours = [...Array(24).keys()].map(
            (key) => key.toString().padStart(2, '0') + ':00',
        );
        const values = [...Array(24).fill(0)];
        const result = hours.reduce((acc, hour, index) => {
            acc[hour] = values[index];
            return acc;
        }, {});
        groupedData = result;
    }

    if (period === 'month') {
        let countDaysPerMonth = new Date(
            new Date().getFullYear(),
            new Date().getMonth() + 1,
            0,
        ).getDate();
        days = Array.from({ length: countDaysPerMonth }, (_, i) => i + 1);
        const values = [...Array(countDaysPerMonth).fill(0)];
        const result = days.reduce((acc, day, index) => {
            acc[day] = values[index];
            return acc;
        }, {});
        groupedData = result;
    }

    if (period === 'year') {
        months = [...Array(12).keys()].map((key) =>
            new Date(0, key).toLocaleString('ru', { month: 'long' }),
        );
        const values = [...Array(12).fill(0)];
        const result = months.reduce((acc, month, index) => {
            acc[month] = values[index];
            return acc;
        }, {});
        groupedData = result;
    }

    data.forEach((item) => {
        const timestamp = new Date(item.created_at);
        let key;

        if (period === 'day') {
            // Группируем по часам
            key = hours[timestamp.getHours()];
        } else if (period === 'month') {
            // Группируем по дням месяца
            key = days[timestamp.getDate() - 1];
        } else if (period === 'year') {
            // Группируем по месяцам
            key = months[timestamp.getMonth()];
        }

        groupedData[key] = (groupedData[key] || 0) + 1;
    });

    return groupedData;
};

const getChartData = (period, data) => {
    let groupedData = groupData(data, period);
    const sortedValues = Object.entries(groupedData)
        .sort(([keyA], [keyB]) => parseInt(keyA) - parseInt(keyB)) // Сортировка по числовым ключам
        .map(([, value]) => value); // Извлекаем только значения

    chartOptions.value = {
        responsive: true,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Время',
                },
            },
            y: {
                title: {
                    display: true,
                    text: 'Количество переходов',
                },
                beginAtZero: true,
                ticks: {
                    stepSize: 1,
                },
            },
        },
    };
    chartOptions.value.scales.x.title.text =
        period === 'day' ? 'Час' : period === 'month' ? 'День' : 'Месяц';

    chartData.value = {
        labels: Object.keys(groupedData).sort(
            (a, b) => parseInt(a) - parseInt(b),
        ),
        datasets: [
            {
                label: 'Количество переходов',
                backgroundColor: '#f87979',
                data: sortedValues,
            },
        ],
    };
};

const offer = usePage().props.offer;
const user = usePage().props.auth.user;

const getInfoByPeriod = (subscription_id, period) => {
    chartPeriod.value = period;

    axios
        .get(route('api.offers.subscriptions.statistics', subscription_id), {
            params: { id: subscription_id, period },
        })
        .then((response) => {
            let chart = chartInfoInstance.value;
            let count = refCountByPeriodInstance.value;
            chart.innerHTML = '';

            if (user.role.name === 'advertiser') {
                chart.innerHTML +=
                    '<br>расход: ' +
                    response.data.data.length * offer.price +
                    'руб';
            } else if (user.role.name === 'webmaster') {
                chart.innerHTML +=
                    '<br>прибыль: ' +
                    response.data.data.length * (0.8 * offer.price) +
                    'руб';
            }

            count.innerText = response.data.data.length;

            if (response.data.data.length > 0) {
                getChartData(period, response.data.data);
                showChart.value = true;
            } else {
                showChart.value = false;
            }
        });
};
</script>

<template>
    <div class="m-4 border-2 border-dotted p-4">
        <h2>Статистика</h2>
        <p>
            Количество переходов и
            {{ user.role.name === 'advertiser' ? 'расходов' : 'прибыли' }} за
            {{
                chartPeriod === 'day'
                    ? 'день'
                    : chartPeriod === 'month'
                      ? 'месяц'
                      : chartPeriod === 'year'
                        ? 'год'
                        : ''
            }}: <span ref="refCountByPeriodInstance"></span>
        </p>
        <div>
            <button
                class="bg-blue-800/30 p-2 hover:bg-blue-800/70"
                @click.prevent="getInfoByPeriod(props.id, 'day')"
            >
                день
            </button>
            <button
                class="bg-indigo-800/30 p-2 hover:bg-indigo-800/70"
                @click.prevent="getInfoByPeriod(props.id, 'month')"
            >
                месяц
            </button>
            <button
                class="bg-violet-800/30 p-2 hover:bg-violet-800/70"
                @click.prevent="getInfoByPeriod(props.id, 'year')"
            >
                год
            </button>
        </div>
        <div class="m-4" ref="chartInfoInstance"></div>
        <div>
            <Line
                v-if="showChart"
                :options="chartOptions"
                :data="chartData"
                :width="400"
                ref="chartInstance"
            />
        </div>
    </div>
</template>
