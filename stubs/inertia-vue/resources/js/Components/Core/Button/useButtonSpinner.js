import { computed } from "vue"

export function useButtonSpinner(props) {
    const btnSizeSpinnerSizeMap = {
        lg: "5",
        md: "4",
        sm: "3",
        xl: "6",
        xs: "2.5"
    }
    const size = computed(() => {
        return btnSizeSpinnerSizeMap[props.size.value]
    })
    const color = computed(() => {
        if (!props.outline.value) return "white"

        if (props.gradient.value) {
            if (props.gradient.value.includes("purple")) return "purple"
            else if (props.gradient.value.includes("blue")) return "blue"
            else if (props.gradient.value.includes("pink")) return "pink"
            else if (props.gradient.value.includes("red")) return "red"
            return "white"
        }

        if (["alternative", "dark", "light"].includes(props.color.value)) {
            return "white"
        } else if (props.color.value === "default") {
            return "blue"
        }
        return props.color.value
    })

    return {
        size,
        color
    }
}
