"use client"
import { twMerge } from "tailwind-merge"
import { useDropdownContext } from "./DropdownContext"
import { DropdownDivider } from "./DropdownDivider"

export const DropdownHeader = ({
                                   children,
                                   className,
                                   theme: customTheme = {},
                                   ...props
                               }) => {
    const { theme: rootTheme } = useDropdownContext()

    const theme = customTheme.header ?? rootTheme.floating.header

    return (
        <>
            <div className={twMerge(theme, className)} {...props}>
                {children}
            </div>
            <DropdownDivider />
        </>
    )
}
