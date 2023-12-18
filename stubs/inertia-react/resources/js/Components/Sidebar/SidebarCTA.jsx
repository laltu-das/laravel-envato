"use client"
import { twMerge } from "tailwind-merge"

import { useSidebarContext } from "./SidebarContext"

export const SidebarCTA = ({
                             children,
                             color = "info",
                             className,
                             theme: customTheme = {},
                             ...props
                           }) => {
  const { theme: rootTheme, isCollapsed } = useSidebarContext()

  const theme = mergeDeep(rootTheme.cta, customTheme)

  return (
      <div
          data-testid="sidebar-cta"
          hidden={isCollapsed}
          className={twMerge(theme.base, theme.color[color], className)}
          {...props}
      >
        {children}
      </div>
  )
}

SidebarCTA.displayName = "Sidebar.CTA"
