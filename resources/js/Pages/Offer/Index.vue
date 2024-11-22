<script setup>
import NavLink from '@/Components/NavLink.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
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
                <p class="text-gray-700 dark:text-gray-400">name: {{ $page.props.auth.user.advertiser.name }}</p>
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
                v-for="offer in $page.props.offers"
                :key="offer.id"
                class="m-2 bg-gray-400 p-4"
            >
                <p>Заголовок: {{ offer.title }}</p>

                <p v-if="$page.props.auth.user.role.name != 'advertiser'">
                    Рекламодатель: {{ offer.advertiser.name }}
                </p>

                <p>Цена: {{ offer.price }}</p>
                <p>Сайт: {{ offer.url }}</p>
                <p>Тема: {{ offer.theme.name }}</p>
                <p>Активность: {{ offer.active ? 'active' : 'not active' }}</p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
