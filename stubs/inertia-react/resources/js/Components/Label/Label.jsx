import { twMerge } from "tailwind-merge"



export const Label = ({
                        children,
                        className,
                        color = "default",
                        disabled = false,
                        theme: customTheme = {},
                        value,
                        ...props
                      }) => {
  const theme = mergeDeep(getTheme().label, customTheme)

  return (
      <label
          className={twMerge(
              theme.root.base,
              theme.root.colors[color],
              disabled && theme.root.disabled,
              className
          )}
          data-testid="flowbite-label"
          {...props}
      >
        {value ?? children ?? ""}
      </label>
  )
}

Label.displayName = "Label"
