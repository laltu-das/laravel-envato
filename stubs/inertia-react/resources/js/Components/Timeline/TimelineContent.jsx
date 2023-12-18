"use client"
import { twMerge } from "tailwind-merge"

import { TimelineContentContext } from "./TimelineContentContext"
import { useTimelineContext } from "./TimelineContext"
import { useTimelineItemContext } from "./TimelineItemContext"

export const TimelineContent = ({
                                  children,
                                  className,
                                  theme: customTheme = {},
                                  ...props
                                }) => {
  const { horizontal } = useTimelineContext()
  const { theme: itemTheme } = useTimelineItemContext()

  const theme = mergeDeep(itemTheme.content, customTheme)

  return (
      <TimelineContentContext.Provider value={{ theme }}>
        <div
            data-testid="timeline-content"
            className={twMerge(horizontal && theme.root.base, className)}
            {...props}
        >
          {children}
        </div>
      </TimelineContentContext.Provider>
  )
}
