<script setup>
import { usePage } from '@inertiajs/vue3';
import Statistics from './Statistics.vue';

const hrefOrigin = window.location.origin;

const props = defineProps({
    offer: {
        type: Object,
        required: true,
    },
    subscription: {
        type: Object,
        required: true,
    },
});
const user = usePage().props.auth.user;
</script>

<template>
    <p>id {{ props.subscription.id }}</p>
    <p>offer_id {{ props.subscription.offer_id }}</p>
    <p>webmaster_id {{ props.subscription.webmaster_id }}</p>
    <p>
        ref_link_uuid
        <a
            class="underline"
            :href="hrefOrigin + '/r/' + props.subscription.ref_link_uuid"
        >
            {{ props.subscription.ref_link_uuid }}
        </a>
    </p>
    <p>created_at {{ props.subscription.created_at }}</p>
    <p>
        ref_log length
        {{ props.subscription.ref_log.length }}
    </p>
    <div v-if="props.subscription.ref_log.length > 0">
        <h2>Переходы</h2>
        <Statistics :id="props.subscription.id" />
        <p v-if="user.role.name == 'advertiser'">
            Расходы:
            {{ props.subscription.ref_log.length * props.offer.price }}
        </p>
        <p v-else-if="user.role.name == 'webmaster'">
            Доход:
            {{ props.subscription.ref_log.length * (0.8 * props.offer.price) }}
        </p>
    </div>
</template>
