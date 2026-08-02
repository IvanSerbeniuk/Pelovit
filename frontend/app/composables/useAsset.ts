export function useAsset() {
  const config = useRuntimeConfig()

  // Усі шляхи резолвляться в абсолютні через assetBase. У застосунку
  // немає проксі на /images/**, тому відносний fallback там веде в нікуди.
  function assetUrl(path: string | null | undefined, fallback = 'images/image.png'): string {
    const raw = path || fallback
    if (raw.startsWith('http')) return raw
    return `${config.public.assetBase}/${raw.replace(/^\/+/, '')}`
  }

  return { assetUrl }
}
