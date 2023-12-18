import { twMerge } from "tailwind-merge"


import { BreadcrumbItem } from "./BreadcrumbItem"

const BreadcrumbComponent = ({
                               children,
                               className,
                               theme: customTheme = {},
                               ...props
                             }) => {
  const theme = mergeDeep(getTheme().breadcrumb.root, customTheme)

  return (
      <nav
          aria-label="Breadcrumb"
          className={twMerge(theme.base, className)}
          {...props}
      >
        <ol className={theme.list}>{children}</ol>
      </nav>
  )
}

BreadcrumbComponent.displayName = "Breadcrumb"

export const Breadcrumb = Object.assign(BreadcrumbComponent, {
  Item: BreadcrumbItem
})
