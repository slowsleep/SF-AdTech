<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
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

                <h3>clicks: {{ subscription.tracking[0].clicks }}</h3>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
