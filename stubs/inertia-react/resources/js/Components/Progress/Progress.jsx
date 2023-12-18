import { useId } from "react"
import { twMerge } from "tailwind-merge"



export const Progress = ({
                           className,
                           color = "cyan",
                           labelProgress = false,
                           labelText = false,
                           progress,
                           progressLabelPosition = "inside",
                           size = "md",
                           textLabel = "progressbar",
                           textLabelPosition = "inside",
                           theme: customTheme = {},
                           ...props
                         }) => {
  const id = useId()
  const theme = mergeDeep(getTheme().progress, customTheme)

  return (
      <>
        <div
            id={id}
            aria-label={textLabel}
            aria-valuenow={progress}
            role="progressbar"
            {...props}
        >
          {((textLabel && labelText && textLabelPosition === "outside") ||
              (progress > 0 &&
                  labelProgress &&
                  progressLabelPosition === "outside")) && (
              <div
                  className={theme.label}
                  data-testid="flowbite-progress-outer-label-container"
              >
                {textLabel && labelText && textLabelPosition === "outside" && (
                    <span data-testid="flowbite-progress-outer-text-label">
                {textLabel}
              </span>
                )}
                {labelProgress && progressLabelPosition === "outside" && (
                    <span data-testid="flowbite-progress-outer-progress-label">
                {progress}%
              </span>
                )}
              </div>
          )}

          <div className={twMerge(theme.base, theme.size[size], className)}>
            <div
                style={{ width: `${progress}%` }}
                className={twMerge(theme.bar, theme.color[color], theme.size[size])}
            >
              {textLabel && labelText && textLabelPosition === "inside" && (
                  <span data-testid="flowbite-progress-inner-text-label">
                {textLabel}
              </span>
              )}
              {progress > 0 &&
                  labelProgress &&
                  progressLabelPosition === "inside" && (
                      <span data-testid="flowbite-progress-inner-progress-label">
                  {progress}%
                </span>
                  )}
            </div>
          </div>
        </div>
      </>
  )
}

Progress.displayName = "Progress"
