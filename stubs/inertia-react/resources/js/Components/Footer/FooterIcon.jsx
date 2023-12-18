import { twMerge } from "tailwind-merge"



export const FooterIcon = ({
                             ariaLabel,
                             className,
                             href,
                             icon: Icon,
                             theme: customTheme = {},
                             ...props
                           }) => {
  const theme = mergeDeep(getTheme().footer.icon, customTheme)

  return (
      <div>
        {href ? (
            <a
                aria-label={ariaLabel}
                data-testid="flowbite-footer-icon"
                href={href}
                className={twMerge(theme.base, className)}
                {...props}
            >
              <Icon className={theme.size} />
            </a>
        ) : (
            <Icon
                data-testid="flowbite-footer-icon"
                className={theme.size}
                {...props}
            />
        )}
      </div>
  )
}
