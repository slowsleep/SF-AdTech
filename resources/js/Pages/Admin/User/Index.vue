<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <nav>
                <NavLink
                    :href="route('admin.users')"
                    :active="route().current('admin.users', '')"
                >
                    Пользователи
                </NavLink>
                <NavLink
                    :href="route('admin.users', 'advertiser')"
                    :active="route().current('admin.users', 'advertiser')"
                >
                    Рекламодатели
                </NavLink>
                <NavLink
                    :href="route('admin.users', 'webmaster')"
                    :active="route().current('admin.users', 'webmaster')"
                >
                    Веб-мастера
                </NavLink>
            </nav>
        </template>

        <div class="bg-gray-400 p-12">
            <div v-for="user in $page.props.users" :key="user.id">
                <p>{{ user.name }} - {{ user.email }} - {{ user.role.name }}</p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
