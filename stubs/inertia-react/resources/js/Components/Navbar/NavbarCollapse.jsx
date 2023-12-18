"use client"
import { twMerge } from "tailwind-merge"

import { useNavbarContext } from "./NavbarContext"

export const NavbarCollapse = ({
                                 children,
                                 className,
                                 theme: customTheme = {},
                                 ...props
                               }) => {
  const { theme: rootTheme, isOpen } = useNavbarContext()

  const theme = mergeDeep(rootTheme.collapse, customTheme)

  return (
      <div
          data-testid="flowbite-navbar-collapse"
          className={twMerge(
              theme.base,
              theme.hidden[!isOpen ? "on" : "off"],
              className
          )}
          {...props}
      >
        <ul className={theme.list}>{children}</ul>
      </div>
  )
}
