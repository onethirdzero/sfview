<template>
    <div>
        <nav>
        <div>
            <ul>
                <!-- The :to prop uses the route name. -->
                <router-link :to="{ name: 'welcome' }">Home</router-link>
                <router-link :to="{ name: 'page' }">Second Page</router-link>
            </ul>
        </div>
    </nav>
    <main>
        <!-- Display the current route here. -->
        <router-view></router-view>
    </main>
</div>
</template>
<script>
    export default {}
</script>
