<script setup>
import { computed } from "vue"
import { useTextareaClasses } from "./useTextareaClasses"

const props = withDefaults(defineProps(), {
    value: "",
    label: "Your message",
    rows: 4,
    custom: false,
    placeholder: "Write your message here..."
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

const {
    textareaClasses,
    labelClasses,
    wrapperClasses,
    footerClasses
} = useTextareaClasses(props.custom)

</script>
<template>
    <div>
        <div :class="labelClasses">{{ label }}</div>
        <div :class="wrapperClasses">
            <textarea v-model="model" :rows="rows" :class="textareaClasses" :placeholder="placeholder"></textarea>
            <div v-if="$slots.footer" :class="footerClasses">
                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>
