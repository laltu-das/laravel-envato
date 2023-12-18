"use client"
import { HiStar } from "react-icons/hi"
import { twMerge } from "tailwind-merge"

import { useRatingContext } from "./RatingContext"

export const RatingStar = ({
                             className,
                             filled = true,
                             starIcon: Icon = HiStar,
                             theme: customTheme = {},
                             ...props
                           }) => {
  const { theme: rootTheme, size = "sm" } = useRatingContext()

  const theme = mergeDeep(rootTheme.star, customTheme)

  return (
      <Icon
          data-testid="flowbite-rating-star"
          className={twMerge(
              theme.sizes[size],
              theme[filled ? "filled" : "empty"],
              className
          )}
          {...props}
      />
  )
}
