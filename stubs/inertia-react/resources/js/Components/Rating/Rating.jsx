"use client"
import { twMerge } from "tailwind-merge"


import { RatingAdvanced } from "./RatingAdvanced"
import { RatingContext } from "./RatingContext"
import { RatingStar } from "./RatingStar"

const RatingComponent = ({
                           children,
                           className,
                           size = "sm",
                           theme: customTheme = {},
                           ...props
                         }) => {
  const theme = mergeDeep(getTheme().rating, customTheme)

  return (
      <RatingContext.Provider value={{ theme, size }}>
        <div className={twMerge(theme.root.base, className)} {...props}>
          {children}
        </div>
      </RatingContext.Provider>
  )
}

RatingComponent.displayName = "Rating"
RatingStar.displayName = "Rating.Star"
RatingAdvanced.displayName = "Rating.Advanced"

export const Rating = Object.assign(RatingComponent, {
  Star: RatingStar,
  Advanced: RatingAdvanced
})
