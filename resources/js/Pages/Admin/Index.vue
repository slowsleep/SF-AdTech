<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin" />

    <AuthenticatedLayout>
        <div class="bg-gray-400 p-12">
            <p>здесь информация только для админа</p>
        </div>
    </AuthenticatedLayout>
</template>
