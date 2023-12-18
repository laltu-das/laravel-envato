import { computed, nextTick, ref, watch } from "vue"
import classNames from "classnames"

const defaultDropdownClasses =
    "absolute z-10 bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700"

const defaultGapInPx = 8

const placementDropdownClasses = {
    bottom: "",
    left: "top-0",
    right: "top-0",
    top: ""
}

const placementCalculators = {
    bottom(rect) {
        return `bottom: -${rect.height + defaultGapInPx}px;`
    },
    left(rect) {
        return `left: -${rect.width + defaultGapInPx}px;`
    },
    right(rect) {
        return `right: -${rect.width + defaultGapInPx}px;`
    },
    top(rect) {
        return `top: -${rect.height + defaultGapInPx}px;`
    }
}

export function useDropdownClasses(props) {
    watch(props.visible, value => {
        if (value) nextTick(() => calculatePlacementClasses())
    })

    const placementStyles = ref("")

    const calculatePlacementClasses = () => {
        const boundingRect = props.contentRef.value?.getBoundingClientRect()
        if (!boundingRect) return (placementStyles.value = "")
        placementStyles.value = placementCalculators[props.placement.value](
            boundingRect
        )
    }

    const contentClasses = computed(() => {
        return classNames(
            defaultDropdownClasses,
            placementDropdownClasses[props.placement.value]
        )
    })

    return {
        contentClasses,
        contentStyles: placementStyles
    }
}
