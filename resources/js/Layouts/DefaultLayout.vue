
<template>
    <Header />
    <div class="md:container mx-auto px-4 h-screen">
        <slot />
    </div>
    
    <!-- <the-footer /> -->
</template>

<script>
import Header from '@/includes/Header.vue';

export default {
    name: 'DefaultLayout',
    components: {
        Header,
    },
}
</script>