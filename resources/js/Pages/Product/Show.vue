<script setup>
import { ref, onMounted } from 'vue'

const props = defineProps({
    product: Object,
    related: Array,
})

const HEART_OUTLINE = `<svg width="22" height="22" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.5152 9.264L10.2652 17.43L2.01516 9.264C1.43802 8.7024 0.983408 8.02732 0.679965 7.28138C0.376523 6.53544 0.230816 5.73475 0.252021 4.92973C0.273226 4.12471 0.460884 3.3328 0.803178 2.60387C1.14547 1.87494 1.63499 1.22477 2.2409 0.69432C2.84681 0.163862 3.55599 -0.23539 4.32378 -0.478301C5.09157 -0.721211 5.90134 -0.80251 6.70209 -0.71709C7.50285 -0.631669 8.27724 -0.381384 8.97652 0.0180302C9.67581 0.417444 10.2848 0.957312 10.7652 1.60364C11.2476 0.962001 11.8573 0.426853 12.5561 0.0316809C13.2549 -0.363491 14.0277 -0.610167 14.8262 -0.692918C15.6248 -0.775669 16.4318 -0.692711 17.1967 -0.449233C17.9617 -0.205754 18.6682 0.192987 19.272 0.722068C19.8758 1.25115 20.3638 1.89914 20.7057 2.62552C21.0475 3.35189 21.2357 4.14101 21.2585 4.94347C21.2813 5.74593 21.1383 6.54447 20.8383 7.2891C20.5383 8.03373 20.0879 8.70844 19.5152 9.271" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const HEART_FILLED = `<svg width="22" height="22" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.5152 9.264L10.2652 17.43L2.01516 9.264C1.43802 8.7024 0.983408 8.02732 0.679965 7.28138C0.376523 6.53544 0.230816 5.73475 0.252021 4.92973C0.273226 4.12471 0.460884 3.3328 0.803178 2.60387C1.14547 1.87494 1.63499 1.22477 2.2409 0.69432C2.84681 0.163862 3.55599 -0.23539 4.32378 -0.478301C5.09157 -0.721211 5.90134 -0.80251 6.70209 -0.71709C7.50285 -0.631669 8.27724 -0.381384 8.97652 0.0180302C9.67581 0.417444 10.2848 0.957312 10.7652 1.60364C11.2476 0.962001 11.8573 0.426853 12.5561 0.0316809C13.2549 -0.363491 14.0277 -0.610167 14.8262 -0.692918C15.6248 -0.775669 16.4318 -0.692711 17.1967 -0.449233C17.9617 -0.205754 18.6682 0.192987 19.272 0.722068C19.8758 1.25115 20.3638 1.89914 20.7057 2.62552C21.0475 3.35189 21.2357 4.14101 21.2585 4.94347C21.2813 5.74593 21.1383 6.54447 20.8383 7.2891C20.5383 8.03373 20.0879 8.70844 19.5152 9.271" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="#422928"/></svg>`
const CART_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const STAR_SVG = `<svg width="20" height="20" viewBox="0 0 20 20" fill="#FFD700"><path d="M10 1L12.39 6.26L18 7.27L14 11.14L14.76 17L10 14.27L5.24 17L6 11.14L2 7.27L7.61 6.26L10 1Z"/></svg>`

const qty = ref(1)
const inWishlist = ref(false)
const addedToCart = ref(false)

function incQty() { qty.value++ }
function decQty() { if (qty.value > 1) qty.value-- }

function toggleWishlist() {
    if (!window.Wishlist) return
    window.Wishlist.toggle({
        id: props.product.id,
        name: props.product.name,
        price: parseFloat(props.product.price),
        image: props.product.image,
        slug: props.product.slug,
    })
    inWishlist.value = window.Wishlist.has(props.product.id)
    window.Wishlist._updateBadge()
}

function addToCart() {
    if (!window.Cart) return
    window.Cart.add({
        id: props.product.id,
        name: props.product.name,
        price: parseFloat(props.product.price),
        image: props.product.image,
        slug: props.product.slug,
        qty: qty.value,
    })
    addedToCart.value = true
    window.Cart._updateBadge()
    setTimeout(() => { addedToCart.value = false }, 1500)
}

