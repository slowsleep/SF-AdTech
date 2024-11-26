<script setup>
import NavLink from '@/Components/NavLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import Nav from './Partials/Nav.vue';

let offers = usePage().props.offers;
let subscriptions = usePage().props.subscriptions;

const destroy = (id) => {
    console.log('destroy', id);
    axios.delete(route('api.offers.destroy', id)).then((response) => {
        if (response.data.error) {
            console.log(response.data.message);
        } else {
            offers.forEach((item, index) => {
                if (item.id == id) {
                    offers.splice(index, 1);
                }
            });
        }
    });
};

const subscribe = (offer_id) => {
    console.log('subscribe');
    axios
        .post(route('api.offers.subscriptions.store'), { offer_id: offer_id })
        .then(() => {
            subscriptions.push(offer_id);
        });
};

const unsubscribe = (offer_id) => {
    console.log('unsubscribe');
    axios
        .delete(route('api.offers.subscriptions.destroy'), {
            data: {
                offer_id: offer_id,
            },
        })
        .then(() => {
            let offerIdIndex = subscriptions.indexOf(offer_id);
            subscriptions.splice(offerIdIndex, 1);
        });
};
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
                <Link :href="route('offers.show', offer.id)"
                    ><p>Заголовок: {{ offer.title }}</p></Link
                >

                <p v-if="$page.props.auth.user.role.name != 'advertiser'">
                    Рекламодатель: {{ offer.advertiser.name }}
                </p>

                <p>Цена: {{ offer.price }}</p>
                <p>Сайт: {{ offer.url }}</p>
                <p>Тема: {{ offer.theme.name }}</p>
                <p>Активность: {{ offer.active ? 'active' : 'not active' }}</p>
                <div v-if="$page.props.auth.user.role.name == 'advertiser'">
                    <Link :href="route('offers.edit', offer.id)">
                        <PrimaryButton>редактировать</PrimaryButton>
                    </Link>
                    <PrimaryButton @click="destroy(offer.id)">
                        удалить
                    </PrimaryButton>
                    <p>count: {{ offer.subscriptions_count }}</p>
                </div>
                <div v-else-if="$page.props.auth.user.role.name == 'webmaster'">
                    <PrimaryButton
                        v-if="subscriptions.includes(offer.id)"
                        @click="unsubscribe(offer.id)"
                    >
                        отписаться
                    </PrimaryButton>
                    <PrimaryButton v-else @click="subscribe(offer.id)">
                        подписаться
                    </PrimaryButton>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
