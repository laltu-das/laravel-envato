import { BannerCollapseButton } from "./BannerCollapseButton"

const BannerComponent = ({ children, ...props }) => {
  return (
      <div data-testid="flowbite-banner" role="banner" tabIndex={-1} {...props}>
        {children}
      </div>
  )
}

BannerComponent.displayName = "Banner"

export const Banner = Object.assign(BannerComponent, {
  CollapseButton: BannerCollapseButton
})
