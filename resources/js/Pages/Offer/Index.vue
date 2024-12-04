<script setup>
import NavLink from '@/Components/NavLink.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Nav from './Partials/Nav.vue';
import DraggableOffers from './Partials/DraggableOffers.vue';

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
            <DraggableOffers
                v-model:offers="offers"
                v-model:subscriptions="subscriptions"
            />
        </div>
    </AuthenticatedLayout>
</template>
