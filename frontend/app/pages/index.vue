<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation } from 'swiper/modules'
import 'swiper/css'

useHead({
  title: 'PELOVIT-R — Косметика для здорової шкіри',
  meta: [
    { name: 'description', content: 'PELOVIT-R — натуральна косметика з мінералами Куяльницького лиману. Лікувальні препарати, догляд за шкірою, контрактне виробництво.' },
    { property: 'og:title', content: 'PELOVIT-R — Косметика для здорової шкіри' },
    { property: 'og:description', content: 'Натуральна косметика з мінералами Куяльника для тіла, обличчя та оздоровлення.' },
    { property: 'og:type', content: 'website' },
  ],
})

const config = useRuntimeConfig()
const { data } = await useFetch<any>(`${config.public.apiBase}/home`)

const promotions = computed(() => data.value?.promotions ?? [])
const allProducts = computed(() => data.value?.allProducts ?? [])
const categories = computed(() => data.value?.categories ?? [])
const latestPosts = computed(() => data.value?.latestPosts ?? [])

const CART_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const ARROW_RIGHT = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.3172 10.442L11.6922 16.067C11.5749 16.1843 11.4159 16.2502 11.25 16.2502C11.0841 16.2502 10.9251 16.1843 10.8078 16.067C10.6905 15.9498 10.6247 15.7907 10.6247 15.6249C10.6247 15.459 10.6905 15.2999 10.8078 15.1827L15.3664 10.6249H3.125C2.95924 10.6249 2.80027 10.559 2.68306 10.4418C2.56585 10.3246 2.5 10.1656 2.5 9.99986C2.5 9.8341 2.56585 9.67513 2.68306 9.55792C2.80027 9.44071 2.95924 9.37486 3.125 9.37486H15.3664L10.8078 4.81705C10.6905 4.69977 10.6247 4.54071 10.6247 4.37486C10.6247 4.20901 10.6905 4.04995 10.8078 3.93267C10.9251 3.8154 11.0841 3.74951 11.25 3.74951C11.4159 3.74951 11.5749 3.8154 11.6922 3.93267L17.3172 9.55767C17.3753 9.61572 17.4214 9.68465 17.4529 9.76052C17.4843 9.8364 17.5005 9.91772 17.5005 9.99986C17.5005 10.082 17.4843 10.1633 17.4529 10.2392C17.4214 10.3151 17.3753 10.384 17.3172 10.442Z" fill="#1A1A1A"/></svg>`

function postImg(post: any) {
  return post.image ? '/' + post.image : `https://picsum.photos/id/${100 + post.id}/600/400`
}

</script>

<template>
<!-- Hero Carousel -->
<section class="hero-carousel">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
      <button v-for="n in 3" :key="n" type="button" data-bs-target="#heroCarousel" :data-bs-slide-to="n-1" :class="n===1?'active':''"></button>
    </div>
    <div class="carousel-inner">
      <div v-for="n in 3" :key="n" :class="['carousel-item', n === 1 ? 'active' : '']">
        <div class="hero text-white" style="background-image: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url(/images/gl_face.png);">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-6 mob">
                <h1 class="display-3 fw-bold mb-4">Краса починається зі здорової шкіри.</h1>
                <p class="lead mb-5">Відкрийте для себе догляд для обличчя, що поєднує ефективність сучасних формул і силу натуральних компонентів.</p>
                <NuxtLink to="/catalog" class="btn btn-light btn-lg px-5 py-3 fw-medium rad-16">Дивитися товари</NuxtLink>
              </div>
              <div class="col-lg-6 text-end mob d-none d-lg-block">
                <div class="bg-white text-dark p-3 rounded-4 shadow-sm d-inline-block card-pelov">
                  <div class="tag_brown">Обличчя</div>
                  <img :src="'/images/classic300.png'" alt="Pelovit-R" class="img-fluid rounded-3">
                  <h5 class="mt-3">Пеловіт-Р Класичний 500мл</h5>
                  <div class="mt-3 wrapper__price_buy">
                    <h4 class="price">6908 ₴</h4>
                    <NuxtLink to="/catalog" class="btn buy rad-16">
                      <span>Купити</span>
                      <span v-html="CART_SVG"></span>
                    </NuxtLink>
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
      <NuxtLink to="/catalog" class="view-all">Переглянути більше</NuxtLink>
    </div>
    <div class="row g-4">
      <div v-for="product in promotions" :key="product.id" class="col-md-3 col-6">
        <ProductCard :product="product" />
      </div>
    </div>
  </div>
</section>

<!-- Categories -->
<section class="category-section py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold mb-4">Категорії</h2>
      <NuxtLink to="/catalog" class="view-all">Переглянути більше</NuxtLink>
    </div>
    <div class="row cards">
      <div v-for="category in categories" :key="category.id" class="cat_card">
        <NuxtLink :to="`/catalog?category=${category.slug}`" class="text-decoration-none text-dark">
          <div class="category-card">
            <img :src="category.image ? '/' + category.image : '/images/image.png'" class="rounded-4 w-100" :alt="category.name">
            <p class="mt-3 fw-medium cat_name">{{ category.name }}</p>
          </div>
        </NuxtLink>
      </div>
    </div>
  </div>
