"use client"
import { twMerge } from "tailwind-merge"

import { useSidebarContext } from "./SidebarContext"
import { SidebarItemContext } from "./SidebarItemContext"

export const SidebarItemGroup = ({
                                   children,
                                   className,
                                   theme: customTheme = {},
                                   ...props
                                 }) => {
  const { theme: rootTheme } = useSidebarContext()

  const theme = mergeDeep(rootTheme.itemGroup, customTheme)

  return (
      <ul
          data-testid="flowbite-sidebar-item-group"
          className={twMerge(theme.base, className)}
          {...props}
      >
        <SidebarItemContext.Provider value={{ isInsideCollapse: false }}>
          {children}
        </SidebarItemContext.Provider>
      </ul>
  )
}

SidebarItemGroup.displayName = "Sidebar.ItemGroup"
