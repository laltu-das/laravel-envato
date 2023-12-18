"use client"
import { twMerge } from "tailwind-merge"

import { useTableHeadContext } from "./TableHeadContext"

export const TableHeadCell = ({
                                children,
                                className,
                                theme: customTheme = {},
                                ...props
                              }) => {
  const { theme: headTheme } = useTableHeadContext()

  const theme = mergeDeep(headTheme.cell, customTheme)

  return (
      <th className={twMerge(theme.base, className)} {...props}>
        {children}
      </th>
  )
}