</section>

<!-- All Products -->
<section class="py-5 bg-light all_categories">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Всі товари</h2>
      <NuxtLink to="/catalog" class="view-all">Переглянути більше</NuxtLink>
    </div>
    <div class="position-relative all-products-carousel-wrap">
      <Swiper
        :modules="[Navigation]"
        :slides-per-view="2"
        :space-between="16"
        :breakpoints="{ 768: { slidesPerView: 3 }, 992: { slidesPerView: 4 } }"
        :navigation="{ prevEl: '.all-products-prev', nextEl: '.all-products-next' }"
        :grab-cursor="true"
      >
        <SwiperSlide v-for="product in allProducts" :key="product.id">
          <ProductCard :product="product" />
        </SwiperSlide>
      </Swiper>
      <button class="all-products-carousel-btn prev all-products-prev">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </button>
      <button class="all-products-carousel-btn next all-products-next">
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
        <p class="contact_info_text">Пропонуємо повний цикл виробництва косметики під вашим брендом — від розробки формули до готової продукції.</p>
        <NuxtLink to="/kontractne-vyrobnyctvo" class="btn btn-light rad-16 to_page">До сторінки</NuxtLink>
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
        <div class="icon-wrapper"><svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><path d="M40 18L20 32V62H32V46H48V62H60V32L40 18Z" stroke="#7B4F3A" stroke-width="2" fill="none"/></svg></div>
        <div class="benefit-text"><h3>Курорт удома</h3><p>Натуральне відновлення з мінералами Куяльника.</p></div>
      </div>
      <div class="benefit-card">
        <div class="icon-wrapper"><svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><path d="M40 20C40 20 28 30 28 42C28 48.627 33.373 54 40 54C46.627 54 52 48.627 52 42C52 30 40 20 40 20Z" stroke="#7B4F3A" stroke-width="2" fill="none"/></svg></div>
        <div class="benefit-text"><h3>Натуральний склад</h3><p>Грязь, мінерали, олії, безпечні для шкіри.</p></div>
      </div>
      <div class="benefit-card">
        <div class="icon-wrapper"><svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><circle cx="40" cy="35" r="12" stroke="#7B4F3A" stroke-width="2" fill="none"/><path d="M32 46L28 60H52L48 46" stroke="#7B4F3A" stroke-width="2"/></svg></div>
        <div class="benefit-text"><h3>Українське виробництво</h3><p>10+ років досвіду та сертифікації.</p></div>
      </div>
      <div class="benefit-card">
        <div class="icon-wrapper"><svg width="80" height="80" viewBox="0 0 80 80" fill="none"><rect width="80" height="80" rx="40" fill="#F5EDE8"/><circle cx="40" cy="40" r="18" stroke="#7B4F3A" stroke-width="2" fill="none"/><path d="M32 38C32 38 35 42 40 42C45 42 48 38 48 38" stroke="#7B4F3A" stroke-width="2" stroke-linecap="round"/><circle cx="34" cy="34" r="2" fill="#7B4F3A"/><circle cx="46" cy="34" r="2" fill="#7B4F3A"/></svg></div>
        <div class="benefit-text"><h3>Видимий результат</h3><p>Детокс, омолодження та регенерація.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- Medical Journal -->
<section class="medical-journal">
  <div class="container">
    <div class="section-header">
      <h2>Меджурнал</h2>
      <NuxtLink to="/catalog-journal" class="view-all">Переглянути більше</NuxtLink>
    </div>
    <div v-if="latestPosts.length > 0" class="articles-grid">
      <div v-for="post in latestPosts" :key="post.id" class="article-card">
        <NuxtLink :to="`/journal/${post.slug}`" class="text-decoration-none text-dark">
          <div class="article-image">
            <span v-if="post.category" class="tag">{{ post.category }}</span>
            <img :src="postImg(post)" :alt="post.title">
          </div>
          <div class="article-info">
            <span class="date">{{ post.formatted_date }}</span>
            <h3>{{ post.title }}</h3>
            <span class="read-more">Детальніше <span v-html="ARROW_RIGHT"></span></span>
          </div>
        </NuxtLink>
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
        <p>Наш фахівець допоможе підібрати ідеальні засоби Pelovit саме для ваших потреб.</p>
        <form>
          <input type="text" class="width_input" placeholder="Ваше ім'я" required>
          <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required>
          <div class="contact-method">
            <p>Спосіб зв'язку</p>
            <label><input type="radio" name="contact" checked> Дзвінок</label>
            <label><input type="radio" name="contact"> Telegram</label>
            <label><input type="radio" name="contact"> Viber</label>
          </div>
          <button type="submit" class="submit-btn">Надіслати</button>
        </form>
      </div>
      <div class="container faq-container">
        <h2 class="mb-4">Часті запитання</h2>
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="true">Що таке PELOVIT-R і в чому його особливість?</button>
            </h2>
            <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Асортимент включає лікувальні препарати, доглядову косметику, а також контрактне виробництво.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">Яка доставка доступна?</button>
            </h2>
            <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Доставляємо по всій Україні через Нову Пошту.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>
