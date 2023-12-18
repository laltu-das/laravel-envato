"use client"
import { twMerge } from "tailwind-merge"

import { useTableContext } from "./TableContext"

export const TableRow = ({
                           children,
                           className,
                           theme: customTheme = {},
                           ...props
                         }) => {
  const { theme: rootTheme, hoverable, striped } = useTableContext()

  const theme = mergeDeep(rootTheme.row, customTheme)

  return (
      <tr
          data-testid="table-row-element"
          className={twMerge(
              theme.base,
              striped && theme.striped,
              hoverable && theme.hovered,
              className
          )}
          {...props}
      >
        {children}
      </tr>
  )
}
