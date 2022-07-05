<template>
    <li class="order-select__item _radioInput" @click="checkingInput">
        <input name="orderType" type="radio" class="" v-model="order.type">{{ item.serviceName }}
    </li>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true
        },
        order: Object
    },
    methods: {
        checkingInput(e) {
            /* const target = e.target
            const input = target.parentElement.querySelector('input')
            if (this.item.select && !input.hasAttribute('checked')) {
                console.log(this.item.select)
                input.setAttribute('checked', '');
            }
            if (!this.item.select && input.hasAttribute('checked')) {
                console.log(this.item.select)
                input.removeAttribute('checked');
            } */
            this.$emit('offer-select', this.item.id)
        },
        setForChecked(e) {
        }
    },
    mounted() {
        const target = this.$el;
        const input = target.querySelector('input');
        if (this.item.select) {
            input.setAttribute('checked', '');
            input.parentElement.classList.add('_active');
        }

        input.setAttribute('id', this.item.id);
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