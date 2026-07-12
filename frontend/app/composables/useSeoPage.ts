interface SeoPageOptions {
  pageKey: string
  fallbackTitle: string
  fallbackDescription: string
  fallbackOgImage?: string
  canonicalPath: string
  ogType?: string
}

export const useSeoPage = (opts: SeoPageOptions) => {
  const { siteUrl } = useRuntimeConfig().public
  const { data: settings } = useSettings()

  const title = computed(() =>
    settings.value?.[`seo_${opts.pageKey}_title`] || opts.fallbackTitle
  )
  const description = computed(() =>
    settings.value?.[`seo_${opts.pageKey}_description`] || opts.fallbackDescription
  )
  const ogImage = computed(() =>
    settings.value?.[`seo_${opts.pageKey}_og_image`] ||
    settings.value?.['default_og_image'] ||
    opts.fallbackOgImage ||
    ''
  )
  const canonical = computed(() => `${siteUrl}${opts.canonicalPath}`)

  useHead({
    title,
    link: computed(() => [{ rel: 'canonical', href: canonical.value }]),
    meta: computed(() => [
      { name: 'description', content: description.value },
      { property: 'og:url', content: canonical.value },
      { property: 'og:title', content: title.value },
      { property: 'og:description', content: description.value },
      ...(ogImage.value ? [{ property: 'og:image', content: ogImage.value }] : []),
      { property: 'og:type', content: opts.ogType ?? 'website' },
    ]),
  })
}
