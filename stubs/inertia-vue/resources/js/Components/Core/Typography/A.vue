<script setup>
withDefaults(defineProps(), {
    href: "",
    color: "text-primary-600 dark:text-primary-500"
})

</script>
<template>
    <a :href="href" :class="[color, 'inline-flex items-center hover:underline']">
        <slot />
    </a>
</template>
