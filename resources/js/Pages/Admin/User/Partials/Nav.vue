<script setup>
import NavLink from '@/Components/NavLink.vue';

</script>

<template>
    <nav>
        <NavLink
            :href="route('admin.users.index', '')"
            :active="route().current('admin.users.index', '')"
        >
            Пользователи
        </NavLink>
        <NavLink
            :href="route('admin.users.index', 'advertiser')"
            :active="route().current('admin.users.index', 'advertiser')"
        >
            Рекламодатели
        </NavLink>
        <NavLink
            :href="route('admin.users.index', 'webmaster')"
            :active="route().current('admin.users.index', 'webmaster')"
        >
            Веб-мастера
        </NavLink>
        <NavLink
            :href="route('admin.users.create')"
            :active="route().current('admin.users.create')"
        >
            Создать пользователя
        </NavLink>
    </nav>
</template>
