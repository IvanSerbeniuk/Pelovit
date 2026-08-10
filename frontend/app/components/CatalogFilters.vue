<script setup lang="ts">
/**
 * Панель фільтрів каталогу. Одна й та сама розмітка рендериться двічі:
 * як сайдбар на десктопі та як offcanvas на мобільному, — тож логіка
 * живе тут, а не дублюється на сторінці.
 */
const props = defineProps<{
  categories: any[]
  brands: string[]
  /** Панель рендериться двічі — префікс тримає id унікальними в межах сторінки. */
  idPrefix: string
}>()

const uid = (name: string) => `${props.idPrefix}-${name}`

const route = useRoute()
const router = useRouter()

const selectedCategory = computed(() => (route.query.category as string) ?? '')
const selectedBrand = computed(() => (route.query.brand as string) ?? '')
const selectedSort = computed(() => (route.query.sort as string) ?? '')

const minPrice = ref((route.query.min_price as string) ?? '')
const maxPrice = ref((route.query.max_price as string) ?? '')

// Ціну вводять в обох копіях панелі (сайдбар + offcanvas) і міняють
// кнопками «Скинути» — без синхронізації поля розʼїжджаються з URL.
watch(() => [route.query.min_price, route.query.max_price], ([min, max]) => {
  minPrice.value = (min as string) ?? ''
  maxPrice.value = (max as string) ?? ''
})

function pushQuery(patch: Record<string, any>) {
  router.push({ query: { ...route.query, ...patch, page: undefined } })
}

function toggleCategory(slug: string) {
  pushQuery({ category: selectedCategory.value === slug ? undefined : slug })
}

function toggleBrand(brand: string) {
  pushQuery({ brand: selectedBrand.value === brand ? undefined : brand })
}

function setSort(sort: string) {
  pushQuery({ sort: selectedSort.value === sort ? undefined : sort })
}

function applyPrice() {
  pushQuery({
    min_price: minPrice.value || undefined,
    max_price: maxPrice.value || undefined,
  })
}
</script>

<template>
  <div class="catalog-filters">
    <div class="mb-4">
      <h6 class="fw-semibold mb-3">Сортування</h6>
      <div class="filter-check">
        <input type="checkbox" :id="uid('sort-featured')" :checked="selectedSort === 'featured'" @change="setSort('featured')">
        <label :for="uid('sort-featured')">За популярністю</label>
      </div>
      <div class="filter-check">
        <input type="checkbox" :id="uid('sort-new')" :checked="selectedSort === 'new'" @change="setSort('new')">
        <label :for="uid('sort-new')">Новинки</label>
      </div>
      <div class="filter-check">
        <input type="checkbox" :id="uid('sort-price-asc')" :checked="selectedSort === 'price_asc'" @change="setSort('price_asc')">
        <label :for="uid('sort-price-asc')">Ціна: від дешевих</label>
      </div>
      <div class="filter-check">
        <input type="checkbox" :id="uid('sort-price-desc')" :checked="selectedSort === 'price_desc'" @change="setSort('price_desc')">
        <label :for="uid('sort-price-desc')">Ціна: від дорогих</label>
      </div>
    </div>

    <div class="mb-4">
      <h6 class="fw-semibold mb-3">Категорії</h6>
      <div v-for="cat in categories" :key="cat.id" class="mb-1">
        <div class="filter-check">
          <input
            type="checkbox"
            :id="uid(`cat-${cat.slug}`)"
            :checked="selectedCategory === cat.slug"
            @change="toggleCategory(cat.slug)"
          >
          <label :for="uid(`cat-${cat.slug}`)">{{ cat.name }}</label>
        </div>
        <div v-if="cat.children?.length" class="ps-3 mt-1">
          <div v-for="child in cat.children" :key="child.id" class="filter-check filter-check--sm">
            <input
              type="checkbox"
              :id="uid(`cat-${child.slug}`)"
              :checked="selectedCategory === child.slug"
              @change="toggleCategory(child.slug)"
            >
            <label :for="uid(`cat-${child.slug}`)">{{ child.name }}</label>
          </div>
        </div>
      </div>
    </div>

    <div v-if="brands.length" class="mb-4">
      <h6 class="fw-semibold mb-3">Бренд</h6>
      <div v-for="brand in brands" :key="brand" class="filter-check">
        <input
          type="checkbox"
          :id="uid(`brand-${brand}`)"
          :checked="selectedBrand === brand"
          @change="toggleBrand(brand)"
        >
        <label :for="uid(`brand-${brand}`)">{{ brand }}</label>
      </div>
    </div>

    <div class="mb-4">
      <h6 class="fw-semibold mb-3">Ціна (₴)</h6>
      <div class="d-flex gap-2 align-items-center">
        <input
          v-model="minPrice"
          type="number"
          class="form-control form-control-sm"
          placeholder="від"
          min="0"
          aria-label="Ціна від"
          @keyup.enter="applyPrice"
        >
        <span class="text-muted">—</span>
        <input
          v-model="maxPrice"
          type="number"
          class="form-control form-control-sm"
          placeholder="до"
          min="0"
          aria-label="Ціна до"
          @keyup.enter="applyPrice"
        >
        <button class="btn btn-sm btn-dark" @click="applyPrice">OK</button>
      </div>
    </div>
  </div>
</template>
