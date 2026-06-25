<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
    promotions: Array,
    allProducts: Array,
    categories: Array,
    latestPosts: Array,
})

const HEART_OUTLINE = `<svg width="23" height="21" viewBox="0 0 21 19" fill="none"><path d="M18.5152 9.264L10.2652 17.43L2.01516 9.264C1.43802 8.7024 0.983408 8.02732 0.679965 7.28138C0.376523 6.53544 0.230816 5.73475 0.252021 4.92973C0.273226 4.12471 0.460884 3.3328 0.803178 2.60387C1.14547 1.87494 1.63499 1.22477 2.2409 0.69432C2.84681 0.163862 3.55599 -0.23539 4.32378 -0.478301C5.09157 -0.721211 5.90134 -0.80251 6.70209 -0.71709C7.50285 -0.631669 8.27724 -0.381384 8.97652 0.018C9.67581 0.417444 10.2848 0.957312 10.7652 1.60364C11.2476 0.962001 11.8573 0.426853 12.5561 0.031C13.2549 -0.363491 14.0277 -0.610167 14.8262 -0.692918C15.6248 -0.775669 16.4318 -0.692711 17.1967 -0.449233C17.9617 -0.205754 18.6682 0.192987 19.272 0.722068C19.8758 1.25115 20.3638 1.89914 20.7057 2.62552C21.0475 3.35189 21.2357 4.14101 21.2585 4.94347C21.2813 5.74593 21.1383 6.54447 20.8383 7.2891C20.5383 8.03373 20.0879 8.70844 19.5152 9.271" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const CART_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const ARROW_RIGHT = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.3172 10.442L11.6922 16.067C11.5749 16.1843 11.4159 16.2502 11.25 16.2502C11.0841 16.2502 10.9251 16.1843 10.8078 16.067C10.6905 15.9498 10.6247 15.7907 10.6247 15.6249C10.6247 15.459 10.6905 15.2999 10.8078 15.1827L15.3664 10.6249H3.125C2.95924 10.6249 2.80027 10.559 2.68306 10.4418C2.56585 10.3246 2.5 10.1656 2.5 9.99986C2.5 9.8341 2.56585 9.67513 2.68306 9.55792C2.80027 9.44071 2.95924 9.37486 3.125 9.37486H15.3664L10.8078 4.81705C10.6905 4.69977 10.6247 4.54071 10.6247 4.37486C10.6247 4.20901 10.6905 4.04995 10.8078 3.93267C10.9251 3.8154 11.0841 3.74951 11.25 3.74951C11.4159 3.74951 11.5749 3.8154 11.6922 3.93267L17.3172 9.55767C17.3753 9.61572 17.4214 9.68465 17.4529 9.76052C17.4843 9.8364 17.5005 9.91772 17.5005 9.99986C17.5005 10.082 17.4843 10.1633 17.4529 10.2392C17.4214 10.3151 17.3753 10.384 17.3172 10.442Z" fill="#1A1A1A"/></svg>`

const wishlistState = ref({})
const addedToCart = ref({})

function imgSrc(image) {
    return image ? '/' + image : '/images/image.png'
}

function chunkArray(arr, size) {
    const result = []
    for (let i = 0; i < arr.length; i += size) result.push(arr.slice(i, i + size))
    return result
}

function postImg(post) {
    return post.image ? '/' + post.image : `https://picsum.photos/id/${100 + post.id}/600/400`
}

function toggleWishlist(product) {
    if (!window.Wishlist) return
    window.Wishlist.toggle({
        id: product.id, name: product.name,
        price: parseFloat(product.price),
        image: product.image, slug: product.slug,
    })
    wishlistState.value[product.id] = window.Wishlist.has(product.id)
    window.Wishlist._updateBadge()
}

function addToCart(product) {
    if (!window.Cart) return
    window.Cart.add({
        id: product.id, name: product.name,
        price: parseFloat(product.price),
        image: product.image, slug: product.slug,
    })
    addedToCart.value[product.id] = true
    window.Cart._updateBadge()
    setTimeout(() => { addedToCart.value[product.id] = false }, 1500)
}

onMounted(() => {
    window.Cart?._updateBadge()
    window.Wishlist?._updateBadge()
    if (window.Wishlist) {
        const w = window.Wishlist.get()
        w.forEach(i => { wishlistState.value[i.id] = true })
    }
})
</script>

