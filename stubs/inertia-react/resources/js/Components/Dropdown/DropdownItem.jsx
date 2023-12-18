"use client"

import { useListItem } from "@floating-ui/react"
import { twMerge } from "tailwind-merge"

import { useDropdownContext } from "./DropdownContext"
import { ButtonBase } from "../Button/ButtonBase"

export const DropdownItem = ({
                               children,
                               className,
                               icon: Icon,
                               onClick,
                               theme: customTheme = {},
                               ...props
                             }) => {
  const { ref, index } = useListItem({
    label: typeof children === "string" ? children : undefined
  })
  const {
    theme: rootTheme,
    activeIndex,
    dismissOnClick,
    getItemProps,
    handleSelect
  } = useDropdownContext()
  const isActive = activeIndex === index
  const theme = mergeDeep(rootTheme.floating.item, customTheme)

  return (
      <li role="menuitem" className={theme.container}>
        <ButtonBase
            ref={ref}
            className={twMerge(theme.base, className)}
            {...props}
            {...getItemProps({
              onClick: () => {
                onClick && onClick()
                dismissOnClick && handleSelect(null)
              }
            })}
            tabIndex={isActive ? 0 : -1}
        >
          {Icon && <Icon className={theme.icon} />}
          {children}
        </ButtonBase>
      </li>
  )
}
