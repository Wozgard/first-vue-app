<template>
    <header class="header">
        <div class="header__container container">
            <div class="header__body">
                <div class="header__logo">
                    <img src="@/assets/Web/icons8-закладка-лента-dotted-32.png" alt="#">
                </div>
                <nav class="header__nav nav">
                    <ul class="nav__list">
                        <li class="nav__item"><a v-on:click.prevent="goToPageBlock">Main</a></li>
                        <li class="nav__item"><a v-on:click.prevent="goToPageBlock">About</a></li>
                        <li class="nav__item"><a v-on:click.prevent="goToPageBlock">Work examples</a></li>
                        <li class="nav__item"><a v-on:click.prevent="goToPageBlock">Prices</a></li>
                        <li class="nav__item _current"><a v-on:click.prevent="goToPageBlock">Order</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</template>

<script>
</script>

<style>
header {
    position: relative;
    padding: 2rem;
    background-color: rgba(216, 216, 209, 0.866);
    margin-bottom: 3rem;
}

.header__body {
    display: flex;
    justify-content: space-between;
}

.nav {
    flex: 1 1 auto;
    display: flex;
    align-items: center;
    margin-left: 18rem;
}

.nav__list {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav__item {
    transition: all 0.3s ease-in-out 0s;
}

.nav__item::after {
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

.nav__item:hover {
    color: rgba(140, 143, 200, 0.866);
}

.nav__item:hover.nav__item::after {
    opacity: 1;
    visibility: visible;
}

._current {
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    color: rgba(140, 143, 200, 0.866);
}

._current::after {
    opacity: 1;
    visibility: visible;
}
</style>