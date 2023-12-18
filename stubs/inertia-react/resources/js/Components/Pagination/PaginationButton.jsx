import { twMerge } from "tailwind-merge"



export const PaginationButton = ({
                                   active,
                                   children,
                                   className,
                                   onClick,
                                   theme: customTheme = {},
                                   ...props
                                 }) => {
  const theme = mergeDeep(getTheme().pagination, customTheme)

  return (
      <button
          type="button"
          className={twMerge(active && theme.pages.selector.active, className)}
          onClick={onClick}
          {...props}
      >
        {children}
      </button>
  )
}

PaginationButton.displayName = "Pagination.Button"

export const PaginationNavigation = ({
                                       children,
                                       className,
                                       onClick,
                                       theme: customTheme = {},
                                       disabled = false,
                                       ...props
                                     }) => {
  const theme = mergeDeep(getTheme().pagination, customTheme)

  return (
      <button
          type="button"
          className={twMerge(disabled && theme.pages.selector.disabled, className)}
          disabled={disabled}
          onClick={onClick}
          {...props}
      >
        {children}
      </button>
  )
}

PaginationNavigation.displayName = "Pagination.Navigation"
