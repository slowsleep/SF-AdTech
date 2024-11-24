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
            <p>{{ $page.props.offer.id }}</p>
            <p>{{ $page.props.offer.title }}</p>
            <p>{{ $page.props.offer.price }}</p>
            <p>{{ $page.props.offer.theme.name }}</p>
        </div>
    </AuthenticatedLayout>
</template>
