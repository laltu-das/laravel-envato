import { twMerge } from "tailwind-merge"



export const FooterBrand = ({
                              alt,
                              className,
                              children,
                              href,
                              name,
                              src,
                              theme: customTheme = {},
                              ...props
                            }) => {
  const theme = mergeDeep(getTheme().footer.brand, customTheme)

  return (
      <div>
        {href ? (
            <a
                data-testid="flowbite-footer-brand"
                href={href}
                className={twMerge(theme.base, className)}
                {...props}
            >
              <img alt={alt} src={src} className={theme.img} />
              <span data-testid="flowbite-footer-brand-span" className={theme.span}>
            {name}
          </span>
              {children}
            </a>
        ) : (
            <img
                alt={alt}
                data-testid="flowbite-footer-brand"
                src={src}
                className={twMerge(theme.img, className)}
                {...props}
            />
        )}
      </div>
  )
}
