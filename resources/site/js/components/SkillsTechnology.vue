<template>
<div class="container mt-5" id="skills">
    <div class="row justify-content-evenly">
        <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-green">
            <h3 class="text-center mb-0">Skills & technology:</h3>
        </div>
        <div class="col-12 col-xl-10">
            <div class="row">
                    <div class="col-12 col-xl-4 skill-item-wrapper mb-3" v-for="skill in skills" :key="skill">
                        <div class="skill-item bg-white">
                            <h6>{{ skill.title }}</h6>
                            <div v-html="skill.content"></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { computed } from "vue";
import { useStore } from "vuex";
export default {
  name: "SkillsTechnology",
  setup() {
    const store = useStore();
    store.dispatch("getSkills");

    const skills = computed(() => {
      return store.getters.skills;
    });

    return {
      skills,
    };
  },
  mounted() {
  },
  computed: {
  },
};
</script>