function addRelatedToCart(rel) {
    if (!window.Cart) return
    window.Cart.add({
        id: rel.id,
        name: rel.name,
        price: parseFloat(rel.price),
        image: rel.image,
        slug: rel.slug,
    })
    window.Cart._updateBadge()
}

onMounted(() => {
    if (window.Wishlist) {
        inWishlist.value = window.Wishlist.has(props.product.id)
    }
    window.Cart?._updateBadge()
    window.Wishlist?._updateBadge()
})
</script>

<template>
<div class="product_name_page" data-product-name="pelovit">
  <section class="container py-5">
    <div class="row g-5">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Головна</a></li>
          <li class="breadcrumb-item"><a href="/catalog">Каталог</a></li>
          <li v-if="product.category" class="breadcrumb-item">
            <a :href="`/catalog?category=${product.category.slug}`">{{ product.category.name }}</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">{{ product.name }}</li>
        </ol>
      </nav>

      <!-- Left - Image -->
      <div class="col-lg-5 left_content">
        <div class="text-center">
          <div class="share_wrapper">
            <i class="share">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><circle cx="17" cy="4" r="3" stroke="#333" stroke-width="1.5"/><circle cx="5" cy="11" r="3" stroke="#333" stroke-width="1.5"/><circle cx="17" cy="18" r="3" stroke="#333" stroke-width="1.5"/><path d="M8 9.5L14 5.5M8 12.5L14 16.5" stroke="#333" stroke-width="1.5" stroke-linecap="round"/></svg>
            </i>
            <button class="like" style="background:none;border:none;cursor:pointer;"
              @click="toggleWishlist">
              <span v-html="inWishlist ? HEART_FILLED : HEART_OUTLINE"></span>
            </button>
          </div>
          <img :src="product.image ? '/' + product.image : '/images/image.png'"
               class="img-fluid product-image shadow-sm rounded"
               :alt="product.name">
        </div>
      </div>

      <!-- Right - Info -->
      <div class="col-lg-7 right_content">
        <h1 class="fw-bold">{{ product.name }}</h1>
        <div class="categories">
          <p v-if="product.category" class="text-muted">{{ product.category.name }}</p>
          <p v-if="product.brand" class="text-muted">{{ product.brand }}</p>
        </div>

        <p class="text-muted small">
          Після оформлення вас зв'яжеться продавець-консультант.<br>
          Залишайте оплату будь-яким зручним для вас способом.
        </p>

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
          <button class="btn btn-dark btn-lg px-5 me-3 add_incart" @click="addToCart">
            {{ addedToCart ? 'Додано!' : 'Додати в кошик' }}
          </button>
          <button class="btn btn-outline-dark px-5 btn-lg buy_in_oneclick">Купити в один клік</button>
        </div>

        <!-- Description -->
        <div class="description_wrapper_dropdown">
          <template v-if="product.description">
            <h5 class="mt-5 mb-3">Опис</h5>
            <p>{{ product.description }}</p>
          </template>
        </div>

        <!-- Reviews -->
        <section class="reviews_section">
          <h5 class="mt-5">Відгуки</h5>
          <div class="wrapper_review">
            <div class="avarege_rate_wrapper">
              <div class="averare_rate">
                <span v-html="STAR_SVG"></span>
                <span>4.9</span>
              </div>
              <div class="count_rates">15 відгуків</div>
              <button class="btn py-2 fw-medium rad-16 leave_review">Залишити відгук</button>
            </div>
            <div class="border rad-16 p-3 mb-3 table_rate">
              <div class="mb-4">
                <div class="rating-row"><input type="checkbox" class="bg-white border-secondary"><span class="star-number">5</span><div class="flex-grow-1 bar-container"><div class="bar1"></div></div><span class="ms-2" style="width:48px">96%</span></div>
                <div class="rating-row"><input type="checkbox" class="bg-white border-secondary"><span class="star-number">4</span><div class="flex-grow-1 bar-container"><div class="bar2"></div></div><span class="ms-2" style="width:48px">2%</span></div>
                <div class="rating-row"><input type="checkbox" class="bg-white border-secondary"><span class="star-number">3</span><div class="flex-grow-1 bar-container"><div class="bar3"></div></div><span class="ms-2" style="width:48px">&lt;1%</span></div>
                <div class="rating-row"><input type="checkbox" class="bg-white border-secondary"><span class="star-number">2</span><div class="flex-grow-1 bar-container"><div class="bar4"></div></div><span class="ms-2" style="width:48px">&lt;1%</span></div>
                <div class="rating-row"><input type="checkbox" class="bg-white border-secondary"><span class="star-number">1</span><div class="flex-grow-1 bar-container"><div class="bar5"></div></div><span class="ms-2" style="width:48px">&lt;1%</span></div>
              </div>
            </div>
          </div>
        </section>

        <div class="tabs">
          <button class="tab">Огляди</button>
          <button class="tab active">Відгуки</button>
        </div>

        <!-- Comments -->
        <section class="comments_section">
          <div class="review-card mx-auto">
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div class="d-flex gap-3 align-items-center">
                <div class="avatar">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" width="60" height="60">
                    <path d="M0 0 C39.6 0 79.2 0 120 0 C120 39.6 120 79.2 120 120 C80.4 120 40.8 120 0 120 C0 80.4 0 40.8 0 0 Z" fill="#C5C5C5"/>
                    <path d="M0 0 C8.057 4.291 13.667 10.257 16.395 19.055 C17.653 29.764 16.472 38.938 10.395 48.055 C9.735 48.055 9.075 48.055 8.395 48.055 C8.395 48.715 8.395 49.375 8.395 50.055 C6.728 51.388 5.061 52.721 3.395 54.055 C3.395 54.715 3.395 55.375 3.395 56.055 C4.457 56.346 5.519 56.637 6.613 56.938 C17.398 60.014 25.661 62.939 31.43 73.176 C33.952 78.088 34.395 80.221 34.395 86.055 C6.015 86.055 -22.365 86.055 -51.605 86.055 C-49.676 75.443 -47.986 68.929 -39.418 62.68 C-33.771 59.228 -27.252 57.055 -20.605 57.055 C-20.953 55.079 -20.953 55.079 -21.605 53.055 C-22.265 52.725 -22.925 52.395 -23.605 52.055 C-23.605 51.395 -23.605 50.735 -23.605 50.055 C-24.21 49.815 -24.815 49.575 -25.438 49.328 C-28.08 47.776 -28.875 46.373 -30.293 43.68 C-30.709 42.909 -31.126 42.138 -31.555 41.344 C-35.07 33.685 -34.957 23.534 -32.547 15.547 C-29.06 8.007 -24.698 3.447 -17.219 -0.066 C-11.689 -1.926 -5.498 -1.995 0 0 Z" fill="#FEFEFE" transform="translate(68.605,33.945)"/>
                  </svg>
                </div>
                <div>
                  <h5 class="mb-0 fw-semibold">Валентина</h5>
                  <small class="text-muted">18.03.2025</small>
                </div>
              </div>
              <div class="stars">★★★★★</div>
            </div>
            <p class="review-text mb-4">
              Використовую Пеловіт-Р уже другий тиждень після видалення зуба. Дуже сподобалося, що знімає неприємний біль і набряк буквально після кількох полоскань. Ясна загоїлися швидше, ніж очікувала, і без дискомфорту.
            </p>
            <div class="review-images row g-3">
              <div class="comment_image"><img :src="'/images/smile_big.png'" alt="" class="img-fluid"></div>
              <div class="comment_image"><img :src="'/images/smile_big.png'" alt="" class="img-fluid"></div>
            </div>
          </div>
        </section>

        <a href="#" class="view-all">Показати більше</a>

        <section class="promotion_ad">
          <h4 class="heading">При покупці від 3-х одиниць ПОДАРУНОК на вибір:</h4>
          <div class="cards_promos">
            <div class="card_promo"><img :src="'/images/promo_image.png'" alt="" class="image_promo img-fluid"><div class="title_product">Спрей від нежиті Доктор Лоріс+</div></div>
            <div class="card_promo"><img :src="'/images/promo_image.png'" alt="" class="image_promo img-fluid"><div class="title_product">Масло для тіла Липолитик</div></div>
            <div class="card_promo"><img :src="'/images/promo_image.png'" alt="" class="image_promo img-fluid"><div class="title_product">Скраб-бустер для тiла</div></div>
            <div class="card_promo"><img :src="'/images/promo_image.png'" alt="" class="image_promo img-fluid"><div class="title_product">Лікувальний ополіскувач</div></div>
          </div>
        </section>

        <!-- FAQ -->
        <div class="container faq-container">
          <h2 class="mb-4">Відповіді на запитання</h2>
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
                <div class="accordion-body">Асортимент включає лікувальні препарати (для шкіри, суглобів, ЛОР-області), доглядову косметику (маски, скраби, тоніки).</div>
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

        <!-- Consultation form -->
        <section class="consultation_form">
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
              <a href="#" class="social-link"><svg width="25" height="25" viewBox="0 0 25 25" fill="white"><path d="M12.5 2.25C6.84 2.25 2.25 6.84 2.25 12.5C2.25 18.16 6.84 22.75 12.5 22.75C18.16 22.75 22.75 18.16 22.75 12.5C22.75 6.84 18.16 2.25 12.5 2.25ZM16.5 8.5H14.75C14.06 8.5 13.75 8.81 13.75 9.5V11H16.5L16.12 13.75H13.75V21H11V13.75H9V11H11V9.25C11 7.25 12.25 6 14.25 6H16.5V8.5Z" fill="white"/></svg></a>
              <a href="#" class="social-link"><svg width="25" height="25" viewBox="0 0 25 25" fill="white"><path d="M12.5 2.5C7 2.5 2.5 7 2.5 12.5C2.5 18 7 22.5 12.5 22.5C18 22.5 22.5 18 22.5 12.5C22.5 7 18 2.5 12.5 2.5ZM16.75 9.25L15.37 15.62C15.25 16.12 14.87 16.25 14.5 16L12 14.25L10.75 15.5C10.5 15.75 10.25 15.87 9.87 15.87L10 13.25L14.87 8.87C15.12 8.62 14.75 8.5 14.37 8.75L8.25 12.62L5.87 11.87C5.37 11.75 5.37 11.37 6 11.12L16.12 7.12C16.5 6.87 16.87 7.25 16.75 9.25Z" fill="white"/></svg></a>
            </div>
          </div>
        </section>
      </div>

      <!-- Related Products -->
      <section v-if="related && related.length > 0" class="py-5 all_categories often_bought">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">З цим товаром часто купують</h2>
            <a :href="product.category ? `/catalog?category=${product.category.slug}` : '/catalog'" class="view-all">Переглянути більше</a>
          </div>
          <div class="row g-4">
            <div v-for="rel in related" :key="rel.id" class="col-md-3 col-6">
              <div class="product-card card border-0 shadow-sm rad-16">
                <div class="tag_brown">{{ rel.category ? rel.category.name : '' }}</div>
                <button class="like" style="background:none;border:none;cursor:pointer;">
                  <span v-html="HEART_OUTLINE"></span>
                </button>
                <a :href="`/product/${rel.slug}`">
                  <img :src="rel.image ? '/' + rel.image : '/images/image.png'"
                       class="card-img-top" :alt="rel.name">
                </a>
                <div class="card-body">
                  <h6 class="card-title">
                    <a :href="`/product/${rel.slug}`" class="text-decoration-none text-dark">{{ rel.name }}</a>
                  </h6>
                  <div class="wrapper__price_buy">
                    <div class="disc_price_wrapper">
                      <h4 class="price">{{ Math.round(rel.price) }}₴</h4>
                      <div v-if="rel.old_price" class="disc_price">{{ Math.round(rel.old_price) }}₴</div>
                    </div>
                    <button class="btn buy rad-12" @click="addRelatedToCart(rel)">
                      <span>Купити</span>
                      <span v-html="CART_SVG"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </section>
</div>
</template>
