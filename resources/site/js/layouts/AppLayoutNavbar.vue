<template>
  <nav id="main-nav" class="navbar navbar-expand-lg sticky-top navbar-light">
    <div class="container">
      <a class="navbar-brand scrollto" href="#app">
        <div class="logo">
          <img :src="'storage/photos/' + profile.photo" class="img-fluid" />
        </div>
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav justify-content-center w-100 navbar-nav">
          <li
            v-for="menuItem in menuItems"
            :key="menuItem.section"
            class="nav-item"
          >
            <a
              :href="'#' + menuItem.section"
              class="nav-link scrollto"
              :class="{ active: activeSection === menuItem.section }"
              @click.prevent="handleMenuItemClick(menuItem.section)"
            >
              {{ menuItem.label }}
            </a>
          </li>
        </ul>
        <div class="dropdown">
          <div
            class="dropdown-toggle fs-2"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="bi bi-person-circle"></i>
          </div>
          <ul class="dropdown-menu fs-4">
            <li v-if="isAuthenticated">
              <a href="/admin" class="dropdown-item">Admin Panel</a>
            </li>
            <li v-else>
              <a href="/login" class="dropdown-item">Log in</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { computed, ref, onMounted, onBeforeUnmount } from "vue";
import { useStore } from "vuex";
export default {
  name: "AppLayoutNavbar",
  setup() {
    const isAuthenticated = ref(false);

    const checkAuthStatus = async () => {
      try {
        const response = await axios.get("/check-auth");
        isAuthenticated.value = response.data.authenticated;
      } catch (error) {
        console.error("Error checking authentication status:", error);
      }
    };

    const activeSection = ref("app");

    const menuItems = [
      { section: "app", label: "Home" },
      { section: "about", label: "About" },
      { section: "skills", label: "Skills" },
      { section: "experience", label: "Experience" },
      { section: "portfolio", label: "Portfolio" },
      { section: "contact", label: "Contact" },
    ];

    const scrollToSection = (section) => {
      const targetElement = document.getElementById(section);
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - getNavigationMenuHeight(),
          behavior: "smooth",
        });
      }
    };

    const getNavigationMenuHeight = () => {
      const navigationMenu = document.getElementById("main-nav");
      return navigationMenu ? navigationMenu.offsetHeight : 0;
    };

    const highlightMenu = () => {
      const scrollPosition = window.scrollY + getNavigationMenuHeight();
      for (const menuItem of menuItems) {
        const sectionElement = document.getElementById(menuItem.section);
        if (sectionElement) {
          const sectionTop = sectionElement.offsetTop - 80;
          if (scrollPosition >= sectionTop) {
            activeSection.value = menuItem.section;
          }
        }
      }
    };

    const handleMenuItemClick = (section) => {
      activeSection.value = section;
      scrollToSection(section);
    };

    onMounted(() => {
      checkAuthStatus();
      window.addEventListener("scroll", highlightMenu);
    });

    onBeforeUnmount(() => {
      window.removeEventListener("scroll", highlightMenu);
    });

    const store = useStore();
    store.dispatch("getProfile");

    const profile = computed(() => {
      return store.getters.profile;
    });

    return {
      profile,
      activeSection,
      menuItems,
      handleMenuItemClick,
      isAuthenticated,
    };
  },
};
</script>

<style lang="scss"></style>
