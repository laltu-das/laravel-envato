<script setup>
import { nanoid } from 'nanoid'
import { useAccordionState } from '@/Components/Core/Accordion/useAccordionState'

const props = withDefaults(defineProps(), {
  alwaysOpen: false,
  openFirstItem: true,
  flush: false,
})

const accordionId = nanoid()
useAccordionState(accordionId, { ...props })
</script>
<template>
    <div :data-accordion-id="accordionId">
        <slot />
    </div>
</template>
