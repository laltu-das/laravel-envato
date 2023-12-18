"use client"
import { useState } from "react"
import { twMerge } from "tailwind-merge"


import { NavbarBrand } from "./NavbarBrand"
import { NavbarCollapse } from "./NavbarCollapse"
import { NavbarContext } from "./NavbarContext"
import { NavbarLink } from "./NavbarLink"
import { NavbarToggle } from "./NavbarToggle"

const NavbarComponent = ({
                           border,
                           children,
                           className,
                           fluid = false,
                           menuOpen,
                           rounded,
                           theme: customTheme = {},
                           ...props
                         }) => {
  const [isOpen, setIsOpen] = useState(menuOpen)

  const theme = mergeDeep(getTheme().navbar, customTheme)

  return (
      <NavbarContext.Provider value={{ theme, isOpen, setIsOpen }}>
        <nav
            className={twMerge(
                theme.root.base,
                theme.root.bordered[border ? "on" : "off"],
                theme.root.rounded[rounded ? "on" : "off"],
                className
            )}
            {...props}
        >
          <div
              className={twMerge(
                  theme.root.inner.base,
                  theme.root.inner.fluid[fluid ? "on" : "off"]
              )}
          >
            {children}
          </div>
        </nav>
      </NavbarContext.Provider>
  )
}

NavbarComponent.displayName = "Navbar"
NavbarBrand.displayName = "Navbar.Brand"
NavbarCollapse.displayName = "Navbar.Collapse"
NavbarLink.displayName = "Navbar.Link"
NavbarToggle.displayName = "Navbar.Toggle"

export const Navbar = Object.assign(NavbarComponent, {
  Brand: NavbarBrand,
  Collapse: NavbarCollapse,
  Link: NavbarLink,
  Toggle: NavbarToggle
})
