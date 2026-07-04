export default defineEventHandler(() => {
  const siteUrl = process.env.NUXT_PUBLIC_SITE_URL || 'http://localhost:3000'

  const content = `User-agent: *
Allow: /
Disallow: /admin
Disallow: /cart
Disallow: /wishlist
Disallow: /order

Sitemap: ${siteUrl}/sitemap.xml`

  return new Response(content, {
    headers: { 'Content-Type': 'text/plain; charset=utf-8' },
  })
})
