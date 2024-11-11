<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Nav from './Partials/Nav.vue';
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <Nav />
        </template>

        <div class="bg-gray-400 p-12">
            <div v-for="user in $page.props.users" :key="user.id">
                <p>{{ user.name }} - {{ user.email }} - {{ user.role.name }}</p>
                <p v-if="user.role.name === 'advertiser'">
                    <i>&emsp;name company: {{ user.advertiser.name ?? '' }}</i>
                </p>
                <p v-if="user.role.name === 'webmaster'">
                    <i>&emsp;site: {{ user.webmaster.site ?? '' }}</i>
                </p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
