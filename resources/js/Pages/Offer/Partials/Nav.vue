<script setup>
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <nav class="flex flex-row gap-5">
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
        <div
            class="flex flex-row gap-5"
            v-if="$page.props.auth.user.role.name == 'webmaster'"
        >
            <NavLink
                class="text-white"
                :href="route('offers.subscriptions.index')"
                :active="route().current('offers.subscriptions.index')"
            >
                Мои подписки
            </NavLink>
            <p class="text-gray-700 dark:text-gray-400">
                site: {{ $page.props.auth.user.webmaster.site }}
            </p>
        </div>
    </nav>
</template>
