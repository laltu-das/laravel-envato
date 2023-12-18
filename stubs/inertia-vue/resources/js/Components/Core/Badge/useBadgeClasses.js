import { computed, useAttrs } from 'vue'
import { twMerge } from 'tailwind-merge'

const defaultBadgeClasses =
    "mr-2 px-2.5 py-0.5 rounded flex items-center justify-center"
const badgeLinkClasses =
    "bg-blue-100 hover:bg-blue-200 text-blue-800 dark:text-blue-800 dark:hover:bg-blue-300"
const onlyIconClasses = "p-1 rounded-full mr-2"

const badgeTextClasses = {
  default: "text-blue-800 dark:text-blue-800",
  dark: "text-gray-800 dark:bg-gray-700",
  red: "text-red-800 dark:text-red-900",
  green: "text-green-800 dark:text-green-900",
  yellow: "text-yellow-800 dark:text-yellow-900",
  indigo: "text-indigo-800 dark:text-indigo-900",
  purple: "text-purple-800 dark:text-purple-900",
  pink: "text-pink-800 dark:text-pink-900"
}

const badgeTypeClasses = {
  default: "bg-blue-100 dark:bg-blue-200",
  dark: "bg-gray-100 dark:bg-gray-700",
  red: "bg-red-100 dark:bg-red-200",
  green: "bg-green-100 dark:bg-green-200",
  yellow: "bg-yellow-100 dark:bg-yellow-200",
  indigo: "bg-indigo-100 dark:bg-indigo-200",
  purple: "bg-purple-100 dark:bg-purple-200",
  pink: "bg-pink-100 dark:bg-pink-200"
}

const badgeSizeClasses = {
  xs: "text-xs font-semibold",
  sm: "text-sm font-medium"
}

export function useBadgeClasses(props, options) {
  const attrs = useAttrs()
  const badgeClasses = computed(() => {
    return twMerge(
        badgeSizeClasses[props.size],
        props.href ? "" : badgeTypeClasses[props.type],
        props.href ? "" : badgeTextClasses[props.type],
        props.href ? badgeLinkClasses : "",
        options.isContentEmpty.value ? onlyIconClasses : defaultBadgeClasses,
        attrs.class
    )
  })
  return {
    badgeClasses
  }
}
