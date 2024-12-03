<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Subscription from './Partials/Subscription.vue';
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
        <div class="m-auto w-1/2">
            <div class="m-4 bg-gray-400 p-6">
                <p>Заказ: {{ $page.props.offer.title }}</p>
                <p>id: {{ $page.props.offer.id }}</p>
                <p>от {{ $page.props.offer.advertiser.name }}</p>
                <p>ссылка: {{ $page.props.offer.url }}</p>
                <p>стоимость: {{ $page.props.offer.price }}</p>
                <p>тема: {{ $page.props.offer.theme.name }}</p>
                <p>
                    статус:
                    {{ $page.props.offer.active ? 'active' : 'not active' }}
                </p>
            </div>

            <div
                class="m-4 bg-gray-400 p-6"
                v-if="$page.props.auth.user.role.name == 'advertiser'"
            >
                <h2 class="m-4 text-lg">Подписки вебмастеров</h2>
                <p v-if="!$page.props.offer.subscriptions.length" class="m-4">
                    Подписок нет
                </p>
                <div
                    class="m-4 border-2 border-dotted p-4"
                    v-for="subscription in $page.props.offer.subscriptions"
                    :key="subscription.id"
                >
                    <Subscription
                        :offer="$page.props.offer"
                        :subscription="subscription"
                    />
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
                <Subscription
                    :offer="$page.props.offer"
                    :subscription="$page.props.offer.subscription[0]"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
