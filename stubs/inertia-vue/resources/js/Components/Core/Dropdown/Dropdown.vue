<script setup>
import { computed, ref, toRef } from 'vue'
import { useDropdownClasses } from './useDropdownClasses'
import Button from '../Button/Button.vue'
import { onClickOutside } from '@vueuse/core'

const visible = ref(false)
const onHide = () => (visible.value = false)
const onToggle = () => (visible.value = !visible.value)

const props = withDefaults(
  defineProps(),
  {
    placement: 'bottom',
    text: '',
    transition: '',
  },
)

const placementTransitionMap = {
  bottom: 'to-bottom',
  left: 'to-left',
  right: 'to-right',
  top: 'to-top',
}

const transitionName = computed(() => {
  if (props.transition === null) return placementTransitionMap[props.placement]
  return props.transition
})

const content = ref()
const wrapper = ref()

const { contentClasses, contentStyles } = useDropdownClasses({
  placement: toRef(props, 'placement'),
  visible,
  contentRef: content,
})

onClickOutside(wrapper, () => {
  if (!visible.value) return
  visible.value = false
})
</script>
<template>
    <div class="inline-flex relative" ref="wrapper">
        <div class="inline-flex items-center">
            <slot-listener @click="onToggle">
                <slot name="trigger">
                    <Button>
                        {{ text }}
                        <template #suffix>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </template>
                    </Button>
                </slot>
            </slot-listener>
        </div>
        <transition :name="transitionName">
            <div ref="content" v-if="visible" :style="contentStyles" :class="[contentClasses]">
                <slot-listener @click="onHide">
                    <slot />
                </slot-listener>
            </div>
        </transition>
    </div>
</template>
