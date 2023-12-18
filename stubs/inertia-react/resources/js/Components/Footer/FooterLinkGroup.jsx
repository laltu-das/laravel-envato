import { twMerge } from "tailwind-merge"



export const FooterLinkGroup = ({
                                  children,
                                  className,
                                  col = false,
                                  theme: customTheme = {},
                                  ...props
                                }) => {
  const theme = mergeDeep(getTheme().footer.groupLink, customTheme)

  return (
      <ul
          data-testid="footer-groupLink"
          className={twMerge(theme.base, col && theme.col, className)}
          {...props}
      >
        {children}
      </ul>
  )
}
