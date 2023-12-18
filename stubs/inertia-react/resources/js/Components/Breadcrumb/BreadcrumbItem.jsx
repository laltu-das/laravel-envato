import { forwardRef } from "react"
import { HiOutlineChevronRight } from "react-icons/hi"
import { twMerge } from "tailwind-merge"



export const BreadcrumbItem = forwardRef(
    (
        {
            children,
            className,
            href,
            icon: Icon,
            theme: customTheme = {},
            ...props
        },
        ref
    ) => {
        const isLink = typeof href !== "undefined"
        const Component = isLink ? "a" : "span"

        const theme = mergeDeep(getTheme().breadcrumb.item, customTheme)

        return (
            <li className={twMerge(theme.base, className)} {...props}>
                <HiOutlineChevronRight
                    aria-hidden
                    className={theme.chevron}
                    data-testid="flowbite-breadcrumb-separator"
                />
                <Component
                    ref={ref}
                    className={theme.href[isLink ? "on" : "off"]}
                    data-testid="flowbite-breadcrumb-item"
                    href={href}
                >
                    {Icon && <Icon aria-hidden className={theme.icon} />}
                    {children}
                </Component>
            </li>
        )
    }
)

BreadcrumbItem.displayName = "Breadcrumb.Item"
