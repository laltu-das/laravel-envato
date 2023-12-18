"use client"
import { twMerge } from "tailwind-merge"

import { useSidebarContext } from "./SidebarContext"

export const SidebarItems = ({
                               children,
                               className,
                               theme: customTheme = {},
                               ...props
                             }) => {
  const { theme: rootTheme } = useSidebarContext()

  const theme = mergeDeep(rootTheme.items, customTheme)

  return (
      <div
          className={twMerge(theme.base, className)}
          data-testid="flowbite-sidebar-items"
          {...props}
      >
        {children}
      </div>
  )
}

SidebarItems.displayName = "Sidebar.Items"
