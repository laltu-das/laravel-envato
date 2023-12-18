import { forwardRef } from "react"
import { twMerge } from "tailwind-merge"


import { HelperText } from "../HelperText"

export const Textarea = forwardRef(
    (
        {
            className,
            color = "gray",
            helperText,
            shadow,
            theme: customTheme = {},
            ...props
        },
        ref
    ) => {
        const theme = mergeDeep(getTheme().textarea, customTheme)

        return (
            <>
        <textarea
            ref={ref}
            className={twMerge(
                theme.base,
                theme.colors[color],
                theme.withShadow[shadow ? "on" : "off"],
                className
            )}
            {...props}
        />
                {helperText && <HelperText color={color}>{helperText}</HelperText>}
            </>
        )
    }
)

Textarea.displayName = "Textarea"
