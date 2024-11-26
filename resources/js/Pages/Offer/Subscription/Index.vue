<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted } from 'vue';
import Nav from '../Partials/Nav.vue';

let subscriptions = usePage().props.subscriptions;
let hrefOrigin = '';

const unsubscribe = (offer_id) => {
    axios
        .delete(route('api.offers.subscriptions.destroy'), {
            data: {
                offer_id: offer_id,
            },
        })
        .then((response) => {
            console.log(response.data);
            subscriptions.map((item, index) => {
                if (item.offer_id == offer_id) {
                    subscriptions.splice(index, 1);
                }
            });
        })
        .catch((err) => console.error(err.response.data.errors));
};

onMounted(() => {
    hrefOrigin = window.location.origin;
    console.log(hrefOrigin);
});
</script>
<template>
    <Head title="Принятые заказы" />

    <AuthenticatedLayout>
        <template #header>
            <Nav />
        </template>
        <div
            v-for="subscription in subscriptions"
            :key="subscription.id"
            class="m-2 bg-gray-400 p-4"
        >
            <Link :href="route('offers.show', subscription.offer_id)"
                ><p>offer id: {{ subscription.offer_id }}</p></Link
            >
            <p>offer name: {{ subscription.offer.title }}</p>
            <p>
                offer ref link:
                <a
                    class="underline"
                    :href="hrefOrigin + '/r/' + subscription.ref_link_uuid"
                >
                    {{ hrefOrigin + '/r/' + subscription.ref_link_uuid }}
                </a>
            </p>
            <p>
                status:
                {{ subscription.offer.active ? 'active' : 'not active' }}
            </p>

            <PrimaryButton @click="unsubscribe(subscription.offer_id)">
                отписаться
            </PrimaryButton>
        </div>
    </AuthenticatedLayout>
</template>
