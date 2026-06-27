<script setup lang="ts">
useHead({
  title: 'Каталог товарів — PELOVIT-R',
  meta: [
    { name: 'description', content: 'Каталог косметики PELOVIT-R. Лікувальні препарати, доглядова косметика, парфумована лінійка ART17. Замовляйте з доставкою по Україні.' },
  ],
})

const config = useRuntimeConfig()
const route = useRoute()
const router = useRouter()

const { data } = await useFetch<any>(`${config.public.apiBase}/catalog`, {
  query: computed(() => route.query),
})

const products = computed(() => data.value?.products ?? { data: [], last_page: 1, links: [] })
const categories = computed(() => data.value?.categories ?? [])
const filters = computed(() => data.value?.filters ?? {})

function navigatePage(url: string | null) {
  if (!url) return
  const parsed = new URL(url)
  router.push({ query: { ...route.query, page: parsed.searchParams.get('page') } })
}

function fmt(n: number) { return Math.round(n) + '₴' }

function pageLabel(label: string) {
  if (label === 'pagination.previous') return '&lsaquo;'
  if (label === 'pagination.next') return '&rsaquo;'
  return label
}
</script>

<template>
  <section class="category-section py-5 restrict--card-heigh">
    <div class="container">
      <div class="row cards">
        <div v-for="cat in categories" :key="cat.id" class="cat_card">
          <NuxtLink :to="`/catalog?category=${cat.slug}`" class="text-decoration-none d-block">
            <div class="category-card rounded-4 overflow-hidden" :class="{ active: filters.category === cat.slug }">
              <img :src="cat.image ? '/' + cat.image : '/images/image.png'" class="rounded-4 w-100" :alt="cat.name">
              <p class="mt-3 fw-medium cat_name">{{ cat.name }}</p>
            </div>
          </NuxtLink>
          <div v-if="cat.children?.length && filters.category === cat.slug" class="subcategories mt-2 ps-2">
            <NuxtLink
              v-for="child in cat.children"
              :key="child.id"
              :to="`/catalog?category=${child.slug}`"
              class="badge text-decoration-none me-1 mb-1"
              :class="filters.category === child.slug ? 'bg-dark' : 'bg-secondary'"
            >{{ child.name }}</NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Offcanvas фільтри -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="filterOffcanvas">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Фільтри</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <div class="mb-4">
        <h6 class="fw-semibold mb-3">Категорії</h6>
        <div v-for="cat in categories" :key="cat.id" class="mb-2">
          <NuxtLink
            :to="`/catalog?category=${cat.slug}`"
            class="d-block text-decoration-none fw-medium"
            :class="filters.category === cat.slug ? 'text-dark' : 'text-secondary'"
          >{{ cat.name }}</NuxtLink>
          <div v-if="cat.children?.length" class="ps-3 mt-1">
            <NuxtLink
              v-for="child in cat.children"
              :key="child.id"
              :to="`/catalog?category=${child.slug}`"
              class="d-block text-decoration-none small py-1"
              :class="filters.category === child.slug ? 'text-dark fw-semibold' : 'text-secondary'"
            >— {{ child.name }}</NuxtLink>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas-footer p-3 border-top">
      <NuxtLink to="/catalog" class="btn btn-outline-secondary w-100">Скинути фільтри</NuxtLink>
    </div>
  </div>

  <!-- Каталог -->
  <section class="py-5 bg-light all_categories">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">{{ filters.q ? `Результати: «${filters.q}»` : 'Каталог' }}</h2>
        <div class="filters" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" style="cursor:pointer;">
          <div class="content">Фільтри</div>
          <i class="icon_filter">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 4H10V10H4V4Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 4H20V10H14V4Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 14H10V20H4V14Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 17C14 17.7956 14.3161 18.5587 14.8787 19.1213C15.4413 19.6839 16.2044 20 17 20C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17C20 16.2044 19.6839 15.4413 19.1213 14.8787C18.5587 14.3161 17.7956 14 17 14C16.2044 14 15.4413 14.3161 14.8787 14.8787C14.3161 15.4413 14 16.2044 14 17Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </i>
        </div>
      </div>

      <p v-if="!products.data?.length" class="text-muted py-4">Товарів не знайдено.</p>

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
