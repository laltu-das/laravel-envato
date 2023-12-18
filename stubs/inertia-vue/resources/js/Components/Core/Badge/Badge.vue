<script setup>
import { computed, useSlots } from 'vue'
import { useBadgeClasses } from '@/Components/Core/Badge/useBadgeClasses'

const props = withDefaults(defineProps(), {
  type: 'default',
  size: 'xs',
  href: null,
})

const slots = useSlots()
const isContentEmpty = computed(() => !slots.default)
const wrapperType = computed(() => (props.href ? 'a' : 'span'))

const { badgeClasses } = useBadgeClasses(props, { isContentEmpty })
</script>
<template>
    <component :is="wrapperType" :class="badgeClasses" :href="href">
        <slot name="icon" />
        <slot name="default" />
    </component>
</template>
