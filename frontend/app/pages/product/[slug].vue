<script setup lang="ts">
const config = useRuntimeConfig()
const route = useRoute()

const { data, error } = await useFetch<any>(`${config.public.apiBase}/products/${route.params.slug}`)

if (error.value) throw createError({ statusCode: 404, message: 'Товар не знайдено' })

const product = computed(() => data.value?.product)
const related = computed(() => data.value?.related ?? [])

useHead({
  title: computed(() => `${product.value?.name ?? 'Товар'} — PELOVIT-R`),
  meta: computed(() => [
    { name: 'description', content: product.value?.description ?? `${product.value?.name} — косметика PELOVIT-R. Замовляйте з доставкою по Україні.` },
    { property: 'og:title', content: `${product.value?.name} — PELOVIT-R` },
    { property: 'og:image', content: product.value?.image ? `/${product.value.image}` : '' },
    { property: 'og:type', content: 'product' },
  ]),
  script: computed(() => [{
    type: 'application/ld+json',
    children: JSON.stringify({
      '@context': 'https://schema.org',
      '@type': 'Product',
      name: product.value?.name,
      description: product.value?.description,
      image: product.value?.image ? `/${product.value.image}` : undefined,
      brand: { '@type': 'Brand', name: product.value?.brand ?? 'PELOVIT-R' },
      offers: {
        '@type': 'Offer',
        price: product.value?.price,
        priceCurrency: 'UAH',
        availability: 'https://schema.org/InStock',
      },
    }),
  }]),
})

const { imgSrc, addToCart: addToCartFn, toggleWishlist: toggleWishlistFn, wishlist } = useProduct()

const qty = ref(1)
const addedToCart = ref(false)

function incQty() { qty.value++ }
function decQty() { if (qty.value > 1) qty.value-- }

function handleAddToCart() {
  if (!product.value) return
  addToCartFn({ ...product.value })
  addedToCart.value = true
  setTimeout(() => { addedToCart.value = false }, 1500)
}

function handleToggleWishlist() {
  if (!product.value) return
  toggleWishlistFn(product.value)
}

const inWishlist = computed(() => product.value ? wishlist.has(product.value.id) : false)

