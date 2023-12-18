import { twMerge } from "tailwind-merge"



export const RatingAdvanced = ({
                                 children,
                                 className,
                                 percentFilled = 0,
                                 theme: customTheme = {},
                                 ...props
                               }) => {
  const theme = mergeDeep(getTheme().ratingAdvanced, customTheme)

  return (
      <div className={twMerge(theme.base, className)} {...props}>
        <span className={theme.label}>{children}</span>
        <div className={theme.progress.base}>
          <div
              className={theme.progress.fill}
              data-testid="flowbite-rating-fill"
              style={{ width: `${percentFilled}%` }}
          />
        </div>
        <span className={theme.progress.label}>{`${percentFilled}%`}</span>
      </div>
  )
}
