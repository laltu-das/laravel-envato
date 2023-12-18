import { inject } from "vue"
import { FLOWBITE_TOAST_INJECTION_KEY } from "@/Components/Core/Toast/config"

export function useToast() {
    const injection = inject(FLOWBITE_TOAST_INJECTION_KEY, null)
    if (injection === null)
        console.warn(
            "Cannot use useToast outside <toast-provider> component. Please wrap your component with <toast-provider>"
        )

    const add = toast => {
        if (!injection) return ""
        return injection?.add(toast)
    }

    const remove = id => {
        if (!injection) return false
        return injection?.remove(id)
    }

    const pop = () => {
        if (!injection) return ""
        return injection?.pop()
    }

    return {
        add,
        remove,
        pop
    }
}
