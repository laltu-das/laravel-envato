<script setup>
import { toRefs } from "vue"
import { useProgressClasses } from "./useProgressClasses"

const props = defineProps({
    color: {
        type: String,
        default: "default"
    },
    label: {
        type: String,
        default: ""
    },
    labelPosition: {
        type: String,
        default: "none"
    },
    labelProgress: {
        type: Boolean,
        default: false
    },
    progress: {
        type: Number,
        default: 0
    },
    size: {
        type: String,
        default: "md"
    }
})

const { innerClasses, outerClasses, outsideLabelClasses } = useProgressClasses(
    toRefs(props)
)

</script>
<template>
    <div>
        <template v-if="label || (labelProgress && labelPosition === 'outside')">
            <div class="flex justify-between mb-1">
                <span class="text-base font-medium" :class="outsideLabelClasses">{{ label }}</span>
                <span v-if="labelProgress && labelPosition === 'outside'" class="text-sm font-medium" :class="outsideLabelClasses">{{ progress }}%</span>
            </div>
        </template>
        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700" :class="outerClasses">
            <div class="rounded-full font-medium text-blue-100 text-center p-0.5" :class="innerClasses" :style="{ width: progress + '%' }">
                <template v-if="labelProgress && labelPosition === 'inside'">
                    {{ progress }}%
                </template>
            </div>
        </div>
    </div>
</template>
