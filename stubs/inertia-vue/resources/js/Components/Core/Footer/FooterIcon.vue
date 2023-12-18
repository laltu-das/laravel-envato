<script setup>
import { twMerge } from "tailwind-merge"
import { useAttrs } from "vue"
defineOptions({
    inheritAttrs: false
})
const attrs = useAttrs()
const props = withDefaults(defineProps(), {
    href: "",
    ariaLabel: "",
    srText: ""
})
const iconComponent = props.href ? "a" : "span"

const aClasses = twMerge(
    "text-gray-500 hover:text-gray-900 dark:hover:text-white",
    attrs.class
)

</script>

<template>
  <component v-bind="$attrs" :is="iconComponent" :href="href" :aria-label="ariaLabel" :class="aClasses">
    <slot />
    <span class="sr-only">{{ srText }}</span>
  </component>
</template>
