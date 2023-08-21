<template>
  <div class="container mt-5" id="portfolio">
    <div class="row justify-content-evenly">
      <div class="col-12 col-xl-2 mb-3 mb-xl-0 section-title bg-sky">
        <h3 class="text-center mb-0">Portfolio:</h3>
      </div>
      <div class="col-12 col-xl-10">
        <div class="container portfolio pt-3 bg-white">
          <div class="row">
            <div class="col-12">
              <ul class="portfolio-filter ps-0">
                <li
                  class="filter"
                  :class="{ active: activeTag === '' }"
                  @click="filterProjects('')"
                >
                  All
                </li>
                <li
                  class="filter"
                  v-for="tag in tags"
                  :key="tag.name"
                  :class="{ active: activeTag === tag.name }"
                  @click="filterProjects(tag.name)"
                >
                  {{ tag.title }}
                </li>
              </ul>
              <div
                class="row portfolio-container"
                ref="gridContainer"
                :class="{ loaded: masonryInitialized }"
              >
                <div
                  v-for="project in filteredProjects"
                  :key="project.id"
                  class="col-12 col-sm-6 col-md-4 col-xl-3 mb-3 work"
                  :class="{ hidden: !masonryInitialized }"
                  :data-tags="project.tags.join(',')"
                >
                  <div
                    class="portfolio-item-content"
                    data-bs-toggle="modal"
                    :data-bs-target="'#' + project.domain.replace(/[-.]/g, '_')"
                  >
                    <img
                      :src="'/storage/projects/' + project.image_path"
                      class="img-fluid"
                      :alt="project.title"
                    />
                    <div class="portfolio-item-description p-2 text-center">
                      <h6 class="fw-bold">
                        {{ project.title }}, {{ project.creation_year }}
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      v-for="project in projects"
      :key="'modal-' + project.id"
      class="modal fade"
      :id="project.domain.replace(/[-.]/g, '_')"
      tabindex="-1"
      :aria-labelledby="project.domain.replace(/[-.]/g, '_') + 'Label'"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
      >
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5
              class="modal-title"
              :id="project.domain.replace(/[-.]/g, '_') + 'Label'"
            >
              {{ project.title }}, {{ project.creation_year }}
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="row modal-body">
            <div class="col-12 col-lg-3 project-gallery">
              <div
                :id="'carouselFor' + project.domain.replace(/[-.]/g, '_')"
                class="carousel slide"
                data-bs-ride="carousel"
              >
                <div class="carousel-inner">
                  <div
                    v-for="(media, index) in project.galleryMedia || []"
                    :key="media.id"
                    class="carousel-item"
                    :class="{ active: index === 0 }"
                  >
                    <img
                      :src="media.url"
                      class="d-block w-100"
                      :alt="project.title"
                    />
                  </div>
                </div>
                <button
                  v-if="project.galleryMedia.length > 1"
                  class="carousel-control-prev bg-dark"
                  type="button"
                  :data-bs-target="
                    '#carouselFor' + project.domain.replace(/[-.]/g, '_')
                  "
                  data-bs-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button
                  v-if="project.galleryMedia.length > 1"
                  class="carousel-control-next bg-dark"
                  type="button"
                  :data-bs-target="
                    '#carouselFor' + project.domain.replace(/[-.]/g, '_')
                  "
                  data-bs-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div class="col-12 col-lg-9">
              <div class="project-logo my-3 my-lg-0 text-center">
                <img
                  :src="'/storage/projects/' + project.logo_path"
                  class="img-fluid"
                  :alt="project.title + ' logo'"
                />
              </div>
              <div class="project-description">
                <div v-html="project.description"></div>
              </div>
              <div class="project-cost">
                <p>
                  <b
                    ><i
                      >Cost such us this project from:
                      {{ project.cost_from }} USD</i
                    ></b
                  >
                </p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-success rounded-0 btn-order-site"
            >
              Order such a site
            </button>
            <a
              v-if="!project.archived"
              :href="'//' + project.domain"
              type="button"
              class="btn btn-primary rounded-0"
              target="_blank"
            >
              Visit this site
            </a>
            <button
              type="button"
              class="btn btn-secondary rounded-0"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, ref, onMounted, onBeforeUnmount, nextTick } from "vue";
import { useStore } from "vuex";
import imagesLoaded from "imagesloaded";
import Masonry from "masonry-layout";

export default {
  name: "Projects",
  setup() {
    const store = useStore();
    store.dispatch("getProjects");
    store.dispatch("getTags");

    const projects = computed(() => {
      return store.getters.projects;
    });

    const tags = computed(() => {
      return store.getters.tags;
    });

    const masonryInstance = ref(null);
    const gridContainer = ref(null);
    let columnWidth = 0;
    const activeTag = ref("");
    const masonryInitialized = ref(false);

    function initializeMasonry() {
      imagesLoaded(gridContainer.value, () => {
        if (masonryInstance.value) {
          masonryInstance.value.destroy();
        }
        masonryInstance.value = new Masonry(gridContainer.value, {
          itemSelector: ".work",
          layoutMode: "masonry",
          columnWidth: getColumnWidth(),
        });

        masonryInitialized.value = true;
      });
    }

    function getColumnWidth() {
      const workElement = gridContainer.value.querySelector(".work");
      if (workElement) {
        return workElement.offsetWidth;
      }
      return 0;
    }

    function filterProjects(tag) {
      activeTag.value = tag;
      gridContainer.value.querySelectorAll(".work").forEach((workElement) => {
        workElement.classList.add("hidden");
      });
      nextTick(() => {
        initializeMasonry();
        gridContainer.value.querySelectorAll(".work").forEach((workElement) => {
          workElement.classList.remove("hidden");
        });
      });
    }

    const filteredProjects = computed(() => {
      if (!activeTag.value) {
        return projects.value;
      }
      return projects.value.filter((project) =>
        project.tags.includes(activeTag.value)
      );
    });

    onMounted(() => {
      gridContainer.value = document.querySelector(".portfolio-container");
      window.addEventListener("resize", updateColumnWidth);
      initializeMasonry();
    });

    onBeforeUnmount(() => {
      window.removeEventListener("resize", updateColumnWidth);
    });

    function updateColumnWidth() {
      if (masonryInstance.value) {
        masonryInstance.value.destroy();
      }
      initializeMasonry();
      columnWidth = document.querySelector(".work").offsetWidth;
      return columnWidth;
    }

    return {
      projects,
      tags,
      gridContainer,
      activeTag,
      filterProjects,
      filteredProjects,
      masonryInitialized,
    };
  },
};
</script>

<style scoped>
</style>
