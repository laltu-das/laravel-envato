import { twMerge } from "tailwind-merge"



export const FooterTitle = ({
                              as: Component = "h2",
                              className,
                              theme: customTheme = {},
                              title,
                              ...props
                            }) => {
  const theme = mergeDeep(getTheme().footer.title, customTheme)

  return (
      <Component
          data-testid="flowbite-footer-title"
          className={twMerge(theme.base, className)}
          {...props}
      >
        {title}
      </Component>
  )
}
