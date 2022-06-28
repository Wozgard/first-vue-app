<template>
    <headerApp />
    <mainApp v-bind:orders="orders" @order-select="checkingRadio" />
    <footerApp />
</template>

<script>
import headerApp from '@/components/headerApp';
import mainApp from '@/components/mainApp';
import footerApp from '@/components/footerApp';

export default {
    name: 'App',
    data() {
        return {
            orders: [
                { id: "photo", serviceName: "Обработка фото", select: true },
                { id: "video", serviceName: "Монтаж короткого ролика (до 5 минут)", select: false },
                { id: "photoSet", serviceName: "Фотосессия", select: false }
            ]
        }
    },
    methods: {
        checkingRadio(id) {
            this.orders.forEach(el => {
                if (el.id == id && !el.select) {
                    this.orders.forEach(it => {
                        it.select = false;
                    });
                    el.select = true;
                }
            });
        }
    },
    components: {
        headerApp,
        mainApp,
        footerApp
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
</style>
