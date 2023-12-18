<script setup>
import "floating-vue/dist/style.css"
import { computed } from "vue"
const props = withDefaults(defineProps(), {
    placement: "top",
    theme: "dark",
    trigger: "hover"
})
const theme = computed(() => {
    const themes = {
        light: "tooltip-light",
        dark: "tooltip-dark"
    }
    return themes[props.theme]
})

</script>
<template>
    <div class="flex items-start">
        <Tooltip :placement="placement" :triggers="[trigger]" :theme="theme" auto-hide>
            <slot name="trigger"></slot>
            <template #popper>
                <slot name="content"></slot>
            </template>
        </Tooltip>
    </div>
</template>
