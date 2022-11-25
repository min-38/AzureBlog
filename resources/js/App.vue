<template>
    <div>
        <Layout>
            <router-view />
        </Layout>
    </div>
</template>

<script>
import Layout from '@/Layouts/DefaultLayout.vue';

export default {
    name: 'App',
    components: { Layout },
}
</script>
