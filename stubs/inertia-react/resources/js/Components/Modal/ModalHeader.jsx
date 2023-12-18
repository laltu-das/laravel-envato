"use client"
import { useId, useLayoutEffect } from "react"
import { HiOutlineX } from "react-icons/hi"
import { twMerge } from "tailwind-merge"

import { useModalContext } from "./ModalContext"

export const ModalHeader = ({
                              as: Component = "h3",
                              children,
                              className,
                              theme: customTheme = {},
                              id,
                              ...props
                            }) => {
  const innerHeaderId = useId()
  const headerId = id || innerHeaderId

  const { theme: rootTheme, popup, onClose, setHeaderId } = useModalContext()

  const theme = mergeDeep(rootTheme.header, customTheme)

  useLayoutEffect(() => {
    setHeaderId(headerId)

    return () => setHeaderId(undefined)
  }, [headerId, setHeaderId])

  return (
      <div
          className={twMerge(theme.base, popup && theme.popup, className)}
          {...props}
      >
        <Component id={headerId} className={theme.title}>
          {children}
        </Component>
        <button
            aria-label="Close"
            className={theme.close.base}
            type="button"
            onClick={onClose}
        >
          <HiOutlineX aria-hidden className={theme.close.icon} />
        </button>
      </div>
  )
}
