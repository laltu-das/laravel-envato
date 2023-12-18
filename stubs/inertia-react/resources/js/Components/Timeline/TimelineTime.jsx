"use client"
import { twMerge } from "tailwind-merge"

import { useTimelineContentContext } from "./TimelineContentContext"

export const TimelineTime = ({
                               children,
                               className,
                               theme: customTheme = {},
                               ...props
                             }) => {
  const { theme: contentTheme } = useTimelineContentContext()

  const theme = mergeDeep(contentTheme.time, customTheme)

  return (
      <time className={twMerge(theme.base, className)} {...props}>
        {children}
      </time>
  )
}
