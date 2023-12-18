import { ThemeInit } from "../../theme-store/init"

export const Flowbite = ({ children, theme }) => {
  return (
      <>
        <ThemeInit mode={theme?.mode} theme={theme?.theme} />
        {children}
      </>
  )
}

Flowbite.displayName = "Flowbite"
