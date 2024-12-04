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
                class="m-2 flex flex-row bg-gray-400 p-4"
                v-if="$page.props.auth.user.role.name == 'advertiser'"
            >
                <div>
                    <h2 class="text-center text-lg">Активные заказы:</h2>
                    <template v-for="offer in offers" :key="offer.id">
                        <Offer
                            class="m-2 bg-green-700/20 p-4"
                            v-if="offer.active"
                            :offer="offer"
                            v-model:offers="offers"
                            v-model:subscriptions="subscriptions"
                        />
                    </template>
                </div>
                <div>
                    <h2 class="text-center text-lg">Неактивные заказы:</h2>
                    <template v-for="offer in offers" :key="offer.id">
                        <Offer
                            class="m-2 bg-red-800/20 p-4"
                            v-if="!offer.active"
                            :offer="offer"
                            v-model:offers="offers"
                            v-model:subscriptions="subscriptions"
                        />
                    </template>
                </div>
            </div>

            <div
                class="m-2 flex flex-row justify-between bg-gray-400 p-4"
                v-if="$page.props.auth.user.role.name == 'webmaster'"
            >
                <div
                    class="w-full border border-4 border-blue-900 bg-blue-900/30 p-3"
                >
                    <h2 class="text-center text-lg">Подписанные заказы</h2>
                    <template v-for="offer in offers" :key="offer.id">
                        <Offer
                            class="border-1 m-2 border border-blue-900 bg-blue-800/20 p-4"
                            v-if="subscriptions.includes(offer.id)"
                            :offer="offer"
                            v-model:offers="offers"
                            v-model:subscriptions="subscriptions"
                        />
                    </template>
                </div>
                <hr />
                <div
                    class="w-full border border-4 border-green-900 bg-green-900/30 p-3"
                >
                    <h2 class="text-center text-lg">Доступные заказы:</h2>
                    <template v-for="offer in offers" :key="offer.id">
                        <Offer
                            class="border-1 m-2 border border-green-900 bg-green-600/30 p-4"
                            v-if="!subscriptions.includes(offer.id)"
                            :offer="offer"
                            v-model:offers="offers"
                            v-model:subscriptions="subscriptions"
                        />
                    </template>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
