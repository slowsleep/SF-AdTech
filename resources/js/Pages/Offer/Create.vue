<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';
import { onMounted } from 'vue';

const form = useForm({
    title: '',
    price: '',
    url: '',
    theme_id: '',
});

onMounted(() => {
    let divInfoSuccess = document.querySelector('#infoSuccess');
    console.log(divInfoSuccess);
    divInfoSuccess.style.display = 'none';
});

const submit = () => {
    axios.post(route('api.offers.store'), form).then((response) => {
        if (response.data.error) {
            console.log(response.data.message);
        } else {
            console.log(response.data);

            let divInfoSuccess = document.querySelector('#infoSuccess');
            divInfoSuccess.style.display = 'block';

            setTimeout(() => {
                console.log('a');
                divInfoSuccess.style.display = 'none';
            }, 5000);
        }
    });
};
</script>

<template>
    <Head title="Create offer" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Create offer
            </h2>
        </template>

        <div class="bg-green-200 p-5" id="infoSuccess">
            <p>Заказ успешно создан</p>
        </div>

        <div class="mx-auto my-4 max-w-5xl bg-gray-800 p-2">
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
                    <TextInput
                        id="price"
                        type="number"
                        step="0.01"
                        class="mt-1 block w-full"
                        v-model="form.price"
                        required
                        autofocus
                        autocomplete="price"
                    />

                    <InputError class="mt-2" :message="form.errors.price" />
                </div>

                <div>
                    <InputLabel>Url</InputLabel>
                    <TextInput
                        id="url"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.url"
                        required
                        autofocus
                        autocomplete="url"
                    />

                    <InputError class="mt-2" :message="form.errors.url" />
                </div>

                <div>
                    <InputLabel>Theme</InputLabel>
                    <select v-model="form.theme_id">
                        <option
                            v-for="theme in $page.props.themes"
                            :key="theme.id"
                            :value="theme.id"
                        >
                            {{ theme.name }}
                        </option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.theme_id" />
                </div>

                <button
                    type="submit"
                    class="mt-4 rounded bg-blue-500 px-4 py-2"
                >
                    Save
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
