import { onBeforeMount, onBeforeUnmount, reactive } from "vue"
const accordionsStates = reactive({})
export function useAccordionState(id, options) {
  onBeforeMount(() => {
    if (!id) return
    accordionsStates[id] = {
      id: id,
      flush: options?.flush ?? false,
      alwaysOpen: options?.alwaysOpen ?? false,
      openFirstItem: options?.openFirstItem ?? true,
      panels: {}
    }
  })
  onBeforeUnmount(() => {
    if (!id) return
    delete accordionsStates[id]
  })

  return {
    accordionsStates
  }
}
