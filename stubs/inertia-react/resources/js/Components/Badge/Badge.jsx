import { twMerge } from "tailwind-merge"



export const Badge = ({
                        children,
                        color = "info",
                        href,
                        icon: Icon,
                        size = "xs",
                        className,
                        theme: customTheme = {},
                        ...props
                      }) => {
  const theme = mergeDeep(getTheme().badge, customTheme)

  const Content = () => (
      <span
          className={twMerge(
              theme.root.base,
              theme.root.color[color],
              theme.root.size[size],
              theme.icon[Icon ? "on" : "off"],
              className
          )}
          data-testid="flowbite-badge"
          {...props}
      >
      {Icon && (
          <Icon
              aria-hidden
              className={theme.icon.size[size]}
              data-testid="flowbite-badge-icon"
          />
      )}
        {children && <span>{children}</span>}
    </span>
  )

  return href ? (
      <a className={theme.root.href} href={href}>
        <Content />
      </a>
  ) : (
      <Content />
  )
}

Badge.displayName = "Badge"
