<script setup>
import NavLink from '@/Components/NavLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import axios from 'axios';

let offers = usePage().props.offers;

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

const subscribe = () => {
    console.log('subscribe');
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
            <div class="flex flex-row gap-5">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                >
                    {{
                        $page.props.auth.user.role.name == 'advertiser'
                            ? 'My offers'
                            : 'Offers'
                    }}
                </h2>
                <p
                    class="text-gray-700 dark:text-gray-400"
                    v-if="$page.props.auth.user.role.name == 'advertiser'"
                >
                    name: {{ $page.props.auth.user.advertiser.name }}
                </p>
                <p
                    class="text-gray-700 dark:text-gray-400"
                    v-if="$page.props.auth.user.role.name == 'webmaster'"
                >
                    site: {{ $page.props.auth.user.webmaster.site }}
                </p>
            </div>
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
                </div>
                <div v-else-if="$page.props.auth.user.role.name == 'webmaster'">
                    <PrimaryButton @click="subscribe">
                        подписаться
                    </PrimaryButton>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
