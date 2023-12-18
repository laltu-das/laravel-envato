import { twMerge } from "tailwind-merge"



export const Kbd = ({
                      children,
                      className,
                      icon: Icon,
                      theme: customTheme = {},
                      ...props
                    }) => {
  const theme = mergeDeep(getTheme().kbd, customTheme)

  return (
      <span
          className={twMerge(theme.root.base, className)}
          data-testid="flowbite-kbd"
          {...props}
      >
      {Icon && (
          <Icon className={theme.root.icon} data-testid="flowbite-kbd-icon" />
      )}
        {children}
    </span>
  )
}

Kbd.displayName = "Kbd"
