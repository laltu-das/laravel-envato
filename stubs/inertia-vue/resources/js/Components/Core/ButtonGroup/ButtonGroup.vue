<template>
  <div class="btn-group inline-flex rounded-md shadow-sm" role="group">
   <slot />
  </div>
</template>

<style scoped>
.btn-group > button {
  @apply rounded-none;
}
.btn-group > button:first-child {
  @apply rounded-l-lg;
}
.btn-group > button:last-child {
  @apply rounded-r-lg;
}
</style>
