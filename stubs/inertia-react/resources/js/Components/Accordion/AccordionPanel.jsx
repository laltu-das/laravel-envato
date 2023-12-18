"use client"
import { useState } from "react"
import { AccordionPanelContext } from "./AccordionPanelContext"

export const AccordionPanel = ({ children, ...props }) => {
    const { alwaysOpen } = props
    const [isOpen, setOpen] = useState(props.isOpen)

    const provider = alwaysOpen
        ? {
            ...props,
            isOpen,
            setOpen: () => setOpen(!isOpen)
        }
        : props

    return (
        <AccordionPanelContext.Provider value={provider}>
            {children}
        </AccordionPanelContext.Provider>
    )
}
