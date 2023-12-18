import { twMerge } from "tailwind-merge"


import { ListGroupItem } from "./ListGroupItem"

const ListGroupComponent = ({
                              children,
                              className,
                              theme: customTheme = {},
                              ...props
                            }) => {
  const theme = mergeDeep(getTheme().listGroup, customTheme)

  return (
      <ul className={twMerge(theme.root.base, className)} {...props}>
        {children}
      </ul>
  )
}