<template>
  <div>
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>&nbsp;{{ title }}
    </div>
  </div>
</template>

<script>
export default {
  name: "Loading",
  props: {
    title: String,
  },
};
</script>

<style lang="scss" scoped></style>
