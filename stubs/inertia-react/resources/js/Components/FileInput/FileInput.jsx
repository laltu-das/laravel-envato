import { forwardRef } from "react"
import { twMerge } from "tailwind-merge"


import { HelperText } from "../HelperText"

export const FileInput = forwardRef(
    (
        {
            className,
            color = "gray",
            helperText,
            sizing = "md",
            theme: customTheme = {},
            ...props
        },
        ref
    ) => {
        const theme = mergeDeep(getTheme().fileInput, customTheme)

        return (
            <>
                <div className={twMerge(theme.root.base, className)}>
                    <div className={theme.field.base}>
                        <input
                            className={twMerge(
                                theme.field.input.base,
                                theme.field.input.colors[color],
                                theme.field.input.sizes[sizing]
                            )}
                            {...props}
                            type="file"
                            ref={ref}
                        />
                    </div>
                </div>
                {helperText && <HelperText color={color}>{helperText}</HelperText>}
            </>
        )
    }
)

FileInput.displayName = "FileInput"
