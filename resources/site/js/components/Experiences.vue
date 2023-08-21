<template>
  <div class="container mt-5" id="experience">
    <div class="row justify-content-evenly">
      <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-yellow">
        <h3 class="text-center mb-0">Work experience:</h3>
      </div>
      <div class="col-12 col-xl-10">
        <div class="experience pt-3 bg-white">
          <ul class="timeline-1 text-black">
            <li class="event" v-for="experience in experiences" :key="experience" :data-date="experience.start_date + ' - ' + experience.end_date">
              <h4 class="mb-3">{{ experience.title }}</h4>
              <div v-html="experience.description"></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
export default {
  name: "Experiences",
  setup() {
    const store = useStore();
    store.dispatch("getExperiences");

    const experiences = computed(() => {
      return store.getters.experiences;
    });

    return {
      experiences,
    };
  },
  mounted() {
  },
  computed: {
  },
};
</script>
