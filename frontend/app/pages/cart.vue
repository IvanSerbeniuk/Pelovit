<script setup lang="ts">
import { useCartStore } from '~/stores/cart'

useHead({
  title: 'Кошик — PELOVIT',
})

const config = useRuntimeConfig()
const cartStore = useCartStore()
const { imgSrc, addToCart } = useProduct()
const { assetUrl } = useAsset()

const { data: featuredData } = await useFetch<any>(`${config.public.apiBase}/home`, {
  transform: (d: any) => d.promotions ?? [],
})
const featured = computed(() => featuredData.value ?? [])

const cartTotal = computed(() => cartStore.total)

const pendingRemoveId = ref<number | null>(null)
const addedToCart = ref<Record<number, boolean>>({})

function incQty(id: number) { cartStore.update(id, (cartStore.items.find(i => i.id === id)?.qty ?? 1) + 1) }
function decQty(id: number) { cartStore.update(id, (cartStore.items.find(i => i.id === id)?.qty ?? 2) - 1) }

function askRemove(id: number) {
  pendingRemoveId.value = id
  if (import.meta.client && typeof window.bootstrap !== 'undefined') {
    window.bootstrap.Modal.getOrCreateInstance(document.getElementById('infoModal')).show()
  }
}

function confirmRemove() {
  if (pendingRemoveId.value != null) {
    cartStore.remove(pendingRemoveId.value)
    pendingRemoveId.value = null
  }
  if (import.meta.client && typeof window.bootstrap !== 'undefined') {
    window.bootstrap.Modal.getInstance(document.getElementById('infoModal'))?.hide()
  }
}

function fmt(n: number) { return Math.round(n) + '₴' }

const CROSS_SVG = `<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const CART_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
</script>

<template>
<section class="cart-section">
  <div class="container">
    <h1 class="mb-4">Кошик</h1>
    <div class="row g-5">
      <div class="col-lg-7">
        <div class="d-flex align-items-center flex-grow-1 progress_bar_box">
          <div class="step-circle active">1</div>
          <div class="progress_bar"></div>
          <div class="step-circle">2</div>
          <div class="progress_bar"></div>
          <div class="step-circle">3</div>
        </div>

        <!-- Вміст кошика лежить у localStorage, якого немає на сервері: без
             ClientOnly серверна розмітка (порожній кошик) не збігається з
             клієнтською і Vue лається на розбіжність гідратації. -->
        <ClientOnly>
          <template #fallback>
            <div class="cart_wrapper gap-2 d-flex flex-column mt-4">
              <p class="text-muted">Завантаження кошика…</p>
            </div>
          </template>
        <div class="cart_wrapper gap-2 d-flex flex-column mt-4">
          <div v-if="cartStore.items.length === 0" class="cart-empty text-center py-5">
            <p class="text-muted mb-1">Ваш кошик порожній.</p>
            <p class="text-muted small mb-4">Оберіть щось із каталогу — ми додали туди новинки.</p>
            <NuxtLink to="/catalog" class="btn btn-brown px-5 py-3 rad-16">Перейти до каталогу</NuxtLink>
          </div>
          <div v-for="item in cartStore.items" :key="item.id"
               class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
            <img :src="imgSrc(item.image)" :alt="item.name" class="product-img" loading="lazy" decoding="async">
            <div class="flex-grow-1">
              <h6>{{ item.name }}</h6>
              <div class="d-flex align-items-center gap-2 mt-2 rad-12 count_rates">
                <button class="btn btn-sm" @click="decQty(item.id)">-</button>
                <span class="mx-2">{{ item.qty }}</span>
                <button class="btn btn-sm" @click="incQty(item.id)">+</button>
              </div>
            </div>
            <div class="text-end d-flex flex-column">
              <button class="btn btn-link text-danger" @click="askRemove(item.id)">
                <i class="cross" v-html="CROSS_SVG"></i>
              </button>
              <div class="fw-medium">{{ fmt(parseFloat(String(item.price)) * item.qty) }}</div>
            </div>
          </div>
        </div>
        </ClientOnly>

        <template v-if="featured.length > 0">
          <h5 class="mt-5 mb-3">Акційні товари</h5>
          <div class="d-flex flex-column gap-2">
            <div v-for="product in featured" :key="product.id"
                 class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
              <NuxtLink :to="`/product/${product.slug}`">
                <img :src="assetUrl(product.image)" :alt="product.name" class="product-img" loading="lazy" decoding="async">
              </NuxtLink>
              <div class="flex-grow-1">
                <h6><NuxtLink :to="`/product/${product.slug}`" class="text-dark text-decoration-none">{{ product.name }}</NuxtLink></h6>
                <div class="fw-medium">{{ Math.round(product.price) }}₴</div>
              </div>
              <button class="btn buy rad-16" @click="addToCart(product)">
                <span>Купити</span>
                <span v-html="CART_SVG"></span>
              </button>
            </div>
          </div>
        </template>
      </div>

      <div class="col-lg-5">
        <div class="summary-box">
          <ClientOnly>
          <div class="d-flex justify-content-between mb-2 gray_cl">
            <span>Знижка<span v-if="cartStore.promo"> ({{ cartStore.promo.code }})</span></span>
            <span>{{ cartStore.discount > 0 ? '−' + fmt(cartStore.discount) : '0₴' }}</span>
          </div>
          <p v-if="cartStore.promoShortfall > 0" class="small text-warning-emphasis mb-2">
            Додайте товарів ще на {{ fmt(cartStore.promoShortfall) }}, щоб знижка
            за кодом {{ cartStore.promo?.code }} застосувалась.
          </p>
          <div class="d-flex justify-content-between mb-3 gray_cl">
            <span>Сума</span><span>{{ fmt(cartTotal) }}</span>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <span>Сума замовлення</span>
            <span><strong>{{ fmt(Math.max(0, cartTotal - cartStore.discount)) }}</strong></span>
          </div>
          </ClientOnly>
          <NuxtLink to="/order" class="btn btn-brown w-100 py-3 fs-5 mb-3 rad-16" style="display:flex;align-items:center;justify-content:center;">
            Зробити замовлення
          </NuxtLink>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade delete_item_modal" id="infoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4-0 align-items-center rad-16">
      <div class="modal-header border-0 pb-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <h4 class="mb-4 text-center">Ви справді хочете видалити продукт з кошика?</h4>
      <div class="d-flex gap-2">
        <button type="button" class="btn btn_cancel" data-bs-dismiss="modal">Скасувати</button>
        <button type="button" class="btn btn_delete" @click="confirmRemove">Видалити</button>
      </div>
    </div>
  </div>
</div>
</template>
