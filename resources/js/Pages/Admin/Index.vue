<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';
import { Doughnut } from 'vue-chartjs';

ChartJS.register(ArcElement, Tooltip, Legend);

const offerPriceRefs = usePage().props.offerPriceRefs;

const randHexColor = () => {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
};

const colors = [...Array.from({length: offerPriceRefs.length}, () => randHexColor())];
const data = {
    labels: offerPriceRefs.map((item) => item.title),
    datasets: [
        {
            backgroundColor: colors,
            data: offerPriceRefs.map((item) => item.price * 0.2 * item.ref_log_count),
        },
    ],
};
const options = {
    responsive: true,
    maintainAspectRatio: true,
};
</script>

<template>
    <Head title="Admin" />

    <AuthenticatedLayout>
        <div class="flex flex-row justify-around bg-gray-400 p-12">
            <div v-if="$page.props.offerPriceRefs">
                <p>
                    Общий доход системы:
                    {{
                        $page.props.offerPriceRefs.reduce(
                            (acc, cur) =>
                                acc + cur.price * 0.2 * cur.ref_log_count,
                            0,
                        )
                    }}
                </p>
                <Doughnut :data="data" :options="options" />
                <div
                    v-for="offer in $page.props.offerPriceRefs"
                    :key="offer.id"
                    class="m-4 border-2 border-dotted p-4"
                >
                    <p>subscription id: {{ offer.id }}</p>
                    <p>
                        <a
                            class="underline"
                            :href="route('offers.show', offer.offer_id)"
                            >offer id: {{ offer.offer_id }}</a
                        >
                    </p>
                    <p>offer title: {{ offer.title }}</p>
                    <p>стоимость: {{ offer.price }}</p>
                    <p>количество переходов: {{ offer.ref_log_count }}</p>
                    <p>доход: {{ offer.price * 0.2 * offer.ref_log_count }}</p>
                </div>
            </div>
            <div v-if="$page.props.statistics">
                <h2>Статистика</h2>
                <p>
                    Количество реферальных ссылок:
                    {{ $page.props.statistics.count_ref }}
                </p>
                <hr />
                <p>
                    Количество переходов:
                    {{ $page.props.statistics.redirects }}
                </p>
                <hr />
                <p>
                    Количество отказов: {{ $page.props.statistics.rejections }}
                </p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
