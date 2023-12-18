import { computed } from "vue"
import classNames from "classnames"

const ratingSizeClasses = {
  sm: "w-5 h-5",
  md: "w-7 h-7",
  lg: "w-10 h-10"
}

export function useRatingClasses(props) {
  const sizeClasses = computed(() => {
    return classNames(ratingSizeClasses[props.size.value] ?? "")
  })

  return {
    sizeClasses
  }
}
