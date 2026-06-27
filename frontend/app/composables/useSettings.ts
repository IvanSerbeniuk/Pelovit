export const useSettings = () => {
  const config = useRuntimeConfig()
  return useAsyncData('settings', () =>
    $fetch<Record<string, string>>(`${config.public.apiBase}/settings`),
    { default: () => ({}) as Record<string, string> }
  )
}
