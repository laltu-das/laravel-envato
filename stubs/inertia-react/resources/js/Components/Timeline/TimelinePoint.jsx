"use client"
import { twMerge } from "tailwind-merge"

import { useTimelineContext } from "./TimelineContext"
import { useTimelineItemContext } from "./TimelineItemContext"

export const TimelinePoint = ({
                                children,
                                className,
                                icon: Icon,
                                theme: customTheme = {},
                                ...props
                              }) => {
  const { horizontal } = useTimelineContext()
  const { theme: itemTheme } = useTimelineItemContext()

  const theme = mergeDeep(itemTheme.point, customTheme)

  return (
      <div
          data-testid="timeline-point"
          className={twMerge(
              horizontal && theme.horizontal,
              !horizontal && theme.vertical,
              className
          )}
          {...props}
      >
        {children}
        {Icon ? (
            <span className={twMerge(theme.marker.icon.wrapper)}>
          <Icon aria-hidden className={twMerge(theme.marker.icon.base)} />
        </span>
        ) : (
            <div
                className={twMerge(
                    horizontal && theme.marker.base.horizontal,
                    !horizontal && theme.marker.base.vertical
                )}
            />
        )}
        {horizontal && <div className={twMerge(theme.line)} />}
      </div>
  )
}
