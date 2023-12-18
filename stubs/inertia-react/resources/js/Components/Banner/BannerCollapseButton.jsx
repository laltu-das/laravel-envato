"use client"
import { Button } from "../Button"

export const BannerCollapseButton = ({ children, ...props }) => {
  const onClick = event => {
    const collapseButton = event.target
    const parentBanner = collapseButton.closest('[role="banner"]')

    parentBanner?.remove()
  }

  return (
      <Button onClick={onClick} {...props}>
        {children}
      </Button>
  )
}

BannerCollapseButton.displayName = "Banner.CollapseButton"
