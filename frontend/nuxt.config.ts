// Складання під Capacitor: BUILD_TARGET=app npm run build:app
// У режимі застосунку SSR вимкнено — WebView вантажить статику з диска пристрою.
const isApp = process.env.BUILD_TARGET === 'app'

export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },
  ssr: !isApp,

  modules: ['@pinia/nuxt', 'nuxt-swiper'],

  runtimeConfig: {
    public: {
      // У застосунку немає локального сервера, тому дефолти мусять бути
      // абсолютними: WebView звертається до продакшн-бекенду напряму.
      apiBase:
        process.env.NUXT_PUBLIC_API_BASE ||
        (isApp ? 'https://develop-site.online/api' : 'http://localhost:8000/api'),
      assetBase:
        process.env.NUXT_PUBLIC_ASSET_BASE ||
        (isApp ? 'https://develop-site.online' : 'http://localhost:8000'),
      siteUrl:
        process.env.NUXT_PUBLIC_SITE_URL ||
        (isApp ? 'https://develop-site.online' : 'http://localhost:3000'),
      isApp,
    },
  },

  app: {
    head: {
      htmlAttrs: { lang: 'uk' },
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { property: 'og:site_name', content: 'PELOVIT-R' },
        { property: 'og:locale', content: 'uk_UA' },
        { name: 'twitter:card', content: 'summary_large_image' },
        { name: 'twitter:site', content: '@pelovit' },
      ],
      link: [
        {
          rel: 'stylesheet',
          href: 'https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;400;500;600;700&display=swap',
        },
        {
          rel: 'stylesheet',
          href: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        },
        {
          rel: 'stylesheet',
          href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        },
      ],
      script: [
        {
          src: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
          tagPosition: 'bodyClose',
        },
      ],
    },
  },

  css: ['~/assets/sass/main.scss'],

  // Проксі працює лише на веб-збірці (Nitro). У застосунку зображення
  // тягнуться напряму з assetBase через useAsset().
  routeRules: isApp
    ? {}
    : {
        '/images/**': { proxy: 'http://localhost:8000/images/**' },
        '/products/**': { proxy: 'http://localhost:8000/products/**' },
      },

  nitro: isApp ? { preset: 'static' } : {},

  vite: {
    css: {
      preprocessorOptions: {
        scss: {
          silenceDeprecations: ['legacy-js-api'],
        },
      },
    },
  },
})
