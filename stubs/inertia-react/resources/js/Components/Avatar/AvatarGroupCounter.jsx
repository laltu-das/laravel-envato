import { twMerge } from "tailwind-merge"



export const AvatarGroupCounter = ({
                                     className,
                                     href,
                                     theme: customTheme = {},
                                     total,
                                     ...props
                                   }) => {
  const theme = mergeDeep(getTheme().avatar.groupCounter, customTheme)

  return (
      <a href={href} className={twMerge(theme.base, className)} {...props}>
        +{total}
      </a>
  )
}

AvatarGroupCounter.displayName = "Avatar.GroupCounter"
