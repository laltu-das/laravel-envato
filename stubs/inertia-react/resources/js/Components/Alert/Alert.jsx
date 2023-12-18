import { HiX } from "react-icons/hi"
import { twMerge } from "tailwind-merge"



export const Alert = ({
                        additionalContent,
                        children,
                        className,
                        color = "info",
                        icon: Icon,
                        onDismiss,
                        rounded = true,
                        theme: customTheme = {},
                        withBorderAccent,
                        ...props
                      }) => {
  const theme = mergeDeep(getTheme().alert, customTheme)

  return (
      <div
          className={twMerge(
              theme.base,
              theme.color[color],
              rounded && theme.rounded,
              withBorderAccent && theme.borderAccent,
              className
          )}
          role="alert"
          {...props}
      >
        <div className={theme.wrapper} data-testid="flowbite-alert-wrapper">
          {Icon && (
              <Icon className={theme.icon} data-testid="flowbite-alert-icon" />
          )}
          <div>{children}</div>
          {typeof onDismiss === "function" && (
              <button
                  aria-label="Dismiss"
                  className={twMerge(
                      theme.closeButton.base,
                      theme.closeButton.color[color]
                  )}
                  onClick={onDismiss}
                  type="button"
              >
                <HiX aria-hidden className={theme.closeButton.icon} />
              </button>
          )}
        </div>
        {additionalContent && <div>{additionalContent}</div>}
      </div>
  )
}

Alert.displayName = "Alert"
