import { twMerge } from "tailwind-merge"



export const FooterDivider = ({
                                className,
                                theme: customTheme = {},
                                ...props
                              }) => {
  const theme = mergeDeep(getTheme().footer.divider, customTheme)

  return (
      <hr
          data-testid="footer-divider"
          className={twMerge(theme.base, className)}
          {...props}
      />
  )
}
