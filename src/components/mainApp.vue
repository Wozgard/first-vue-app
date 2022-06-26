<template>
    <main class="main">
        <div class="main__container container">
            <form class="main__form" action="">
                <input class="main__text-input" type="mail">
                <input class="main__text-input" type="phone">
                <ul class="main__order-select order-select my-10">
                    <orderItem v-for="item of orders" v-bind:item="item" v-on:order-select="checkingRadio" />
                </ul>
                <textarea cols="7" rows="5"></textarea>
            </form>
        </div>
    </main>

</template>

<script>
import orderItem from '@/components/orderItem';

export default {
    props: ['orders'],
    components: {
        orderItem
    },
    methods: {
        checkingRadio(id) {
            const element = document.querySelector(`#${id}`);
            element.hasAttribute('checked') ? element.removeAttribute('checked') : element.setAttribute('checked', '');
        }
    }

}
</script>

<style>
.main__form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 40px;
    border-radius: 20px;
    background-color: rgb(133, 169, 169, 0.4);
}

.main__text-input {
    width: 20rem;
    height: 3rem;
    margin-bottom: 1rem;
    border-radius: 7px;
}

.order-select {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    /*margin-bottom: 2rem;*/
}

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

textarea {
    border-radius: 10px;
    max-width: 25rem;
    max-height: 5rem;
    min-height: 5rem;
}

input {
    transition: all 0.3 ease-in-out 0s;
}
</style>