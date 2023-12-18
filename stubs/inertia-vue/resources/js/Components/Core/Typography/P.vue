<script setup>

withDefaults(defineProps(), {
    height: "normal",
    color: "text-gray-900 dark:text-white",
    size: "",
    weight: "",
    whitespace: "",
    align: ""
})

const sizes = {
    xs: "text-xs",
    sm: "text-sm",
    base: "text-base",
    lg: "text-lg",
    xl: "text-xl"
}

const weights = {
    thin: "font-thin",
    extralight: "font-extralight",
    light: "font-light",
    normal: "font-normal",
    medium: "font-medium",
    semibold: "font-semibold",
    bold: "font-bold",
    extrabold: "font-extrabold",
    black: "font-black"
}

const aligns = {
    left: "text-left",
    center: "text-center",
    right: "text-right"
}

const heights = {
    normal: "leading-normal",
    relaxed: "leading-relaxed",
    loose: "leading-loose"
}

const whitespaces = {
    normal: "whitespace-normal",
    nowrap: "whitespace-nowrap",
    pre: "whitespace-pre",
    preline: "whitespace-pre-line",
    prewrap: "whitespace-pre-wrap"
}

</script>
<template>
    <p :class="[color, sizes[size], heights[height], weights[weight], whitespaces[whitespace], aligns[align]]">
        <slot />
    </p>
</template>
