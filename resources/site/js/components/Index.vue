<template>
  <SiteHeader />
  <About />
  <Skills />
  <Experiences />
  <Projects />
  <ContactForm />
</template>

<script>
import SiteHeader from "./SiteHeader.vue";
import About from "./About.vue";
import Experiences from "./Experiences.vue";
import Projects from "./Projects.vue";
import Skills from "./SkillsTechnology.vue";
import ContactForm from "./ContactForm.vue";
export default {
  name: "Index",
  components: {
    SiteHeader,
    About,
    Experiences,
    Projects,
    Skills,
    ContactForm,
  },
};
</script>