<template>
<!-- Hero Carousel -->
<section class="hero-carousel">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div v-for="n in 3" :key="n" :class="['carousel-item', n === 1 ? 'active' : '']">
        <div class="hero text-white" style="background-image: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url(/images/gl_face.png);">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 mob">
                <h1 class="display-3 fw-bold mb-4">Краса починається зі здорової шкіри.</h1>
                <p class="lead mb-5">Відкрийте для себе догляд для обличчя, що поєднує ефективність сучасних формул і силу натуральних компонентів.</p>
                <a href="/catalog" class="btn btn-light btn-lg px-5 py-3 fw-medium rad-16">Дивитися товари</a>
              </div>
              <div class="col-lg-6 text-end mob">
                <div class="bg-white text-dark p-3 rounded-4 shadow-sm d-inline-block card-pelov">
                  <div class="tag_brown">Обличчя</div>
                  <img :src="'/images/classic300.png'" alt="Pelovit-R" class="img-fluid rounded-3">
                  <h5 class="mt-3">Пеловіт-Р Класичний 500мл</h5>
                  <div class="mt-3 wrapper__price_buy">
                    <h4 class="price">6908 ₴</h4>
                    <a href="/catalog" class="btn buy rad-16">
                      <span>Купити</span>
                      <span v-html="CART_SVG"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>

<!-- Promotions -->
<section class="py-5 bg-light promotions">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Акції</h2>
      <a href="/catalog" class="view-all">Переглянути більше</a>
    </div>
    <div class="row g-4">
      <div v-for="product in promotions" :key="product.id" class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">{{ product.category ? product.category.name : 'Акція' }}</div>
          <button class="like" style="background:none;border:none;cursor:pointer;" @click="toggleWishlist(product)">
            <span v-html="HEART_OUTLINE"></span>
          </button>
          <a :href="`/product/${product.slug}`">
            <img :src="imgSrc(product.image)" class="card-img-top" :alt="product.name">
          </a>
          <div class="card-body">
            <h6 class="card-title">
              <a :href="`/product/${product.slug}`" class="text-decoration-none text-dark">{{ product.name }}</a>
            </h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">{{ Math.round(product.price) }}₴</h4>
                <div v-if="product.old_price" class="disc_price">{{ Math.round(product.old_price) }}₴</div>
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
  </div>
</section>

<!-- Categories -->
<section class="category-section py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold mb-4">Категорії</h2>
      <a href="/catalog" class="view-all">Переглянути більше</a>
    </div>
    <div class="row cards">
      <div v-for="category in categories" :key="category.id" class="cat_card">
        <a :href="`/catalog?category=${category.slug}`" class="text-decoration-none text-dark">
          <div class="category-card">
            <img :src="category.image ? '/' + category.image : '/images/image.png'"
                 class="rounded-4 w-100" :alt="category.name">
            <p class="mt-3 fw-medium cat_name">{{ category.name }}</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- All Products -->
