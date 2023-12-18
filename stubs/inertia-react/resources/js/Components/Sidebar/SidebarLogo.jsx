"use client"
import { useId } from "react"
import { twMerge } from "tailwind-merge"

import { useSidebarContext } from "./SidebarContext"

export const SidebarLogo = ({
                              children,
                              className,
                              href,
                              img,
                              imgAlt = "",
                              theme: customTheme = {},
                              ...props
                            }) => {
  const id = useId()
  const { theme: rootTheme, isCollapsed } = useSidebarContext()

  const theme = mergeDeep(rootTheme.logo, customTheme)

  return (
      <a
          aria-labelledby={`flowbite-sidebar-logo-${id}`}
          href={href}
          className={twMerge(theme.base, className)}
          {...props}
      >
        <img alt={imgAlt} src={img} className={theme.img} />
        <span
            className={theme.collapsed[isCollapsed ? "on" : "off"]}
            id={`flowbite-sidebar-logo-${id}`}
        >
        {children}
      </span>
      </a>
  )
}

SidebarLogo.displayName = "Sidebar.Logo"
