<script setup lang="ts">
useSeoPage({
  pageKey: 'promotions',
  fallbackTitle: 'Акції — PELOVIT',
  fallbackDescription: 'Товари зі знижкою від PELOVIT. Косметика за акційними цінами з доставкою по Україні.',
  canonicalPath: '/promotions',
})

const config = useRuntimeConfig()
const route = useRoute()
const router = useRouter()

const { data } = await useFetch<any>(`${config.public.apiBase}/catalog`, {
  query: computed(() => ({ ...route.query, on_sale: 1 })),
})

const products = computed(() => data.value?.products ?? { data: [], last_page: 1, links: [] })

function navigatePage(url: string | null) {
  if (!url) return
  const parsed = new URL(url)
  router.push({ query: { ...route.query, page: parsed.searchParams.get('page') } })
}

function pageLabel(label: string) {
  if (label === 'pagination.previous') return '&lsaquo;'
  if (label === 'pagination.next') return '&rsaquo;'
  return label
}
</script>

<template>
  <section class="py-5 bg-light all_categories">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Акції</h1>
      </div>

      <p v-if="!products.data?.length" class="text-muted py-4">Наразі акційних товарів немає.</p>

      <div v-else class="row g-4">
        <div v-for="product in products.data" :key="product.id" class="col-md-3 col-6">
          <ProductCard :product="product" />
        </div>
      </div>

      <div v-if="products.last_page > 1" class="mt-4 d-flex justify-content-center gap-1">
        <button
          v-for="link in products.links"
          :key="link.label"
          class="btn btn-sm"
          :class="link.active ? 'btn-dark' : 'btn-outline-secondary'"
          :disabled="!link.url"
          @click="navigatePage(link.url)"
          v-html="pageLabel(link.label)"
        ></button>
      </div>
    </div>
  </section>
</template>