const HEART_OUTLINE = `<svg width="22" height="22" viewBox="0 0 21 19" fill="none"><path d="M18.5152 9.264L10.2652 17.43L2.01516 9.264C1.43802 8.7024 0.983408 8.02732 0.679965 7.28138C0.376523 6.53544 0.230816 5.73475 0.252021 4.92973C0.273226 4.12471 0.460884 3.3328 0.803178 2.60387C1.14547 1.87494 1.63499 1.22477 2.2409 0.69432C2.84681 0.163862 3.55599 -0.23539 4.32378 -0.478301C5.09157 -0.721211 5.90134 -0.80251 6.70209 -0.71709C7.50285 -0.631669 8.27724 -0.381384 8.97652 0.018C9.67581 0.417444 10.2848 0.957312 10.7652 1.60364C11.2476 0.962001 11.8573 0.426853 12.5561 0.031C13.2549 -0.363491 14.0277 -0.610167 14.8262 -0.692918C15.6248 -0.775669 16.4318 -0.692711 17.1967 -0.449233C17.9617 -0.205754 18.6682 0.192987 19.272 0.722068C19.8758 1.25115 20.3638 1.89914 20.7057 2.62552C21.0475 3.35189 21.2357 4.14101 21.2585 4.94347C21.2813 5.74593 21.1383 6.54447 20.8383 7.2891C20.5383 8.03373 20.0879 8.70844 19.5152 9.271" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const HEART_FILLED = `<svg width="22" height="22" viewBox="0 0 21 19" fill="none"><path d="M18.5152 9.264L10.2652 17.43L2.01516 9.264C1.43802 8.7024 0.983408 8.02732 0.679965 7.28138C0.376523 6.53544 0.230816 5.73475 0.252021 4.92973C0.273226 4.12471 0.460884 3.3328 0.803178 2.60387C1.14547 1.87494 1.63499 1.22477 2.2409 0.69432C2.84681 0.163862 3.55599 -0.23539 4.32378 -0.478301C5.09157 -0.721211 5.90134 -0.80251 6.70209 -0.71709C7.50285 -0.631669 8.27724 -0.381384 8.97652 0.018C9.67581 0.417444 10.2848 0.957312 10.7652 1.60364C11.2476 0.962001 11.8573 0.426853 12.5561 0.031C13.2549 -0.363491 14.0277 -0.610167 14.8262 -0.692918C15.6248 -0.775669 16.4318 -0.692711 17.1967 -0.449233C17.9617 -0.205754 18.6682 0.192987 19.272 0.722068C19.8758 1.25115 20.3638 1.89914 20.7057 2.62552C21.0475 3.35189 21.2357 4.14101 21.2585 4.94347C21.2813 5.74593 21.1383 6.54447 20.8383 7.2891C20.5383 8.03373 20.0879 8.70844 19.5152 9.271" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="#422928"/></svg>`
</script>

<template>
<div v-if="product" class="product_name_page" data-product-name="pelovit">
  <section class="container py-5">
    <div class="row g-5">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><NuxtLink to="/">Головна</NuxtLink></li>
          <li class="breadcrumb-item"><NuxtLink to="/catalog">Каталог</NuxtLink></li>
          <li v-if="product.category" class="breadcrumb-item">
            <NuxtLink :to="`/catalog?category=${product.category.slug}`">{{ product.category.name }}</NuxtLink>
          </li>
          <li class="breadcrumb-item active" aria-current="page">{{ product.name }}</li>
        </ol>
      </nav>

      <div class="col-lg-5 left_content">
        <div class="text-center">
          <div class="share_wrapper">
            <i class="share">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><circle cx="17" cy="4" r="3" stroke="#333" stroke-width="1.5"/><circle cx="5" cy="11" r="3" stroke="#333" stroke-width="1.5"/><circle cx="17" cy="18" r="3" stroke="#333" stroke-width="1.5"/><path d="M8 9.5L14 5.5M8 12.5L14 16.5" stroke="#333" stroke-width="1.5" stroke-linecap="round"/></svg>
            </i>
            <button class="like" style="background:none;border:none;cursor:pointer;" @click="handleToggleWishlist">
              <span v-html="inWishlist ? HEART_FILLED : HEART_OUTLINE"></span>
            </button>
          </div>
          <img :src="product.image ? '/' + product.image : '/images/image.png'"
               class="img-fluid product-image shadow-sm rounded" :alt="product.name">
        </div>
      </div>

      <div class="col-lg-7 right_content">
        <h1 class="fw-bold">{{ product.name }}</h1>
        <div class="categories">
          <p v-if="product.category" class="text-muted">{{ product.category.name }}</p>
          <p v-if="product.brand" class="text-muted">{{ product.brand }}</p>
        </div>

        <div class="d-flex align-items-center gap-3 mb-3">
          <h2 class="price mb-0">{{ Math.round(product.price) }}₴</h2>
          <span v-if="product.old_price" class="text-muted text-decoration-line-through fs-5">{{ Math.round(product.old_price) }}₴</span>
        </div>

        <div class="my-4 counter_cart_wrapper">
          <div class="counter">
            <button class="btn_counter minus" @click="decQty">−</button>
            <span class="value">{{ qty }}</span>
            <button class="btn_counter plus" @click="incQty">+</button>
          </div>
          <button class="btn btn-dark btn-lg px-5 me-3 add_incart" @click="handleAddToCart">
            {{ addedToCart ? 'Додано!' : 'Додати в кошик' }}
          </button>
          <button class="btn btn-outline-dark px-5 btn-lg buy_in_oneclick">Купити в один клік</button>
        </div>

        <div class="description_wrapper_dropdown">
          <template v-if="product.description">
            <h5 class="mt-5 mb-3">Опис</h5>
            <p>{{ product.description }}</p>
          </template>
        </div>

        <div class="container faq-container mt-5">
          <h2 class="mb-4">Відповіді на запитання</h2>
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="true">Що таке PELOVIT-R?</button>
              </h2>
              <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Асортимент включає лікувальні препарати, доглядову косметику та контрактне виробництво.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">Яка доставка?</button>
              </h2>
              <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">Доставляємо по всій Україні через Нову Пошту.</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section v-if="related.length > 0" class="py-5 all_categories often_bought">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">З цим товаром часто купують</h2>
            <NuxtLink :to="product.category ? `/catalog?category=${product.category.slug}` : '/catalog'" class="view-all">Переглянути більше</NuxtLink>
          </div>
          <div class="row g-4">
            <div v-for="rel in related" :key="rel.id" class="col-md-3 col-6">
              <ProductCard :product="rel" />
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>
</template>
