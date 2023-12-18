import { twMerge } from "tailwind-merge"



export const ListGroupItem = ({
                                active: isActive,
                                children,
                                className,
                                href,
                                icon: Icon,
                                onClick,
                                theme: customTheme = {},
                                disabled,
                                ...props
                              }) => {
  const theme = mergeDeep(getTheme().listGroup.item, customTheme)

  const isLink = typeof href !== "undefined"
  const Component = isLink ? "a" : "button"

  return (
      <li className={twMerge(theme.base, className)}>
        <Component
            href={href}
            onClick={onClick}
            type={isLink ? undefined : "button"}
            disabled={disabled}
            className={twMerge(
                theme.link.active[isActive ? "on" : "off"],
                theme.link.disabled[disabled ? "on" : "off"],
                theme.link.base,
                theme.link.href[isLink ? "on" : "off"]
            )}
            {...props}
        >
          {Icon && (
              <Icon
                  aria-hidden
                  data-testid="flowbite-list-group-item-icon"
                  className={theme.link.icon}
              />
          )}
          {children}
        </Component>
      </li>
  )
}
