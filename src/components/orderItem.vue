<template>
    <li class="order-select__item form-check" v-on:click="$emit('order-select', item.id)">
        <input id="item.id" name="paymentMethod" v-if="item.select" checked type="radio" class="form-check-input">
        <input id="item.id" name="paymentMethod" v-else type="radio" class="form-check-input">
        <label class="form-check-label">{{ item.serviceName }}</label>
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

<style scoped>
.order-select__item {
    display: flex;
    align-items: center;
}

.order-select__item input {
    margin-right: 10px;
}

.order-select__item label {
    text-align: center;
    margin-bottom: -5px;
}

.form-check-label {
    cursor: pointer;
}
</style>