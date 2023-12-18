import { twMerge } from "tailwind-merge"

export const ListItem = ({ children, className, theme: customTheme = {} }) => {
  const theme = mergeDeep(getTheme().listGroup.item, customTheme)

  return <li className={twMerge(theme.base, className)}>{children}</li>
}
