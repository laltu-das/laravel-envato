import { twMerge } from "tailwind-merge"



export const FooterCopyright = ({
                                  by,
                                  className,
                                  href,
                                  theme: customTheme = {},
                                  year,
                                  ...props
                                }) => {
  const theme = mergeDeep(getTheme().footer.copyright, customTheme)

  return (
      <div
          data-testid="flowbite-footer-copyright"
          className={twMerge(theme.base, className)}
          {...props}
      >
        © {year}
        {href ? (
            <a href={href} className={theme.href}>
              {by}
            </a>
        ) : (
            <span
                data-testid="flowbite-footer-copyright-span"
                className={theme.span}
            >
          {by}
        </span>
        )}
      </div>
  )
}
