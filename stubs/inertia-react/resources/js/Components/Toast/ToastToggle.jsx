"use client"
import { HiX } from "react-icons/hi"
import { twMerge } from "tailwind-merge"

import { useToastContext } from "./ToastContext"

export const ToastToggle = ({
                              className,
                              onClick,
                              theme: customTheme = {},
                              xIcon: XIcon = HiX,
                              onDismiss,
                              ...props
                            }) => {
  const {
    theme: rootTheme,
    duration,
    isClosed,
    isRemoved,
    setIsClosed,
    setIsRemoved
  } = useToastContext()

  const theme = mergeDeep(rootTheme.toggle, customTheme)

  const handleClick = e => {
    if (onClick) onClick(e)

    if (onDismiss) {
      onDismiss()
      return
    }

    setIsClosed(!isClosed)
    setTimeout(() => setIsRemoved(!isRemoved), duration)
  }

  return (
      <button
          aria-label="Close"
          onClick={handleClick}
          type="button"
          className={twMerge(theme.base, className)}
          {...props}
      >
        <XIcon aria-hidden className={theme.icon} />
      </button>
  )
}
