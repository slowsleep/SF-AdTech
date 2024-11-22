<script setup>
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <div
            v-if="$page.props.auth.user.role.name == 'admin'"
            class="flex flex-row items-center"
        >
            <NavLink
                :href="route('admin.index')"
                :active="route().current('admin.index')"
            >
                Admin
            </NavLink>
            <NavLink
                :href="route('admin.users.index')"
                :active="route().current('admin.users.index', '')"
            >
                Users
            </NavLink>
        </div>
        <div v-else class="flex flex-row items-center">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
            >
                Dashboard
            </NavLink>
            <NavLink
                :href="route('offers.index')"
                :active="route().current('offers.index')"
            >
                {{
                    $page.props.auth.user.role.name == 'advertiser'
                        ? 'My offers'
                        : 'Offers'
                }}
            </NavLink>
            <div v-if="$page.props.auth.user.role.name == 'webmaster'">
                <p>Webmaster nav</p>
            </div>
            <div v-else-if="$page.props.auth.user.role.name == 'advertiser'">
                <p>Advertiser nav</p>
            </div>
        </div>
    </div>
</template>
