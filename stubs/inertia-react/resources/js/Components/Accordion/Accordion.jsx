"use client"
import { Children, cloneElement, useMemo, useState } from "react"
import { HiChevronDown } from "react-icons/hi"
import { twMerge } from "tailwind-merge"


import { AccordionContent } from "./AccordionContent"
import { AccordionPanel } from "./AccordionPanel"
import { AccordionTitle } from "./AccordionTitle"

const AccordionComponent = ({
                              alwaysOpen = false,
                              arrowIcon = HiChevronDown,
                              children,
                              flush = false,
                              collapseAll = false,
                              className,
                              theme: customTheme = {},
                              ...props
                            }) => {
  const [isOpen, setOpen] = useState(collapseAll ? -1 : 0)

  const panels = useMemo(
      () =>
          Children.map(children, (child, i) =>
              cloneElement(child, {
                alwaysOpen,
                arrowIcon,
                flush,
                isOpen: isOpen === i,
                setOpen: () => setOpen(isOpen === i ? -1 : i)
              })
          ),
      [alwaysOpen, arrowIcon, children, flush, isOpen]
  )

  const theme = mergeDeep(getTheme().accordion.root, customTheme)

  return (
      <div
          className={twMerge(
              theme.base,
              theme.flush[flush ? "on" : "off"],
              className
          )}
          data-testid="flowbite-accordion"
          {...props}
      >
        {panels}
      </div>
  )
}

AccordionComponent.displayName = "Accordion"
AccordionPanel.displayName = "Accordion.Panel"
AccordionTitle.displayName = "Accordion.Title"
AccordionContent.displayName = "Accordion.Content"

export const Accordion = Object.assign(AccordionComponent, {
  Panel: AccordionPanel,
  Title: AccordionTitle,
  Content: AccordionContent
})
