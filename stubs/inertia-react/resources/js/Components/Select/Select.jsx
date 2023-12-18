import { forwardRef } from "react"
import { twMerge } from "tailwind-merge"


import { HelperText } from "../HelperText"

export const Select = forwardRef(
    (
        {
            addon,
            children,
            className,
            color = "gray",
            helperText,
            icon: Icon,
            shadow,
            sizing = "md",
            theme: customTheme = {},
            ...props
        },
        ref
    ) => {
        const theme = mergeDeep(getTheme().select, customTheme)

        return (
            <div className={twMerge(theme.base, className)}>
                {addon && <span className={theme.addon}>{addon}</span>}
                <div className={theme.field.base}>
                    {Icon && (
                        <div className={theme.field.icon.base}>
                            <Icon className={theme.field.icon.svg} />
                        </div>
                    )}
                    <select
                        className={twMerge(
                            theme.field.select.base,
                            theme.field.select.colors[color],
                            theme.field.select.sizes[sizing],
                            theme.field.select.withIcon[Icon ? "on" : "off"],
                            theme.field.select.withAddon[addon ? "on" : "off"],
                            theme.field.select.withShadow[shadow ? "on" : "off"]
                        )}
                        {...props}
                        ref={ref}
                    >
                        {children}
                    </select>
                    {helperText && <HelperText color={color}>{helperText}</HelperText>}
                </div>
            </div>
        )
    }
)

Select.displayName = "Select"
