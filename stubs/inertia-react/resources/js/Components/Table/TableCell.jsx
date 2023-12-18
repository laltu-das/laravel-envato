"use client"
import { twMerge } from "tailwind-merge"

import { useTableBodyContext } from "./TableBodyContext"

export const TableCell = ({
                            children,
                            className,
                            theme: customTheme = {},
                            ...props
                          }) => {
  const { theme: bodyTheme } = useTableBodyContext()

  const theme = mergeDeep(bodyTheme.cell, customTheme)

  return (
      <td className={twMerge(theme.base, className)} {...props}>
        {children}
      </td>
  )
}
