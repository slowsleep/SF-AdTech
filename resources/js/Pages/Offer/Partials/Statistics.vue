<script setup>
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps({
    id: {
        type: Number,
        required: true,
    },
});

const offer = usePage().props.offer;
const user = usePage().props.auth.user;

const getInfoByPeriod = (subscription_id, period) => {
    axios
        .get(route('api.offers.subscriptions.statistics', subscription_id), {
            params: { id: subscription_id, period },
        })
        .then((response) => {
            let div = document.querySelector('#chart');
            div.innerHTML = '';
            for (let i = 0; i < response.data.data.length; i++) {
                div.innerHTML += '<br>' + response.data.data[i].created_at;
            }
            if (user.role.name === 'advertiser') {
                div.innerHTML +=
                    '<br>расход: ' +
                    response.data.data.length * offer.price +
                    'руб';
            } else if (user.role.name === 'webmaster') {
                div.innerHTML +=
                    '<br>прибыль: ' +
                    response.data.data.length * (0.8 * offer.price) +
                    'руб';
            }
        });
};
</script>

<template>
    <div class="m-4 border-2 border-dotted p-4">
        <h2>Статистика</h2>
        <div class="m-4" id="chart"></div>
        <p>
            Количество переходов и
            {{ user.role.name === 'advertiser' ? 'расходов' : 'прибыли' }}:
        </p>
        <div>
            <button
                class="bg-blue-800/30 p-2 hover:bg-blue-800/70"
                @click="getInfoByPeriod(props.id, 'day')"
            >
                день
            </button>
            <button
                class="bg-indigo-800/30 p-2 hover:bg-indigo-800/70"
                @click="getInfoByPeriod(props.id, 'month')"
            >
                месяц
            </button>
            <button
                class="bg-violet-800/30 p-2 hover:bg-violet-800/70"
                @click="getInfoByPeriod(props.id, 'year')"
            >
                год
            </button>
        </div>
    </div>
</template>
