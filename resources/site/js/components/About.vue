<template>
<div class="container mt-5" id="about">
    <div class="row">
        <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-sky">
            <h3 class="text-center mb-0">About me:</h3>
        </div>
        <div class="col-12 col-xl-10">
            <div class="bg-white content pt-3">
              <div v-html="about.content"></div>
                <div class="d-flex justify-content-evenly p-3">
                    <a href="/download_cv" class="btn btn-primary rounded-0">Save my CV</a> <a
                        href="#contact" class="btn btn-success rounded-0 scrollto">Contact me</a>
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
  name: "About",
  setup() {
    const store = useStore();
    store.dispatch("getAbout");

    const about = computed(() => {
      return store.getters.about;
    });

    return {
      about,
    };
  },
  mounted() {
  },
  computed: {
  },
};
</script>
