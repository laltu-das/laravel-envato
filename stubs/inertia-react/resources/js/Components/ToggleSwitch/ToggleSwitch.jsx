import { useId } from "react"
import { twMerge } from "tailwind-merge"



export const ToggleSwitch = ({
                               checked,
                               className,
                               color = "blue",
                               sizing = "md",
                               disabled,
                               label,
                               name,
                               onChange,
                               theme: customTheme = {},
                               ...props
                             }) => {
  const id = useId()
  const theme = mergeDeep(getTheme().toggleSwitch, customTheme)

  const toggle = () => onChange(!checked)

  const handleClick = () => {
    toggle()
  }

  const handleOnKeyDown = event => {
    if (event.code == "Enter") {
      event.preventDefault()
    }
  }

  return (
      <>
        {name && checked ? (
            <input
                checked={checked}
                hidden
                name={name}
                readOnly
                type="checkbox"
                className="sr-only"
            />
        ) : null}
        <button
            aria-checked={checked}
            aria-labelledby={`${id}-flowbite-toggleswitch-label`}
            disabled={disabled}
            id={`${id}-flowbite-toggleswitch`}
            onClick={handleClick}
            onKeyDown={handleOnKeyDown}
            role="switch"
            tabIndex={0}
            type="button"
            className={twMerge(
                theme.root.base,
                theme.root.active[disabled ? "off" : "on"],
                className
            )}
            {...props}
        >
          <div
              data-testid="flowbite-toggleswitch-toggle"
              className={twMerge(
                  theme.toggle.base,
                  theme.toggle.checked[checked ? "on" : "off"],
                  checked && theme.toggle.checked.color[color],
                  theme.toggle.sizes[sizing]
              )}
          />
          {label?.length ? (
              <span
                  data-testid="flowbite-toggleswitch-label"
                  id={`${id}-flowbite-toggleswitch-label`}
                  className={theme.root.label}
              >
            {label}
          </span>
          ) : null}
        </button>
      </>
  )
}

ToggleSwitch.displayName = "ToggleSwitch"
