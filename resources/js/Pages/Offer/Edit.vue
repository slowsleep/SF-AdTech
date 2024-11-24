<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';

const offer = usePage().props.offer;
const form = useForm({
    id: offer.id,
    title: offer.title,
    price: offer.price.toString(),
    theme_id: offer.theme_id,
    active: offer.active,
});

const submit = () => {
    axios.patch(route('api.offers.update'), form).then((response) => {
        console.log(response);
    });
};

const activeChange = (event) => {
    form.active = event.target.checked;
};
</script>
<template>
    <Head title="Edit" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-row gap-5">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
                >
                    Edit
                </h2>
                <p class="text-gray-700 dark:text-gray-400">
                    name: {{ $page.props.auth.user.advertiser.name }}
                </p>
            </div>
        </template>

        <div class="bg-gray-500 p-5">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel>Title</InputLabel>
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        required
                        autofocus
                        autocomplete="title"
                    />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>
                <div>
                    <InputLabel>Price</InputLabel>
                    <input
                        class="mt-1 block w-full"
                        type="number"
                        step="0.01"
                        v-model="form.price"
                        required
                        autofocus
                        autocomplete="price"
                    />
                    <InputError class="mt-2" :message="form.errors.price" />
                </div>
                <div>
                    <InputLabel>Theme</InputLabel>
                    <select v-model="form.theme_id">
                        <option
                            v-for="theme in $page.props.themes"
                            :key="theme.id"
                            :value="theme.id"
                            :selected="form.id"
                        >
                            {{ theme.name }}
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.theme_id" />
                </div>
                <div>
                    <InputLabel>Active</InputLabel>
                    <input
                        id="active"
                        type="checkbox"
                        class="mt-1 block"
                        @change.prevent="(event) => activeChange(event)"
                        :checked="form.active"
                    />
                    <InputError class="mt-2" :message="form.errors.active" />
                </div>
                <button class="m-2 rounded bg-green-400 p-3" type="submit">
                    Save
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
