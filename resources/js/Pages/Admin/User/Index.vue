<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Nav from './Partials/Nav.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import axios from 'axios';

const users = usePage().props.users;

const userDeactivation = (id) => {
    axios
        .patch(route('api.users.update'), { id: id, active: false })
        .then((response) => {
            console.log(response);
            if (!response.data.error) {
                users.forEach((item) => {
                    if (item.id == id) {
                        item.active = false;
                    }
                });
            }
        });
};
const userActivation = (id) => {
    axios
        .patch(route('api.users.update'), { id: id, active: true })
        .then((response) => {
            console.log(response);
            if (!response.data.error) {
                users.forEach((item) => {
                    if (item.id == id) {
                        item.active = true;
                    }
                });
            }
        });
};
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
                <PrimaryButton
                    v-if="user.active"
                    class="m-2"
                    @click="userDeactivation(user.id)"
                    >отключить</PrimaryButton
                >
                <PrimaryButton
                    v-else
                    class="m-2"
                    @click="userActivation(user.id)"
                    >включить</PrimaryButton
                >
            </div>
        </div>
    </AuthenticatedLayout>
</template>