<section class="py-5 bg-light all_categories">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Всі товари</h2>
      <a href="/catalog" class="view-all">Переглянути більше</a>
    </div>

    <!-- Desktop: 4 per slide -->
    <div class="position-relative all-products-carousel-wrap d-none d-md-block">
      <div id="allProductsCarouselDesktop" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
          <div v-for="(chunk, idx) in chunkArray(allProducts, 4)" :key="idx"
               :class="['carousel-item', idx === 0 ? 'active' : '']">
            <div class="row g-4">
              <div v-for="product in chunk" :key="product.id" class="col-3">
                <div class="product-card card border-0 shadow-sm rad-16">
                  <div class="tag_brown">{{ product.category ? product.category.name : '' }}</div>
                  <button class="like" style="background:none;border:none;cursor:pointer;" @click="toggleWishlist(product)">
                    <span v-html="HEART_OUTLINE"></span>
                  </button>
                  <a :href="`/product/${product.slug}`">
                    <img :src="imgSrc(product.image)" class="card-img-top" :alt="product.name">
                  </a>
                  <div class="card-body">
                    <h6 class="card-title">
                      <a :href="`/product/${product.slug}`" class="text-decoration-none text-dark">{{ product.name }}</a>
                    </h6>
                    <div class="wrapper__price_buy">
                      <div class="disc_price_wrapper">
                        <h4 class="price">{{ Math.round(product.price) }}₴</h4>
                        <div v-if="product.old_price" class="disc_price">{{ Math.round(product.old_price) }}₴</div>
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
          </div>
        </div>
      </div>
      <button class="all-products-carousel-btn prev" type="button" data-bs-target="#allProductsCarouselDesktop" data-bs-slide="prev">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button class="all-products-carousel-btn next" type="button" data-bs-target="#allProductsCarouselDesktop" data-bs-slide="next">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
    </div>

    <!-- Mobile: 2 per slide -->
    <div class="position-relative all-products-carousel-wrap d-block d-md-none">
      <div id="allProductsCarouselMobile" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
          <div v-for="(chunk, idx) in chunkArray(allProducts, 2)" :key="idx"
               :class="['carousel-item', idx === 0 ? 'active' : '']">
            <div class="row g-4">
              <div v-for="product in chunk" :key="product.id" class="col-6">
                <div class="product-card card border-0 shadow-sm rad-16">
                  <div class="tag_brown">{{ product.category ? product.category.name : '' }}</div>
                  <button class="like" style="background:none;border:none;cursor:pointer;" @click="toggleWishlist(product)">
                    <span v-html="HEART_OUTLINE"></span>
                  </button>
                  <a :href="`/product/${product.slug}`">
                    <img :src="imgSrc(product.image)" class="card-img-top" :alt="product.name">
                  </a>
                  <div class="card-body">
                    <h6 class="card-title">
                      <a :href="`/product/${product.slug}`" class="text-decoration-none text-dark">{{ product.name }}</a>
                    </h6>
                    <div class="wrapper__price_buy">
                      <div class="disc_price_wrapper">
                        <h4 class="price">{{ Math.round(product.price) }}₴</h4>
                        <div v-if="product.old_price" class="disc_price">{{ Math.round(product.old_price) }}₴</div>
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
          </div>
        </div>
      </div>
      <button class="all-products-carousel-btn prev" type="button" data-bs-target="#allProductsCarouselMobile" data-bs-slide="prev">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button class="all-products-carousel-btn next" type="button" data-bs-target="#allProductsCarouselMobile" data-bs-slide="next">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
    </div>

  </div>
</section>

<!-- Contact Production -->
<section class="py-5 text-white contact-production-section">
  <div class="container">
    <div class="row align-items-center contact_info">
      <div class="col-lg-6 content">
        <h3 class="fw-bold contact_info_head">Контрактне виробництво</h3>
        <p class="contact_info_text">Пропонуємо повний цикл виробництва косметики під вашим брендом — від розробки формули до готової продукції. Забезпечуємо високу якість, сучасні технології та індивідуальний підхід до кожного клієнта</p>
        <a href="/kontractne-vyrobnyctvo" class="btn btn-light rad-16 to_page">До сторінки</a>
      </div>
      <div class="col-lg-6 text-end image-wrapper">
        <img :src="'/images/pexel-mart.jpg'" class="rounded-4 shadow" alt="Контрактне виробництво косметики">
      </div>
    </div>
  </div>
</section>

<!-- Pelovit-R Liman -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center card_liman">
      <h2 class="fw-bold pelovit-content">Pelovit-R — натуральна сила Куяльницького лиману для здоров'я та краси вдома</h2>
      <ul class="list-unstyled features">
        <li>Натуральні компоненти</li>
        <li>Ефект санаторію без виходу з дому</li>
        <li>Продукти для тіла, обличчя та загального оздоровлення</li>
      </ul>
    </div>
  </div>
</section>

<!-- Benefits -->
<section class="benefits-section py-5">
  <div class="container">
    <div class="benefits-grid">
      <div class="benefit-card">
        <div class="icon-wrapper">
          <svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><path d="M40 18L20 32V62H32V46H48V62H60V32L40 18Z" stroke="#7B4F3A" stroke-width="2" fill="none"/><path d="M34 62V52H46V62" stroke="#7B4F3A" stroke-width="2"/></svg>
        </div>
        <div class="benefit-text">
          <h3>Курорт удома</h3>
          <p>Натуральне відновлення з мінералами Куяльника.</p>
        </div>
      </div>
      <div class="benefit-card">
        <div class="icon-wrapper">
          <svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><path d="M40 20C40 20 28 30 28 42C28 48.627 33.373 54 40 54C46.627 54 52 48.627 52 42C52 30 40 20 40 20Z" stroke="#7B4F3A" stroke-width="2" fill="none"/></svg>
        </div>
        <div class="benefit-text">
          <h3>Натуральний склад</h3>
          <p>Грязь, мінерали, олії, безпечні для шкіри.</p>
        </div>
      </div>
      <div class="benefit-card">
        <div class="icon-wrapper">
          <svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><circle cx="40" cy="35" r="12" stroke="#7B4F3A" stroke-width="2" fill="none"/><path d="M32 46L28 60H52L48 46" stroke="#7B4F3A" stroke-width="2"/></svg>
        </div>
        <div class="benefit-text">
          <h3>Українське виробництво</h3>
          <p>10+ років досвіду та сертифікації.</p>
        </div>
      </div>
      <div class="benefit-card">
        <div class="icon-wrapper">
          <svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><circle cx="40" cy="40" r="18" stroke="#7B4F3A" stroke-width="2" fill="none"/><path d="M32 38C32 38 35 42 40 42C45 42 48 38 48 38" stroke="#7B4F3A" stroke-width="2" stroke-linecap="round"/><circle cx="34" cy="34" r="2" fill="#7B4F3A"/><circle cx="46" cy="34" r="2" fill="#7B4F3A"/></svg>
        </div>
        <div class="benefit-text">
          <h3>Видимий результат</h3>
          <p>Детокс, омолодження та регенерація.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Partners -->
