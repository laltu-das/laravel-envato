"use client"
import { HiMoon, HiSun } from "react-icons/hi"
import { twMerge } from "tailwind-merge"

import { useThemeMode } from "../../hooks/use-theme-mode"


export const DarkThemeToggle = ({
                                  className,
                                  theme: customTheme = {},
                                  iconDark: IconDark = HiSun,
                                  iconLight: IconLight = HiMoon,
                                  ...props
                                }) => {
  const { computedMode, toggleMode } = useThemeMode()

  const theme = mergeDeep(getTheme().darkThemeToggle, customTheme)

  return (
      <button
          type="button"
          aria-label="Toggle dark mode"
          data-testid="dark-theme-toggle"
          className={twMerge(theme.root.base, className)}
          onClick={toggleMode}
          {...props}
      >
        <IconDark
            aria-label="Currently dark mode"
            data-active={computedMode === "dark"}
            className={twMerge(theme.root.icon, "hidden dark:block")}
        />
        <IconLight
            aria-label="Currently light mode"
            data-active={computedMode === "light"}
            className={twMerge(theme.root.icon, "dark:hidden")}
        />
      </button>
  )
}

DarkThemeToggle.displayName = "DarkThemeToggle"
