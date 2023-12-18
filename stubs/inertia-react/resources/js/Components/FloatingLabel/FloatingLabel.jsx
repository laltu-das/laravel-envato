import { forwardRef, useId } from "react"
import { twMerge } from "tailwind-merge"

export const FloatingLabel = forwardRef(
    (
        {
            label,
            helperText,
            color = "default",
            sizing = "md",
            variant,
            disabled = false,
            theme: customTheme = {},
            className,
            ...props
        },
        ref
    ) => {
        const randomId = useId()
        const theme = mergeDeep(getTheme().floatingLabel, customTheme)

        return (
            <div>
                <div
                    className={twMerge("relative", variant === "standard" ? "z-0" : "")}
                >
                    <input
                        type="text"
                        id={props.id ? props.id : "floatingLabel" + randomId}
                        aria-describedby="outlined_success_help"
                        className={twMerge(theme.input[color][variant][sizing], className)}
                        placeholder=" "
                        data-testid="floating-label"
                        disabled={disabled}
                        {...props}
                        ref={ref}
                    />
                    <label
                        htmlFor={props.id ? props.id : "floatingLabel" + randomId}
                        className={twMerge(theme.label[color][variant][sizing], className)}
                    >
                        {label}
                    </label>
                </div>
                <p
                    id={"outlined_helper_text" + randomId}
                    className={twMerge(theme.helperText[color], className)}
                >
                    {helperText}
                </p>
            </div>
        )
    }
)

FloatingLabel.displayName = "FloatingLabel"
