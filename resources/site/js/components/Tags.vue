<template>Tags</template>

<script>
export default {
  name: "Tags",
  data() {
    return {
      tags: [],
    };
  },
  mounted() {
    this.fetchTags();
  },
  methods: {
    async fetchTags() {
      const response = await fetch('/api/tags');
      this.tags = await response.json();
    },
  },
};
</script>
