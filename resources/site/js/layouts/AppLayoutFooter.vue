<template>
  <footer class="container-fluid mt-5">
    <div
      class="d-flex justify-content-center align-items-center text-white h-100"
    >
      <span
        >&copy; 2012 - {{ currentYear }}: {{ appName }}. All rights
        reserved.</span
      >
    </div>
  </footer>
  <div
    class="scroll-to-top fs-1"
    @click="scrollToTop"
    v-show="showScrollToTopButton"
  >
    <div class="scroll-top-btn d-flex align-items-center justify-content-center">
      <i class="bi bi-arrow-up-short"></i>
    </div>
  </div>
</template>
<script>
export default {
  name: "AppLayoutFooter",
  data() {
    return {
      appName: "Volodymyr Buynov",
      showScrollToTopButton: false,
    };
  },
  methods: {
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
    handleScroll() {
      if (window.scrollY >= 400) {
        this.showScrollToTopButton = true;
      } else {
        this.showScrollToTopButton = false;
      }
    },
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  computed: {
    currentYear() {
      return new Date().getFullYear();
    },
  },
};
</script>
<style lang="scss" scoped>
.scroll-to-top {
  position: fixed;
  bottom: 90px;
  right: 20px;
  cursor: pointer;
  color: #ffffff;
  background: #6776f4;
  opacity: 0.7;
  transition: opacity 0.3s;
}

.scroll-top-btn {
  height: 36px;
}

.scroll-to-top:hover {
  opacity: 1;
}
</style>
