import { forwardRef } from "react"
import { twMerge } from "tailwind-merge"



export const RangeSlider = forwardRef(
    ({ className, sizing = "md", theme: customTheme = {}, ...props }, ref) => {
        const theme = mergeDeep(getTheme().rangeSlider, customTheme)

        return (
            <>
                <div
                    data-testid="flowbite-range-slider"
                    className={twMerge(theme.root.base, className)}
                >
                    <div className={theme.field.base}>
                        <input
                            ref={ref}
                            type="range"
                            className={twMerge(
                                theme.field.input.base,
                                theme.field.input.sizes[sizing]
                            )}
                            {...props}
                        />
                    </div>
                </div>
            </>
        )
    }
)

RangeSlider.displayName = "RangeSlider"
