<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    offer: {
        type: Object,
    },
    class: {
        type: String,
    },
});

const offers = defineModel('offers');
const subscriptions = defineModel('subscriptions');

const subscriptionRefLink = ref({});
let showPreSubscribe = ref(true);
let showFormSubscribe = ref(false);
let showCancleSubscribe = ref(false);

const formSubscribe = useForm({
    id: props.offer.id,
    price: props.offer.price,
});

const destroy = (id) => {
    axios.delete(route('api.offers.destroy', id)).then((response) => {
        console.log(response.data.message);
        if (!response.data.error) {
            offers.value.forEach((item, index) => {
                if (item.id == id) {
                    offers.value.splice(index, 1);
                }
            });
        }
    });
};

const activation = (id) => {
    axios
        .patch(route('api.offers.update'), { id: id, active: true })
        .then((response) => {
            console.log(response.data.message);
            if (!response.data.error) {
                offers.value.forEach((item) => {
                    if (item.id == id) {
                        item.active = true;
                    }
                });
            }
        });
};

const deactivation = (id) => {
    axios
        .patch(route('api.offers.update'), { id: id, active: false })
        .then((response) => {
            console.log(response.data.message);
            if (!response.data.error) {
                offers.value.forEach((item) => {
                    if (item.id == id) {
                        item.active = false;
                    }
                });
            }
        });
};

const presubscribe = () => {
    showFormSubscribe.value = true;
    showCancleSubscribe.value = true;
    showPreSubscribe.value = false;
};

const cancleSubscribe = () => {
    showPreSubscribe.value = true;
    showFormSubscribe.value = false;
    showCancleSubscribe.value = false;
};

const subscribe = (offer_id) => {
    axios
        .post(route('api.offers.subscriptions.store'), formSubscribe)
        .then((response) => {
            if (!response.data.error) {
                subscriptions.value.push(offer_id);

                showPreSubscribe.value = false;
                showFormSubscribe.value = false;
                showCancleSubscribe.value = false;

                offers.value.forEach((item) => {
                    if (item.id == offer_id) {
                        item.price = formSubscribe.price;
                    }
                });

                let link = window.location.origin + '/r/' + response.data.data;
                subscriptionRefLink.value.innerHTML =
                    '<p>Ваша ссылка: <a href="' +
                    link +
                    '">' +
                    link +
                    '</a></p>';
            }
        });
};

const unsubscribe = (offer_id) => {
    axios
        .delete(route('api.offers.subscriptions.destroy'), {
            data: {
                offer_id: offer_id,
            },
        })
        .then(() => {
            let offerIdIndex = subscriptions.value.indexOf(offer_id);
            subscriptions.value.splice(offerIdIndex, 1);
            showPreSubscribe.value = true;
        });
};
</script>

<template>
    <div :class="props.class">
        <Link :href="route('offers.show', props.offer.id)">
            <p>Заголовок: {{ props.offer.title }}</p>
        </Link>

        <p v-if="$page.props.auth.user.role.name != 'advertiser'">
            Рекламодатель: {{ props.offer.advertiser.name }}
        </p>

        <p>Цена: {{ props.offer.price }}</p>
        <p>Сайт: {{ props.offer.url }}</p>
        <p>Тема: {{ props.offer.theme.name }}</p>
        <p>Активность: {{ props.offer.active ? 'active' : 'not active' }}</p>
        <div v-if="$page.props.auth.user.role.name == 'advertiser'">
            <Link :href="route('offers.edit', offer.id)">
                <PrimaryButton>редактировать</PrimaryButton>
            </Link>

            <PrimaryButton
                v-if="props.offer.active"
                @click="deactivation(props.offer.id)"
            >
                деактивировать
            </PrimaryButton>
            <PrimaryButton v-else @click="activation(props.offer.id)">
                активировать
            </PrimaryButton>

            <PrimaryButton @click="destroy(props.offer.id)"
                >удалить</PrimaryButton
            >
            <p>count: {{ props.offer.subscriptions_count }}</p>
        </div>
        <div v-else-if="$page.props.auth.user.role.name == 'webmaster'">
            <PrimaryButton
                v-if="subscriptions.includes(props.offer.id)"
                @click="unsubscribe(props.offer.id)"
            >
                отписаться
            </PrimaryButton>
            <PrimaryButton
                v-if="
                    !subscriptions.includes(props.offer.id) && showPreSubscribe
                "
                @click.prevent="presubscribe(props.offer.id)"
            >
                подписаться
            </PrimaryButton>
            <PrimaryButton
                v-else-if="showCancleSubscribe"
                @click.prevent="cancleSubscribe(props.offer.id)"
            >
                отмена
            </PrimaryButton>
        </div>

        <form
            v-if="showFormSubscribe"
            @submit.prevent="subscribe(props.offer.id)"
        >
            <input v-model="formSubscribe.price" type="number" step="0.01" />
            <PrimaryButton type="submit"> подписаться </PrimaryButton>
        </form>

        <div ref="subscriptionRefLink"></div>
    </div>
</template>
