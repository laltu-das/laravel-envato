"use client"
import { twMerge } from "tailwind-merge"

import { useTimelineContext } from "./TimelineContext"
import { TimelineItemContext } from "./TimelineItemContext"

export const TimelineItem = ({
                                 children,
                                 className,
                                 theme: customTheme = {},
                                 ...props
                             }) => {
    const { theme: rootTheme, horizontal } = useTimelineContext()

    const theme = mergeDeep(rootTheme.item, customTheme)

    return (
        <TimelineItemContext.Provider value={{ theme }}>
            <li
                data-testid="timeline-item"
                className={twMerge(
                    horizontal && theme.root.horizontal,
                    !horizontal && theme.root.vertical,
                    className
                )}
                {...props}
            >
                {children}
            </li>
        </TimelineItemContext.Provider>
    )
}
