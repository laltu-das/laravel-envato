import { twMerge } from "tailwind-merge"
import genericForwardRef from "../../helpers/generic-forward-ref"


import { Spinner } from "../Spinner"
import { ButtonBase } from "./ButtonBase"
import { ButtonGroup } from "./ButtonGroup"

const ButtonComponentFn = (
    {
        children,
        className,
        color = "info",
        disabled,
        fullSized,
        isProcessing = false,
        processingLabel = "Loading...",
        processingSpinner,
        gradientDuoTone,
        gradientMonochrome,
        label,
        outline = false,
        pill = false,
        positionInGroup = "none",
        size = "md",
        theme: customTheme = {},
        ...props
    },
    ref
) => {
    const { buttonGroup: groupTheme, button: buttonTheme } = getTheme()
    const theme = mergeDeep(buttonTheme, customTheme)

    const theirProps = props

    return (
        <ButtonBase
            ref={ref}
            disabled={disabled}
            className={twMerge(
                theme.base,
                disabled && theme.disabled,
                !gradientDuoTone && !gradientMonochrome && theme.color[color],
                gradientDuoTone &&
                !gradientMonochrome &&
                theme.gradientDuoTone[gradientDuoTone],
                !gradientDuoTone &&
                gradientMonochrome &&
                theme.gradient[gradientMonochrome],
                outline && (theme.outline.color[color] ?? theme.outline.color.default),
                theme.pill[pill ? "on" : "off"],
                fullSized && theme.fullSized,
                groupTheme.position[positionInGroup],
                className
            )}
            {...theirProps}
        >
      <span
          className={twMerge(
              theme.inner.base,
              theme.outline[outline ? "on" : "off"],
              theme.outline.pill[outline && pill ? "on" : "off"],
              theme.size[size],
              outline && !theme.outline.color[color] && theme.inner.outline,
              isProcessing && theme.isProcessing,
              isProcessing && theme.inner.isProcessingPadding[size],
              theme.inner.position[positionInGroup]
          )}
      >
        <>
          {isProcessing && (
              <span
                  className={twMerge(
                      theme.spinnerSlot,
                      theme.spinnerLeftPosition[size]
                  )}
              >
              {processingSpinner || <Spinner size={size} />}
            </span>
          )}
            {typeof children !== "undefined" ? (
                children
            ) : (
                <span
                    data-testid="flowbite-button-label"
                    className={twMerge(theme.label)}
                >
              {isProcessing ? processingLabel : label}
            </span>
            )}
        </>
      </span>
        </ButtonBase>
    )
}

ButtonComponentFn.displayName = "Button"

const ButtonComponent = genericForwardRef(ButtonComponentFn)

export const Button = Object.assign(ButtonComponent, {
    Group: ButtonGroup
})
