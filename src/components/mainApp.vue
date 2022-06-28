<template>
    <main class="main">
        <div class="main__container container">
            <form class="main__form" action="">
                <div class="main__form-body">
                    <input placeholder="Ваше имя (как мне к вам обращаться)" class="main__text-input" type="text">
                    <input placeholder="Ваша почта" class="main__text-input" type="mail">
                    <input placeholder="Ваш номер телефона" class="main__text-input" type="phone">
                    <ul class="main__order-select order-select">
                        <orderItem v-for="item of orders" v-bind:item="item" v-on:order-select="checkingRadio" />
                    </ul>
                    <textarea placeholder="Ваш комментарий" cols="7" rows="5"></textarea>
                    <button type="submit" class="main__button">Отправить</button>
                </div>
                <div class="main__form-image"><img src="@/assets/WnXHTYM-3VM.jpg" alt="#"></div>
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
            this.$emit('order-select', id)
        }
    }

}
</script>

<style scoped>
.main {
    flex: 1 1 auto;
}

.main__form {
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 3rem;
    border-radius: 10px;
    background-color: rgba(209, 209, 199, 0.866);
}

.main__form-body {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
    width: 30rem;
}

.main__form-image {
    flex: 0 1 auto;
    margin: -3rem -3rem -3rem 3rem;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    width: 47rem;
    height: 100%;
    overflow: hidden;
}

.main__form-image img {
    margin-top: -3rem;
    width: 61.35rem;
    height: 41.65rem;
}

.main__text-input {
    width: 100%;
    height: 3rem;
    padding: 1.5rem;
    margin-bottom: 1rem;
    border-radius: 7px;
}

.order-select {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    margin: 1rem 0 2rem;
}

textarea {
    border-radius: 10px;
    padding: 1rem;
    max-width: 100%;
    max-height: 7rem;
    min-height: 7rem;
}

button {
    margin-top: 1.5rem;
    width: 100%;
    height: 3.5rem;
    background-color: #eee;
    border-radius: 5px;
    transition: all 0.3s ease-in-out 0s;
}

button:hover {
    background-color: #fff;
}

input {
    transition: all 0.3s ease-in-out 0s;
}
</style>