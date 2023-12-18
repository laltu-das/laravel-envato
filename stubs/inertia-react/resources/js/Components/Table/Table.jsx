"use client"

import { twMerge } from "tailwind-merge"


import { TableBody } from "./TableBody"
import { TableCell } from "./TableCell"
import { TableContext } from "./TableContext"
import { TableHead } from "./TableHead"
import { TableHeadCell } from "./TableHeadCell"
import { TableRow } from "./TableRow"

const TableComponent = ({
                          children,
                          className,
                          striped,
                          hoverable,
                          theme: customTheme = {},
                          ...props
                        }) => {
  const theme = mergeDeep(getTheme().table, customTheme)

  return (
      <div data-testid="table-element" className={twMerge(theme.root.wrapper)}>
        <TableContext.Provider value={{ theme, striped, hoverable }}>
          <div className={twMerge(theme.root.shadow, className)}></div>
          <table className={twMerge(theme.root.base, className)} {...props}>
            {children}
          </table>
        </TableContext.Provider>
      </div>
  )
}

TableComponent.displayName = "Table"
TableHead.displayName = "Table.Head"
TableBody.displayName = "Table.Body"
TableRow.displayName = "Table.Row"
TableCell.displayName = "Table.Cell"
TableHeadCell.displayName = "Table.HeadCell"

export const Table = Object.assign(TableComponent, {
  Head: TableHead,
  Body: TableBody,
  Row: TableRow,
  Cell: TableCell,
  HeadCell: TableHeadCell
})
