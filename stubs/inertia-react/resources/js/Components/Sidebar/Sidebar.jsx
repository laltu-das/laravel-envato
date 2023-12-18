"use client"
import { twMerge } from "tailwind-merge"


import { SidebarCTA } from "./SidebarCTA"
import { SidebarCollapse } from "./SidebarCollapse"
import { SidebarContext } from "./SidebarContext"
import { SidebarItem } from "./SidebarItem"
import { SidebarItemGroup } from "./SidebarItemGroup"
import { SidebarItems } from "./SidebarItems"
import { SidebarLogo } from "./SidebarLogo"

const SidebarComponent = ({
                            children,
                            as: Component = "nav",
                            collapseBehavior = "collapse",
                            collapsed: isCollapsed = false,
                            theme: customTheme = {},
                            className,
                            ...props
                          }) => {
  const theme = mergeDeep(getTheme().sidebar, customTheme)

  return (
      <SidebarContext.Provider value={{ theme, isCollapsed }}>
        <Component
            aria-label="Sidebar"
            hidden={isCollapsed && collapseBehavior === "hide"}
            className={twMerge(
                theme.root.base,
                theme.root.collapsed[isCollapsed ? "on" : "off"],
                className
            )}
            {...props}
        >
          <div className={theme.root.inner}>{children}</div>
        </Component>
      </SidebarContext.Provider>
  )
}

SidebarComponent.displayName = "Sidebar"

export const Sidebar = Object.assign(SidebarComponent, {
  Collapse: SidebarCollapse,
  CTA: SidebarCTA,
  Item: SidebarItem,
  Items: SidebarItems,
  ItemGroup: SidebarItemGroup,
  Logo: SidebarLogo
})
