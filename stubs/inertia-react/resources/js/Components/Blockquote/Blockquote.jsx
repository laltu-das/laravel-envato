import { twMerge } from "tailwind-merge"



export const Blockquote = ({
                             children,
                             className,
                             theme: customTheme = {},
                             ...props
                           }) => {
  const theme = mergeDeep(getTheme().blockquote, customTheme)

  return (
      <blockquote
          className={twMerge(theme.root.base, className)}
          data-testid="flowbite-blockquote"
          {...props}
      >
        {children}
      </blockquote>
  )
}

Blockquote.displayName = "Blockquote"
