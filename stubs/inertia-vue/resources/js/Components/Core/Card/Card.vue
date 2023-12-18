<script setup>
import { computed, toRefs } from 'vue'
import { useCardsClasses } from './useCardClasses'

const props = defineProps({
  href: {
    type: String,
    default: '',
  },
  imgAlt: {
    type: String,
    default: '',
  },
  imgSrc: {
    type: String,
    default: '',
  },
  variant: {
    type: String,
    default: 'default',
  },
})

const { cardClasses, horizontalImageClasses } = useCardsClasses(toRefs(props))
const wrapperType = computed(() => props.href ? 'a' : 'div')

</script>
<template>
    <component :is="wrapperType" :href="href" :class="cardClasses">
        <img v-if="imgSrc" class="rounded-t-lg" :class="horizontalImageClasses" :src="imgSrc" :alt="imgAlt"/>
        <div>
            <slot />
        </div>
    </component>
</template>
