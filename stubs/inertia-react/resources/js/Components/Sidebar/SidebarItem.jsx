"use client"
import { forwardRef, useId } from "react"
import { twMerge } from "tailwind-merge"

import { Badge } from "../Badge"
import { Tooltip } from "../Tooltip"
import { useSidebarContext } from "./SidebarContext"
import { useSidebarItemContext } from "./SidebarItemContext"

const ListItem = ({
                      id,
                      theme,
                      isCollapsed,
                      tooltipChildren,
                      children: wrapperChildren,
                      ...props
                  }) => (
    <li {...props}>
        {isCollapsed ? (
            <Tooltip
                content={
                    <Children id={id} theme={theme}>
                        {tooltipChildren}
                    </Children>
                }
                placement="right"
            >
                {wrapperChildren}
            </Tooltip>
        ) : (
            wrapperChildren
        )}
    </li>
)

const Children = ({ id, theme, children }) => {
    return (
        <span
            data-testid="flowbite-sidebar-item-content"
            id={`flowbite-sidebar-item-${id}`}
            className={twMerge(theme.content.base)}
        >
      {children}
    </span>
    )
}

export const SidebarItem = forwardRef(
    (
        {
            active: isActive,
            as: Component = "a",
            children,
            className,
            icon: Icon,
            label,
            labelColor = "info",
            theme: customTheme = {},
            ...props
        },
        ref
    ) => {
        const id = useId()
        const { theme: rootTheme, isCollapsed } = useSidebarContext()
        const { isInsideCollapse } = useSidebarItemContext()

        const theme = mergeDeep(rootTheme.item, customTheme)

        return (
            <ListItem
                theme={theme}
                className={theme.listItem}
                id={id}
                isCollapsed={isCollapsed}
                tooltipChildren={children}
            >
                <Component
                    aria-labelledby={`flowbite-sidebar-item-${id}`}
                    ref={ref}
                    className={twMerge(
                        theme.base,
                        isActive && theme.active,
                        !isCollapsed && isInsideCollapse && theme.collapsed?.insideCollapse,
                        className
                    )}
                    {...props}
                >
                    {Icon && (
                        <Icon
                            aria-hidden
                            data-testid="flowbite-sidebar-item-icon"
                            className={twMerge(
                                theme.icon?.base,
                                isActive && theme.icon?.active
                            )}
                        />
                    )}
                    {isCollapsed && !Icon && (
                        <span className={theme.collapsed?.noIcon}>
              {children.charAt(0).toLocaleUpperCase() ?? "?"}
            </span>
                    )}
                    {!isCollapsed && (
                        <Children id={id} theme={theme}>
                            {children}
                        </Children>
                    )}
                    {!isCollapsed && label && (
                        <Badge
                            color={labelColor}
                            data-testid="flowbite-sidebar-label"
                            hidden={isCollapsed}
                            className={theme.label}
                        >
                            {label}
                        </Badge>
                    )}
                </Component>
            </ListItem>
        )
    }
)

SidebarItem.displayName = "Sidebar.Item"
