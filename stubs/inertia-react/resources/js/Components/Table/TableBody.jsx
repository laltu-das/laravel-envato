"use client"
import { twMerge } from "tailwind-merge"

import { TableBodyContext } from "./TableBodyContext"
import { useTableContext } from "./TableContext"

export const TableBody = ({
                              children,
                              className,
                              theme: customTheme = {},
                              ...props
                          }) => {
    const { theme: rootTheme } = useTableContext()

    const theme = mergeDeep(rootTheme.body, customTheme)

    return (
        <TableBodyContext.Provider value={{ theme }}>
            <tbody className={twMerge(theme.base, className)} {...props}>
            {children}
            </tbody>
        </TableBodyContext.Provider>
    )
}
