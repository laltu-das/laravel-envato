"use client"
import { twMerge } from "tailwind-merge"

import { useModalContext } from "./ModalContext"

export const ModalFooter = ({
                              children,
                              className,
                              theme: customTheme = {},
                              ...props
                            }) => {
  const { theme: rootTheme, popup } = useModalContext()

  const theme = mergeDeep(rootTheme.footer, customTheme)

  return (
      <div
          className={twMerge(theme.base, !popup && theme.popup, className)}
          {...props}
      >
        {children}
      </div>
  )
}
