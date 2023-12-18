import { forwardRef } from "react"
import { twMerge } from "tailwind-merge"


import { HelperText } from "../HelperText"

export const TextInput = forwardRef(
    (
        {
            addon,
            className,
            color = "gray",
            helperText,
            icon: Icon,
            rightIcon: RightIcon,
            shadow,
            sizing = "md",
            theme: customTheme = {},
            ...props
        },
        ref
    ) => {
        const theme = mergeDeep(getTheme().textInput, customTheme)

        return (
            <>
                <div className={twMerge(theme.base, className)}>
                    {addon && <span className={theme.addon}>{addon}</span>}
                    <div className={theme.field.base}>
                        {Icon && (
                            <div className={theme.field.icon.base}>
                                <Icon className={theme.field.icon.svg} />
                            </div>
                        )}
                        {RightIcon && (
                            <div
                                data-testid="right-icon"
                                className={theme.field.rightIcon.base}
                            >
                                <RightIcon className={theme.field.rightIcon.svg} />
                            </div>
                        )}
                        <input
                            className={twMerge(
                                theme.field.input.base,
                                theme.field.input.colors[color],
                                theme.field.input.sizes[sizing],
                                theme.field.input.withIcon[Icon ? "on" : "off"],
                                theme.field.input.withRightIcon[RightIcon ? "on" : "off"],
                                theme.field.input.withAddon[addon ? "on" : "off"],
                                theme.field.input.withShadow[shadow ? "on" : "off"]
                            )}
                            {...props}
                            ref={ref}
                        />
                    </div>
                </div>
                {helperText && <HelperText color={color}>{helperText}</HelperText>}
            </>
        )
    }
)

TextInput.displayName = "TextInput"
