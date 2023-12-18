<script setup>import { computed, toRefs } from "vue"
import { useRangeClasses } from "./useRangeClasses"

const props = withDefaults(defineProps(), {
    modelValue: "50",
    label: "Range slider",
    disabled: false,
    min: "0",
    max: "100",
    size: "md",
    steps: "1"
})

const emit = defineEmits(["update:modelValue"])
const model = computed({
    get() {
        return props.modelValue
    },
    set(val) {
        emit("update:modelValue", val)
    }
})

const { rangeClasses, labelClasses } = useRangeClasses(toRefs(props))

</script>
<template>
    <div>
        <label for="default-range" :class="labelClasses">{{ label }}</label>
        <input :step="steps" v-model="model" :min="min" :max="max" :disabled="disabled" type="range" :class="rangeClasses">
    </div>
</template>
