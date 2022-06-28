<template>
    <footer class="footer">
        <a class="footer__link" href="https://vk.com/serebanua">Мой VK</a>
    </footer>
</template>

<style scoped>
.footer {
    margin-top: 6rem;
    padding: 2rem;
    background-color: rgba(230, 230, 222, 0.866);
}

.footer__link {
    position: relative;
    text-decoration: none;
    color: rgba(140, 143, 200, 0.866);
}

.footer__link::after {
    content: '';
    opacity: 0;
    visibility: hidden;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1.5px;
    transition: all 0.3s ease-in-out 0s;
    background-color: rgba(140, 143, 200, 0.866);
}

.footer__link:hover.footer__link::after {
    opacity: 1;
    visibility: visible;
}
</style>