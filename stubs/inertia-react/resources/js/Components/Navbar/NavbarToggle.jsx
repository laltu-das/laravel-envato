"use client"
import { FaBars } from "react-icons/fa"
import { twMerge } from "tailwind-merge"

import { useNavbarContext } from "./NavbarContext"

export const NavbarToggle = ({
                               barIcon: BarIcon = FaBars,
                               className,
                               theme: customTheme = {},
                               ...props
                             }) => {
  const { theme: rootTheme, isOpen, setIsOpen } = useNavbarContext()

  const theme = mergeDeep(rootTheme.toggle, customTheme)

  const handleClick = () => {
    setIsOpen(!isOpen)
  }

  return (
      <button
          data-testid="flowbite-navbar-toggle"
          onClick={handleClick}
          className={twMerge(theme.base, className)}
          {...props}
      >
        <span className="sr-only">Open main menu</span>
        <BarIcon aria-hidden className={theme.icon} />
      </button>
  )
}
