<script setup>
import NavLink from '@/Components/NavLink.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Nav from './Partials/Nav.vue';
import Offer from './Partials/Offer.vue';

let offers = usePage().props.offers;
let subscriptions = usePage().props.subscriptions;
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
        <template #header>
            <Nav />
        </template>

        <div class="mx-auto max-w-7xl">
            <NavLink
                :href="route('offers.create')"
                v-if="$page.props.auth.user.role.name == 'advertiser'"
            >
                <SecondaryButton class="m-2">Create</SecondaryButton>
            </NavLink>
            <div
                v-for="offer in offers"
                :key="offer.id"
                class="m-2 bg-gray-400 p-4"
            >
                <Offer
                    :offer="offer"
                    v-model:offers="offers"
                    v-model:subscriptions="subscriptions"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
