<template>
    <main class="main">
        <div class="main__container container">
            <form class="main__form" name="mainForm" action="" id="order" @submit.prevent="$emit('take-order')">
                <div class="main__form-body">
                    <h5 class="main__uncorrect uncorrect-title">{{ uncorText }}</h5>
                    <input @focus="formFocused" placeholder="Ваше имя (как мне к Вам обращаться)" class="main__text-input" type="text" name="userNmae" v-model="user.name">
                    <input @focus="formFocused" placeholder="Ваша почта" class="main__text-input" type="mail" name="userMail" v-model="user.mail">
                    <input @focus="formFocused" placeholder="Ваш номер телефона" class="main__text-input tel" type="phone" name="userPhone" v-model="user.phone">
                    <ul class="main__order-select order-select">
                        <orderItem v-for="item of offer" v-bind:item="item" @offer-select="checkingRadio" v-bind:order="order" />
                    </ul>
                    <textarea placeholder="Ваш комментарий (не обязательно)" cols="7" rows="5" name="orderComment" v-model="order.comment"></textarea>
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
    props: {
        offer: Array,
        order: Object,
        user: Object,
        uncorText: String
    },
    components: {
        orderItem
    },
    methods: {
        checkingRadio(id) {
            this.$emit('offer-select', id)
        },
        findUncorrect() {
            const uncor = document.querySelectorAll('._uncorrect');
            if (uncor.length > 0) {
                return true
            } else {
                return false
            }
        },
        formFocused(e) {
            this.$emit('main-form-focused', e.target)
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
    margin-top: -1rem;
    width: 63.35rem;
    height: 44.15rem;
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