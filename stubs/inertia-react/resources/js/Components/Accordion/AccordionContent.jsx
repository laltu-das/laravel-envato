"use client"
import { twMerge } from "tailwind-merge"


import { useAccordionContext } from "./AccordionPanelContext"

export const AccordionContent = ({
                                   children,
                                   className,
                                   theme: customTheme = {},
                                   ...props
                                 }) => {
  const { isOpen } = useAccordionContext()

  const theme = mergeDeep(getTheme().accordion.content, customTheme)

  return (
      <div
          className={twMerge(theme.base, className)}
          data-testid="flowbite-accordion-content"
          hidden={!isOpen}
          {...props}
      >
        {children}
      </div>
  )
}
