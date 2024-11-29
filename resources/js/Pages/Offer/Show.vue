<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Statistics from './Partials/Statistics.vue';
</script>

<template>
    <Head
        :title="
            $page.props.auth.user.role.name == 'advertiser'
                ? 'My offers'
                : 'Offers'
        "
    />

    <AuthenticatedLayout>
        <div class="m-4 bg-gray-400 p-6">
            <p>Заказ: {{ $page.props.offer.title }}</p>
            <p>id: {{ $page.props.offer.id }}</p>
            <p>от {{ $page.props.offer.advertiser.name }}</p>
            <p>стоимость: {{ $page.props.offer.price }}</p>
            <p>тема: {{ $page.props.offer.theme.name }}</p>
            <p>
                статус:
                {{ $page.props.offer.is_active ? 'active' : 'not active' }}
            </p>
        </div>

        <div
            class="m-4 bg-gray-400 p-6"
            v-if="$page.props.auth.user.role.name == 'advertiser'"
        >
            <h2 class="m-4 text-lg">Подписки вебмастеров</h2>
            <div
                class="m-4 border-2 border-dotted p-4"
                v-for="subscription in $page.props.offer.subscriptions"
                :key="subscription.id"
            >
                <p>id {{ subscription.id }}</p>
                <p>offer_id {{ subscription.offer_id }}</p>
                <p>webmaster_id {{ subscription.webmaster_id }}</p>
                <p>ref_link_uuid {{ subscription.ref_link_uuid }}</p>
                <p>created_at {{ subscription.created_at }}</p>
                <div v-if="subscription.ref_log.length > 0">
                    <h2>Переходы</h2>
                    <div v-for="log in subscription.ref_log" :key="log.id">
                        <p>id: {{ log.id }}</p>
                        <p>created_at: {{ log.created_at }}</p>
                    </div>
                    <Statistics :id="subscription.id" />
                    <p>
                        Расходы:
                        {{
                            subscription.ref_log.length *
                            $page.props.offer.price
                        }}
                    </p>
                </div>
            </div>
        </div>

        <div
            class="m-4 bg-gray-400 p-6"
            v-else-if="
                $page.props.auth.user.role.name == 'webmaster' &&
                $page.props.offer.subscription[0]
            "
        >
            <h2 class="m-4 text-lg">Подписка на заказ</h2>
            <p>id {{ $page.props.offer.subscription[0].id }}</p>
            <p>offer_id {{ $page.props.offer.subscription[0].offer_id }}</p>
            <p>
                webmaster_id
                {{ $page.props.offer.subscription[0].webmaster_id }}
            </p>
            <p>
                ref_link_uuid
                {{ $page.props.offer.subscription[0].ref_link_uuid }}
            </p>
            <p>created_at {{ $page.props.offer.subscription[0].created_at }}</p>
            <p>
                ref_log length
                {{ $page.props.offer.subscription[0].ref_log.length }}
            </p>
            <div v-if="$page.props.offer.subscription[0].ref_log.length > 0">
                <h2>Переходы</h2>
                <div
                    v-for="log in $page.props.offer.subscription[0].ref_log"
                    :key="log.id"
                >
                    <p>id: {{ log.id }}</p>
                    <p>created_at: {{ log.created_at }}</p>
                </div>
            </div>
            <Statistics :id="$page.props.offer.subscription[0].id" />
            <h2 class="text-md m-3">
                Доход:
                {{
                    $page.props.offer.subscription[0].ref_log.length *
                    (0.8 * $page.props.offer.price)
                }}
            </h2>
        </div>
    </AuthenticatedLayout>
</template>
