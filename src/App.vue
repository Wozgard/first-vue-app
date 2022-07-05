<template >
    <headerApp />
    <mainApp v-bind:offer="offer" v-bind:uncorText="uncorText" v-bind:user="user" v-bind:order="order" @offer-select="checkingRadio" @take-order="createUserAndOrder" @main-form-focused="ucorectRemoveFocused" />
    <footerApp />
</template>

<script>
import headerApp from '@/components/headerApp';
import mainApp from '@/components/mainApp';
import footerApp from '@/components/footerApp';
import phoneMask from '@/components/phoneMask';

export default {
    name: 'App',
    data() {
        return {
            offer: [
                { id: "photo", serviceName: "Обработка фото", select: true },
                { id: "video", serviceName: "Монтаж короткого ролика (до 5 минут)", select: false },
                { id: "photoSet", serviceName: "Фотосессия", select: false }
            ],
            user: {
                name: '',
                mail: '',
                phone: ''
            },
            order: {
                type: '',
                comment: ''
            },
            uncorText: 'Не корректно введено поле'
        }
    },
    methods: {
        checkingRadio(id) {
            const offer = this.offer;
            for (let i in offer) {
                let element = document.getElementById(offer[i].id);
                if (offer[i].id != id && element.hasAttribute('checked')) {
                    element.removeAttribute('checked');
                    element.parentElement.classList.remove('_active');
                }
                if (offer[i].id == id && !element.hasAttribute('checked')) {
                    element.setAttribute('checked', '');
                    element.parentElement.classList.add('_active');
                }
            }
            offer.forEach(el => {
                if (el.id == id && !el.select) {
                    offer.forEach(it => {
                        it.select = false;
                    });
                    el.select = true;
                }
            });
        },
        createUserAndOrder() {
            const offer = this.offer;
            const order = this.order;
            const user = this.user;

            /* Delete probels */
            for (let i in user) {
                user[i] = user[i].trim()
            }
            order.comment = order.comment.trim()

            /* Add type to order */
            for (let i in offer) {
                offer[i].select ? order.type = offer[i].id : null;
            }
            console.log(user)
            console.log(order)
            /* Checking filds */
            this.checkCorrectFilds()
        },
        checkCorrectFilds() {
            const order = this.order;
            const user = this.user;

            const formBody = document.querySelector('.main__form-body');
            const uncorTitle = document.querySelector('.uncorrect-title');

            let countUncor = 0;
            this.uncorText = 'Не корректно введено поле';

            if (user.name.length < 3) {
                countUncor++;
                uncorTitle.style.display = 'block';
                document.querySelector('[name = "userNmae"]').classList.add('_uncorrect');
            }
            if (!this.validateEmail(user.mail)) {
                countUncor++;
                if (countUncor > 1) { this.uncorText = 'Не корректно введены поля' }
                uncorTitle.style.display = 'block';
                document.querySelector('[name = "userMail"]').classList.add('_uncorrect');
            }
            if (user.phone.length < 13) {
                countUncor++;
                if (countUncor > 1) { this.uncorText = 'Не корректно введены поля' }
                uncorTitle.style.display = 'block';
                document.querySelector('[name = "userPhone"]').classList.add('_uncorrect');
            }
            console.log(countUncor)
        },
        ucorectRemoveFocused(element) {
            const form = document.forms.mainForm;
            const uncorTitle = document.querySelector('.uncorrect-title');

            if (element.classList.contains('_uncorrect')) {
                element.classList.remove('_uncorrect')
            }
            if (form.querySelectorAll('._uncorrect').length == 0) {
                uncorTitle.style.display = 'none';
            }
        },
        validateEmail(email) {
            const pattern = /^[\w]{1}[\w-\.]*@[\w-]+\.[a-z]{2,4}$/i;
            return pattern.test(email);
        }
    },
    mounted() {
        phoneMask.methods.macskedPhone()
    },
    components: {
        headerApp,
        mainApp,
        footerApp,
        phoneMask
    }
}
</script>

<style>
.container {
    width: 90vw;
    margin: 0 auto;
}

#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

.uncorrect-title {
    display: none;
    margin: -1rem 0 2rem;
    font-weight: 600;
    color: rgba(212, 42, 42, 0.85);
}

._uncorrect {
    background-color: rgba(212, 42, 42, 0.585);
}

._radioInput {
    cursor: pointer;
    position: relative;
    margin: 0px;
    transition: all 0.3s ease 0s;
    font-size: 16px;
    color: rgba(30, 37, 51, 0.75);
    padding-left: 30px;
}

._radioInput input {
    display: none;
}

._radioInput:not(:last-child) {
    padding-bottom: 15px;
}

._radioInput::after {
    position: absolute;
    left: 0;
    top: -2px;
    content: "";
    display: block;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background-color: #fff;
}

._radioInput::before {
    opacity: 0;
    visibility: hidden;
    position: absolute;
    left: 11.3px;
    top: 9px;
    content: "";
    display: block;
    width: 0px;
    height: 0px;
    border-radius: 50%;
    background-color: rgba(43, 92, 189, 0.75);
    transition: all 0.3s ease 0s;
    z-index: 2;
}

._radioInput._active {
    transition: all 0.3s ease 0s;
    font-weight: 600;
}

._radioInput._active::before {
    opacity: 1;
    visibility: visible;
    left: 4px;
    top: 2px;
    top: 2px;
    left: 4px;
    width: 14px;
    height: 14px;
    transition: all 0.3s ease 0s;
}
</style>
