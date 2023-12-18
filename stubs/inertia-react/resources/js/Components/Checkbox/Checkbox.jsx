import { forwardRef } from "react"
import { twMerge } from "tailwind-merge"



export const Checkbox = forwardRef(
    (
        { className, color = "default", theme: customTheme = {}, ...props },
        ref
    ) => {
        const theme = mergeDeep(getTheme().checkbox, customTheme)

        return (
            <input
                ref={ref}
                type="checkbox"
                className={twMerge(theme.root.base, theme.root.color[color], className)}
                {...props}
            />
        )
    }
)

Checkbox.displayName = "Checkbox"
