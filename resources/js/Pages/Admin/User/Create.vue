<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import Nav from './Partials/Nav.vue';
import { ref, watch } from 'vue';

const form = useForm({
    name: '',
    email: '',
    role: '',
    site: '',
    nameCompany: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('admin.users.store'));
};

const showSite = ref(false);
const showNameCompany = ref(false);

const formRole = ref('');

watch(formRole, () => {
    form.role = formRole.value;
    if (formRole.value === 'advertiser') {
        showSite.value = false;
        showNameCompany.value = true;
        console.log('выбран Рекламодатель');
    } else if (formRole.value === 'webmaster') {
        showSite.value = true;
        showNameCompany.value = false;
        console.log('выбран Веб-мастер');
    }
});

watch(showSite, () => {
    console.log(showSite.value);
});
watch(showNameCompany, () => {
    console.log(showNameCompany.value);
});
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <Nav />
        </template>

        <div class="m-6 w-1/2 space-y-4 p-6 dark:bg-gray-800 mx-auto">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Создать пользователя</h2>
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="email"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4 flex flex-col text-gray-300">
                    <span>Роль</span>
                    <div class="flex flex-row gap-2">
                        <input
                            type="radio"
                            name="role"
                            id="advertiser"
                            v-model="formRole"
                            value="advertiser"
                            required
                        />
                        <label for="advertiser">Рекламодатель</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input
                            type="radio"
                            name="role"
                            id="webmaster"
                            v-model="formRole"
                            value="webmaster"
                            required
                        />
                        <label for="webmaster">Веб-мастер</label>
                    </div>
                </div>

                <div v-show="showNameCompany">
                    <InputLabel for="nameCompany" value="Name company" />

                    <TextInput
                        id="nameCompany"
                        type="text"
                        class="mt-1 block w-full"
                        :required="form.role === 'advertiser' ? true : null"
                        v-model="form.nameCompany"
                        autocomplete="site"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.nameCompany"
                    />
                </div>

                <div v-show="showSite">
                    <InputLabel for="site" value="Site" />

                    <TextInput
                        id="site"
                        type="text"
                        class="mt-1 block w-full"
                        :required="form.role === 'webmaster' ? true : null"
                        v-model="form.site"
                        autocomplete="site"
                    />

                    <InputError class="mt-2" :message="form.errors.site" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <button
                    class="mt-4 rounded bg-green-500 p-1 hover:bg-green-700"
                    type="submit"
                >
                    Submit
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
