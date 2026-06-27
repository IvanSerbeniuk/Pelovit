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

const { imgSrc, addToCart, toggleWishlist, addedToCart, wishlist } = useProduct()

const HEART_OUTLINE = `<svg width="23" height="21" viewBox="0 0 23 21" fill="none"><path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const HEART_FILLED = `<svg width="23" height="21" viewBox="0 0 23 21" fill="none"><path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="#422928"/></svg>`
const CART_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`

function navigatePage(url: string | null) {
  if (!url) return
  const parsed = new URL(url)
  router.push({ query: { ...route.query, page: parsed.searchParams.get('page') } })
}

function fmt(n: number) { return Math.round(n) + '₴' }
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
        <h2 class="fw-bold">Каталог</h2>
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
          <div class="product-card card border-0 shadow-sm rad-16">
            <div v-if="product.category" class="tag_brown">{{ product.category.name }}</div>
            <button
              class="like"
              :class="{ active: wishlist.has(product.id) }"
              style="background:none;border:none;cursor:pointer;"
              @click="toggleWishlist(product)"
              v-html="wishlist.has(product.id) ? HEART_FILLED : HEART_OUTLINE"
            ></button>
            <NuxtLink :to="`/product/${product.slug}`">
              <img :src="imgSrc(product.image)" class="card-img-top" :alt="product.name">
            </NuxtLink>
            <div class="card-body">
              <h6 class="card-title">
                <NuxtLink :to="`/product/${product.slug}`" class="text-decoration-none text-dark">{{ product.name }}</NuxtLink>
              </h6>
              <div class="wrapper__price_buy">
                <div class="disc_price_wrapper">
                  <template v-if="product.old_price">
                    <h4 class="price">{{ fmt(product.old_price) }}</h4>
                    <div class="disc_price">{{ fmt(product.price) }}</div>
                  </template>
                  <h4 v-else class="price">{{ fmt(product.price) }}</h4>
                </div>
                <button class="btn buy rad-12" @click="addToCart(product)" :disabled="addedToCart[product.id]">
                  <span>{{ addedToCart[product.id] ? '✓' : 'Купити' }}</span>
                  <span v-if="!addedToCart[product.id]" v-html="CART_SVG"></span>
                </button>
              </div>
            </div>
          </div>
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
          v-html="link.label"
        ></button>
      </div>
    </div>
  </section>
</template>
