import { computed } from "vue"
import classNames from "classnames"

const breadcrumbDefaultClasses =
    "inline-flex items-center space-x-1 md:space-x-3"
const breadcrumbWrapperVariantClasses = {
    default: "flex",
    solid:
        "flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
}
export function useBreadcrumbClasses(props) {
    const breadcrumbClasses = computed(() => {
        return classNames(breadcrumbDefaultClasses)
    })
    const breadcrumbWrapperClasses = computed(() => {
        return classNames(
            breadcrumbWrapperVariantClasses[props.solid.value ? "solid" : "defauilt"]
        )
    })

    return {
        breadcrumbClasses,
        breadcrumbWrapperClasses
    }
}
