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
            <p>статус: {{ $page.props.offer.is_active ? 'active' : 'not active' }}</p>
        </div>
    </AuthenticatedLayout>
</template>
