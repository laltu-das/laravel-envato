import React from "react"

export const ThemeModeScript = ({ mode, ...others }) => {
  return (
      <script
          {...others}
          data-flowbite-theme-mode-script
          dangerouslySetInnerHTML={{
            __html: getScript({
              mode,
              defaultMode: "light",
              localStorageKey: "flowbite-theme-mode"
            })
          }}
      />
  )
}

function getScript({ mode, defaultMode, localStorageKey }) {
  return `
    try {
      const mode = window.localStorage.getItem('${localStorageKey}') ?? '${mode}' ?? '${defaultMode}';
      const computedMode =
        mode === 'auto' ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') : mode;

      if (computedMode === 'dark') {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    } catch (e) {}
  `
}
