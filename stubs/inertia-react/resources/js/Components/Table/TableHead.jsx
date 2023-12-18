"use client"
import { twMerge } from "tailwind-merge"

import { useTableContext } from "./TableContext"
import { TableHeadContext } from "./TableHeadContext"

export const TableHead = ({
                            children,
                            className,
                            theme: customTheme = {},
                            ...props
                          }) => {
  const { theme: rootTheme } = useTableContext()

  const theme = mergeDeep(rootTheme.head, customTheme)

  return (
      <TableHeadContext.Provider value={{ theme }}>
        <thead className={twMerge(theme.base, className)} {...props}>
        <tr>{children}</tr>
        </thead>
      </TableHeadContext.Provider>
  )
}
