<script setup lang="ts">
useHead({
  title: 'Каталог товарів — PELOVIT-R',
  meta: [
    { name: 'description', content: 'Каталог косметики PELOVIT-R. Лікувальні препарати, доглядова косметика, парфумована лінійка ART17. Замовляйте з доставкою по Україні.' },
  ],
})

const config = useRuntimeConfig()
const { assetUrl } = useAsset()
const route = useRoute()
const router = useRouter()

const { data } = await useFetch<any>(`${config.public.apiBase}/catalog`, {
  query: computed(() => route.query),
})

const products = computed(() => data.value?.products ?? { data: [], last_page: 1, links: [] })
const categories = computed(() => data.value?.categories ?? [])
const brands = computed(() => data.value?.brands ?? [])
const filters = computed(() => data.value?.filters ?? {})

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

const selectedCategory = computed(() => route.query.category as string ?? '')
const selectedBrand = computed(() => route.query.brand as string ?? '')
const selectedSort = computed(() => route.query.sort as string ?? '')
const minPrice = ref(route.query.min_price as string ?? '')
const maxPrice = ref(route.query.max_price as string ?? '')

function toggleCategory(slug: string) {
  const next = selectedCategory.value === slug ? undefined : slug
  router.push({ query: { ...route.query, category: next, page: undefined } })
}

function toggleBrand(brand: string) {
  const next = selectedBrand.value === brand ? undefined : brand
  router.push({ query: { ...route.query, brand: next, page: undefined } })
}

function setSort(sort: string) {
  const next = selectedSort.value === sort ? undefined : sort
  router.push({ query: { ...route.query, sort: next, page: undefined } })
}

function applyPrice() {
  router.push({
    query: {
      ...route.query,
      min_price: minPrice.value || undefined,
      max_price: maxPrice.value || undefined,
      page: undefined,
    },
  })
}

function resetFilters() {
  minPrice.value = ''
  maxPrice.value = ''
  router.push({ path: '/catalog' })
}

const activeFiltersCount = computed(() => {
  let n = 0
  if (filters.value.category) n++
  if (filters.value.brand) n++
  if (filters.value.sort) n++
  if (filters.value.min_price) n++
  if (filters.value.max_price) n++
  if (filters.value.q) n++
  return n
})
</script>

<template>
  <section class="category-section py-5 restrict--card-heigh">
    <div class="container">
      <div class="row cards">
        <div v-for="cat in categories" :key="cat.id" class="cat_card">
          <NuxtLink :to="`/catalog?category=${cat.slug}`" class="text-decoration-none d-block">
            <div class="category-card rounded-4 overflow-hidden" :class="{ active: filters.category === cat.slug }">
              <img :src="assetUrl(cat.image)" class="rounded-4 w-100" :alt="cat.name">
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

      <!-- Сортування -->
      <div class="mb-4">
        <h6 class="fw-semibold mb-3">Сортування</h6>
        <div class="filter-check">
          <input type="checkbox" id="sort-featured" :checked="selectedSort === 'featured'" @change="setSort('featured')">
          <label for="sort-featured">За популярністю</label>
        </div>
        <div class="filter-check">
          <input type="checkbox" id="sort-new" :checked="selectedSort === 'new'" @change="setSort('new')">
          <label for="sort-new">Новинки</label>
        </div>
        <div class="filter-check">
          <input type="checkbox" id="sort-price-asc" :checked="selectedSort === 'price_asc'" @change="setSort('price_asc')">
          <label for="sort-price-asc">Ціна: від дешевих</label>
        </div>
        <div class="filter-check">
          <input type="checkbox" id="sort-price-desc" :checked="selectedSort === 'price_desc'" @change="setSort('price_desc')">
          <label for="sort-price-desc">Ціна: від дорогих</label>
        </div>
      </div>

      <!-- Категорії -->
      <div class="mb-4">
        <h6 class="fw-semibold mb-3">Категорії</h6>
        <div v-for="cat in categories" :key="cat.id" class="mb-1">
          <div class="filter-check">
            <input
              type="checkbox"
              :id="`cat-${cat.slug}`"
              :checked="selectedCategory === cat.slug"
              @change="toggleCategory(cat.slug)"
            >
            <label :for="`cat-${cat.slug}`">{{ cat.name }}</label>
          </div>
          <div v-if="cat.children?.length" class="ps-3 mt-1">
            <div v-for="child in cat.children" :key="child.id" class="filter-check filter-check--sm">
              <input
                type="checkbox"
                :id="`cat-${child.slug}`"
                :checked="selectedCategory === child.slug"
                @change="toggleCategory(child.slug)"
              >
              <label :for="`cat-${child.slug}`">{{ child.name }}</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Бренд -->
      <div v-if="brands.length" class="mb-4">
        <h6 class="fw-semibold mb-3">Бренд</h6>
        <div v-for="brand in brands" :key="brand" class="filter-check">
          <input
            type="checkbox"
            :id="`brand-${brand}`"
            :checked="selectedBrand === brand"
            @change="toggleBrand(brand)"
          >
          <label :for="`brand-${brand}`">{{ brand }}</label>
        </div>
      </div>

      <!-- Ціна -->
      <div class="mb-4">
        <h6 class="fw-semibold mb-3">Ціна (₴)</h6>
        <div class="d-flex gap-2 align-items-center">
          <input
            v-model="minPrice"
            type="number"
            class="form-control form-control-sm"
            placeholder="від"
            min="0"
            @keyup.enter="applyPrice"
          >
          <span class="text-muted">—</span>
          <input
            v-model="maxPrice"
            type="number"
            class="form-control form-control-sm"
            placeholder="до"
            min="0"
            @keyup.enter="applyPrice"
          >
          <button class="btn btn-sm btn-dark" @click="applyPrice">OK</button>
        </div>
      </div>

    </div>
    <div class="offcanvas-footer p-3 border-top">
      <button class="btn btn-outline-secondary w-100" @click="resetFilters">Скинути всі фільтри</button>
    </div>
  </div>

  <!-- Каталог -->
  <section class="py-5 bg-light all_categories">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">{{ filters.q ? `Результати: «${filters.q}»` : 'Каталог' }}</h2>
        <div class="filters" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" style="cursor:pointer;">
          <div class="content">
            Фільтри
            <span v-if="activeFiltersCount" class="badge bg-dark ms-1">{{ activeFiltersCount }}</span>
          </div>
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
