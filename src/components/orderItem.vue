<template>
    <li class="order-select__item form-check">
        <input id={{item.id}} name="paymentMethod" checked type="radio" class="form-check-input">
        <label class="form-check-label" v-on:click="$emit('order-select', item.id)">{{ item.serviceName }}</label>
    </li>
    <!-- data-select={{item.id}} -->
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true
        }
    }
}
</script>