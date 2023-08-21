<template>
    <AppLayoutNavbar />
    <Index />
    <AppLayoutFooter />
</template>

<script>
import AppLayoutNavbar from './AppLayoutNavbar.vue';
import Index from '../components/Index.vue';
import AppLayoutFooter from "./AppLayoutFooter.vue";
export default {
  name: "AppLayout",
  components: {
    AppLayoutNavbar,
    Index,
    AppLayoutFooter,
  },
  props: {
    profile: Object,
  }
};
</script>
<style lang="scss">
</style>