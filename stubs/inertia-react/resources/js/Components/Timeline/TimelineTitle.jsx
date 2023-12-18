"use client"
import { twMerge } from "tailwind-merge"

import { useTimelineContentContext } from "./TimelineContentContext"

export const TimelineTitle = ({
                                as: Tag = "h3",
                                children,
                                className,
                                theme: customTheme = {},
                                ...props
                              }) => {
  const { theme: contentTheme } = useTimelineContentContext()

  const theme = mergeDeep(contentTheme.title, customTheme)

  return (
      <Tag className={twMerge(theme.base, className)} {...props}>
        {children}
      </Tag>
  )
}
