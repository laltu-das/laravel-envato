

import { Floating } from "../Floating"

export const Tooltip = ({
                          animation = "duration-300",
                          arrow = true,
                          children,
                          className,
                          content,
                          placement = "top",
                          style = "dark",
                          theme: customTheme = {},
                          trigger = "hover",
                          ...props
                        }) => {
  const theme = mergeDeep(getTheme().tooltip, customTheme)

  return (
      <Floating
          animation={animation}
          arrow={arrow}
          content={content}
          placement={placement}
          style={style}
          theme={theme}
          trigger={trigger}
          className={className}
          {...props}
      >
        {children}
      </Floating>
  )
}

Tooltip.displayName = "Tooltip"