<section class="partners-section">
  <div class="container text-center sponsers">
    <h2>Наші партнери</h2>
    <p class="mb-5">Ми співпрацюємо з провідними косметичними брендами, щоб пропонувати вам сертифіковану продукцію найвищої якості та безпеки.</p>
    <div class="marquee-wrapper">
      <div class="marquee-track">
        <img :src="'/images/partner1.png'" alt="Partner" style="height:60px;opacity:.5;" class="me-5">
        <img :src="'/images/partner2.png'" alt="Partner" style="height:60px;opacity:.5;" class="me-5">
        <img :src="'/images/partner3.png'" alt="Partner" style="height:60px;opacity:.5;" class="me-5">
      </div>
    </div>
  </div>
</section>

<!-- Reviews -->
<section class="reviews-section py-5">
  <div class="container">
    <h2 class="mb-5">Відгуки клієнтів</h2>
    <div class="reviews-grid">
      <div class="review-card">
        <div class="review-header">
          <div class="avatar-placeholder"></div>
          <div>
            <h5>Валентина</h5>
            <div class="stars">★★★★★</div>
          </div>
        </div>
        <p class="review-text">Використовую Пеловіт-Р уже другий тиждень після видалення зуба. Дуже сподобалося, що знімає неприємний біль і набряк буквально після кількох полоскань.</p>
        <div class="review-footer">
          <div class="wrapper rad-16">
            <div class="product-info">
              <img :src="'/images/vid_prep.png'" alt="Пеловіт-Р">
              <div class="content_wrapper">
                <div class="prep_name"><div>Пеловіт-Р Класичний</div><div>500мл</div></div>
                <div class="rating">★★★★★</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Loyalty Program -->
<section class="py-5 text-white loyalty-section">
  <div class="container">
    <div class="loyalty-content">
      <div class="loyalty-text">
        <h2>Приєднуйтесь до нашої<br>програми лояльності!</h2>
        <p>Реєструйтесь на сайті та отримуйте бонуси за покупки,<br>спеціальні пропозиції та персональні знижки.</p>
        <button class="btn-register rad-16">Зареєструватись</button>
      </div>
      <div class="loyalty-benefits">
        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="12" fill="white" fill-opacity="0.1"/><rect x="20" y="28" width="40" height="28" rx="4" stroke="white" stroke-width="2"/><path d="M28 28V24C28 20.686 30.686 18 34 18H46C49.314 18 52 20.686 52 24V28" stroke="white" stroke-width="2"/></svg>
          </div>
          <h3>Бонуси за кожну покупку</h3>
        </div>
        <div class="benefit-card blue">
          <div class="icon">👤</div>
          <h3>Персональні знижки</h3>
          <p>Накопичуйте бали та обмінюйте їх на знижки.</p>
        </div>
        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none"><path d="M40 24C40 24 32 20 28 28C24 36 32 40 40 40C48 40 56 36 52 28C48 20 40 24 40 24Z" stroke="white" stroke-width="2" fill="none"/><rect x="24" y="40" width="32" height="20" rx="2" stroke="white" stroke-width="2"/><line x1="40" y1="40" x2="40" y2="60" stroke="white" stroke-width="2"/></svg>
          </div>
          <h3>Подарунки на день народження</h3>
        </div>
        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none"><circle cx="40" cy="40" r="20" stroke="white" stroke-width="2" fill="none"/><text x="40" y="46" text-anchor="middle" fill="white" font-size="18" font-weight="bold">%</text></svg>
          </div>
          <h3>Ранній доступ до акцій</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Medical Journal -->
