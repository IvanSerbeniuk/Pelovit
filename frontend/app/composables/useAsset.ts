export function useAsset() {
  const config = useRuntimeConfig()

  function assetUrl(path: string | null | undefined, fallback = '/images/image.png'): string {
    if (!path) return fallback
    if (path.startsWith('http')) return path
    return `${config.public.assetBase}/${path}`
  }

  return { assetUrl }
}
