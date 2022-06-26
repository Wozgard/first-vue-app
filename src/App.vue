<template>
    <headerApp />
    <mainApp v-bind:orders="orders" />
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
                { id: "photo", serviceName: "Обработка фото" },
                { id: "video", serviceName: "Монтаж короткого ролика (до 5 минут)" },
                { id: "photoSet", serviceName: "Фотосессия" }
            ]
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
    width: 80rem;
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