<section class="medical-journal">
  <div class="container">
    <div class="section-header">
      <h2>Меджурнал</h2>
      <a href="/catalog-journal" class="view-all">Переглянути більше</a>
    </div>
    <div v-if="latestPosts && latestPosts.length > 0" class="articles-grid">
      <div v-for="post in latestPosts" :key="post.id" class="article-card">
        <a :href="`/journal/${post.slug}`" class="text-decoration-none text-dark">
          <div class="article-image">
            <span v-if="post.category" class="tag">{{ post.category }}</span>
            <img :src="postImg(post)" :alt="post.title">
          </div>
          <div class="article-info">
            <span class="date">{{ post.formattedDate }}</span>
            <h3>{{ post.title }}</h3>
            <span class="read-more">Детальніше <span v-html="ARROW_RIGHT"></span></span>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Consultation + FAQ -->
<section class="consultation-section">
  <div class="container">
    <div class="consultation-grid">
      <div class="consultation-form">
        <h2>Запишіться на персональну консультацію</h2>
        <p>Наш фахівець допоможе підібрати ідеальні засоби Pelovit саме для ваших потреб та розповість, як отримати максимальний ефект.</p>
        <form>
          <input type="text" class="width_input" placeholder="Ваше ім'я" required>
          <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required>
          <div class="contact-method">
            <p>Спосіб зв'язку</p>
            <label><input type="radio" name="contact" checked> Дзвінок</label>
            <label><input type="radio" name="contact"> Telegram</label>
            <label><input type="radio" name="contact"> Viber</label>
            <label><input type="radio" name="contact"> WhatsApp</label>
          </div>
          <button type="submit" class="submit-btn">Надіслати</button>
        </form>
        <div class="social-links">
          <p>Ви можете написати нам самі:</p>
          <div class="social-icons">
            <a href="#" target="_blank" rel="noopener">
              <svg width="25" height="25" viewBox="0 0 25 25" fill="none"><rect width="25" height="25" rx="6" fill="#C13584"/><path d="M12.5 7C9.46 7 7 9.46 7 12.5C7 15.54 9.46 18 12.5 18C15.54 18 18 15.54 18 12.5C18 9.46 15.54 7 12.5 7ZM12.5 16.5C10.29 16.5 8.5 14.71 8.5 12.5C8.5 10.29 10.29 8.5 12.5 8.5C14.71 8.5 16.5 10.29 16.5 12.5C16.5 14.71 14.71 16.5 12.5 16.5ZM17.5 8.25C17.5 8.66 17.16 9 16.75 9C16.34 9 16 8.66 16 8.25C16 7.84 16.34 7.5 16.75 7.5C17.16 7.5 17.5 7.84 17.5 8.25Z" fill="white"/></svg>
            </a>
            <a href="#" target="_blank" rel="noopener">
              <svg width="25" height="25" viewBox="0 0 25 25" fill="none"><rect width="25" height="25" rx="6" fill="#29A8E8"/><path d="M19.5 6L5 11.5L10.5 13.5L13 19L15 14.5L19.5 6ZM10.5 13.5L13.5 10.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="container faq-container">
        <h2 class="mb-4">Часті запитання</h2>
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="true">Що таке PELOVIT-R і в чому його особливість?</button>
            </h2>
            <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Асортимент включає лікувальні препарати (для шкіри, суглобів, ЛОР-області), доглядову косметику (маски, скраби, тоніки), а також можливість виготовлення косметики під вашим брендом (контрактне виробництво).</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">З якого матеріалу виготовлені продукти бренду?</button>
            </h2>
            <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Відповідь на друге питання...</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q3">Чи підходить косметика PELOVIT-R для чутливої шкіри?</button>
            </h2>
            <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Відповідь на третє питання...</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q4">Чим відрізняються серії продукції?</button>
            </h2>
            <div id="q4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Асортимент включає лікувальні препарати, доглядову косметику, а також контрактне виробництво.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q5">Яка доставка доступна і чи працюєте по Україні?</button>
            </h2>
            <div id="q5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Доставляємо по всій Україні через Нову Пошту.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q6">Як оформити косметику під власним брендом?</button>
            </h2>
            <div id="q6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Зв'яжіться з нами для обговорення умов контрактного виробництва.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>
