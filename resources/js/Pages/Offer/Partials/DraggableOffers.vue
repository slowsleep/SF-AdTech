<script setup>
import axios from 'axios';
import Offer from './Offer.vue';
import { ref } from 'vue';

const offers = defineModel('offers');
const subscriptions = defineModel('subscriptions');

let draggedOfferId = ref(null);
let offerOldStatus = ref(null);

const onDragStart = (offerId, oldStatus) => {
    draggedOfferId.value = offerId;
    offerOldStatus.value = oldStatus;
};
const onDrop = async (event) => {
    const newStatus = event.currentTarget.id; // "active", "inactive", "subscribed", "available"
    if (offerOldStatus.value === newStatus) {
        return;
    }
    await updateOfferStatus(draggedOfferId.value, newStatus);
};
const updateOfferStatus = async (offerId, newStatus) => {
    try {
        if (newStatus === 'subscribed') {
            axios.post(route('api.offers.subscriptions.store'), {
                id: offerId,
            });
        } else if (newStatus === 'available') {
            axios.delete(route('api.offers.subscriptions.destroy'), {
                data: {
                    offer_id: offerId,
                },
            });
        } else if (newStatus === 'active') {
            axios.patch(route('api.offers.update'), {
                id: offerId,
                active: true,
            });
        } else if (newStatus === 'inactive') {
            axios.patch(route('api.offers.update'), {
                id: offerId,
                active: false,
            });
        }

        moveOfferToStatus(offerId, newStatus);
    } catch (error) {
        console.error('Ошибка:', error);
    }
};
const moveOfferToStatus = (offerId, newStatus) => {
    if (newStatus === 'subscribed') {
        subscriptions.value.push(offerId);
    } else if (newStatus === 'available') {
        subscriptions.value.forEach((item, index) => {
            if (item == offerId) {
                subscriptions.value.splice(index, 1);
            }
        });
    } else if (newStatus === 'active') {
        const offer = offers.value.find((offer) => offer.id === offerId);
        offer.active = true;
    } else if (newStatus === 'inactive') {
        const offer = offers.value.find((offer) => offer.id === offerId);
        offer.active = false;
    }
};
</script>

<template>
    <div
        class="m-2 flex flex-row bg-gray-400 p-4"
        v-if="$page.props.auth.user.role.name == 'advertiser'"
    >
        <div id="active" @drop="onDrop" @dragover.prevent>
            <h2 class="text-center text-lg">Активные заказы:</h2>
            <template v-for="offer in offers" :key="offer.id">
                <Offer
                    class="m-2 cursor-pointer bg-green-700/20 p-4"
                    v-if="offer.active"
                    :offer="offer"
                    v-model:offers="offers"
                    v-model:subscriptions="subscriptions"
                    draggable="true"
                    @dragstart="onDragStart(offer.id, 'active')"
                />
            </template>
        </div>
        <div id="inactive" @drop="onDrop" @dragover.prevent>
            <h2 class="text-center text-lg">Неактивные заказы:</h2>
            <template v-for="offer in offers" :key="offer.id">
                <Offer
                    class="m-2 cursor-pointer bg-red-800/20 p-4"
                    v-if="!offer.active"
                    :offer="offer"
                    v-model:offers="offers"
                    v-model:subscriptions="subscriptions"
                    draggable="true"
                    @dragstart="onDragStart(offer.id, 'inactive')"
                />
            </template>
        </div>
    </div>

    <div
        class="m-2 flex flex-row justify-between bg-gray-400 p-4"
        v-if="$page.props.auth.user.role.name == 'webmaster'"
    >
        <div
            id="subscribed"
            @drop="onDrop"
            @dragover.prevent
            class="w-full border border-4 border-blue-900 bg-blue-900/30 p-3"
        >
            <h2 class="text-center text-lg">Подписанные заказы</h2>
            <template v-for="offer in offers" :key="offer.id">
                <Offer
                    class="border-1 draggable m-2 cursor-pointer border border-blue-900 bg-blue-800/20 p-4"
                    v-if="subscriptions.includes(offer.id)"
                    :offer="offer"
                    v-model:offers="offers"
                    v-model:subscriptions="subscriptions"
                    draggable="true"
                    @dragstart="onDragStart(offer.id, 'subscribed')"
                />
            </template>
        </div>
        <hr />
        <div
            id="available"
            @drop="onDrop"
            @dragover.prevent
            class="w-full border border-4 border-green-900 bg-green-900/30 p-3"
        >
            <h2 class="text-center text-lg">Доступные заказы:</h2>
            <template v-for="offer in offers" :key="offer.id">
                <Offer
                    class="border-1 m-2 cursor-pointer border border-green-900 bg-green-600/30 p-4"
                    v-if="!subscriptions.includes(offer.id)"
                    :offer="offer"
                    v-model:offers="offers"
                    v-model:subscriptions="subscriptions"
                    draggable="true"
                    @dragstart="onDragStart(offer.id, 'available')"
                />
            </template>
        </div>
    </div>
</template>
