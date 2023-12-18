"use client"
import { twMerge } from "tailwind-merge"

import { useTimelineContentContext } from "./TimelineContentContext"

export const TimelineBody = ({
                               children,
                               className,
                               theme: customTheme = {},
                               ...props
                             }) => {
  const { theme: contentTheme } = useTimelineContentContext()

  const theme = mergeDeep(contentTheme.body, customTheme)

  return (
      <div className={twMerge(theme.base, className)} {...props}>
        {children}
      </div>
  )
}
