<script setup>
const borderClasses =
    "pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700"
withDefaults(defineProps(), {
    border: false
})

</script>

<template>
  <div :class="border && borderClasses">
    <slot name="default" />
  </div>
</template>
