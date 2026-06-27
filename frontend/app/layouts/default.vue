<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
      <div class="container">
        <NuxtLink class="navbar-brand fw-bold" to="/">
          <span style="color:#422928;">PELOVIT</span><span style="color:#9c6b55;">-R</span>
        </NuxtLink>

        <!-- Mobile-only: wishlist + cart always visible next to toggler -->
        <div class="d-flex d-lg-none gap-1 ms-auto me-1 align-items-center">
          <NuxtLink to="/wishlist" class="nav-icon text-dark position-relative" title="Обране">
            <span v-if="wishlistCount > 0" class="cart-badge">{{ wishlistCount }}</span>
            <svg width="21" height="21" viewBox="0 0 21 19" fill="none"><path d="M18.5152 9.264L10.2652 17.43L2.01516 9.264C1.43802 8.7024 0.983408 8.02732 0.679965 7.28138C0.376523 6.53544 0.230816 5.73475 0.252021 4.92973C0.273226 4.12471 0.460884 3.3328 0.803178 2.60387C1.14547 1.87494 1.63499 1.22477 2.2409 0.69432C2.84681 0.163862 3.55599 -0.23539 4.32378 -0.478301C5.09157 -0.721211 5.90134 -0.80251 6.70209 -0.71709C7.50285 -0.631669 8.27724 -0.381384 8.97652 0.018C9.67581 0.417444 10.2848 0.957312 10.7652 1.60364C11.2476 0.962001 11.8573 0.426853 12.5561 0.031C13.2549 -0.363491 14.0277 -0.610167 14.8262 -0.692918C15.6248 -0.775669 16.4318 -0.692711 17.1967 -0.449233C17.9617 -0.205754 18.6682 0.192987 19.272 0.722068C19.8758 1.25115 20.3638 1.89914 20.7057 2.62552C21.0475 3.35189 21.2357 4.14101 21.2585 4.94347C21.2813 5.74593 21.1383 6.54447 20.8383 7.2891C20.5383 8.03373 20.0879 8.70844 19.5152 9.271" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </NuxtLink>
          <NuxtLink to="/cart" class="nav-icon position-relative text-decoration-none" title="Кошик">
            <span v-if="cartCount > 0" class="cart-badge">{{ cartCount }}</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </NuxtLink>
        </div>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Меню">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto gap-1">
            <li class="nav-item cat-blue radius">
              <div class="wrapper">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><rect x="1" y="1" width="7" height="7" rx="1.5" stroke="#ffffff" stroke-width="1.5"/><rect x="12" y="1" width="7" height="7" rx="1.5" stroke="#ffffff" stroke-width="1.5"/><rect x="1" y="12" width="7" height="7" rx="1.5" stroke="#ffffff" stroke-width="1.5"/><rect x="12" y="12" width="7" height="7" rx="1.5" stroke="#ffffff" stroke-width="1.5"/></svg>
                <NuxtLink class="nav-link" to="/catalog">Каталог</NuxtLink>
              </div>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/">Головна</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/about">Про нас</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/kontractne-vyrobnyctvo">Контрактне виробництво</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/masters">Майстри</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/contacts">Контакти</NuxtLink>
            </li>
          </ul>

          <!-- Desktop-only action icons -->
          <div class="d-none d-lg-flex align-items-center gap-2">
            <NuxtLink to="/catalog" class="nav-icon text-dark" title="Пошук">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="9" cy="9" r="6" stroke="#1A1A1A" stroke-width="1.5"/><path d="M13.5 13.5L17 17" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round"/></svg>
            </NuxtLink>

            <a v-if="phone" :href="`tel:${phone.replace(/\D/g, '')}`" class="nav-icon text-dark" :title="phone">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M3 3h4l2 4.5-2.5 1.5a11 11 0 0 0 4.5 4.5L12.5 11 17 13v4a1 1 0 0 1-1 1C7.163 18 2 12.837 2 5a1 1 0 0 1 1-2z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>

            <NuxtLink to="/wishlist" class="nav-icon text-dark position-relative" title="Обране">
              <span v-if="wishlistCount > 0" id="wishlist-count" class="cart-badge">{{ wishlistCount }}</span>
              <svg width="21" height="21" viewBox="0 0 21 19" fill="none"><path d="M18.5152 9.264L10.2652 17.43L2.01516 9.264C1.43802 8.7024 0.983408 8.02732 0.679965 7.28138C0.376523 6.53544 0.230816 5.73475 0.252021 4.92973C0.273226 4.12471 0.460884 3.3328 0.803178 2.60387C1.14547 1.87494 1.63499 1.22477 2.2409 0.69432C2.84681 0.163862 3.55599 -0.23539 4.32378 -0.478301C5.09157 -0.721211 5.90134 -0.80251 6.70209 -0.71709C7.50285 -0.631669 8.27724 -0.381384 8.97652 0.018C9.67581 0.417444 10.2848 0.957312 10.7652 1.60364C11.2476 0.962001 11.8573 0.426853 12.5561 0.031C13.2549 -0.363491 14.0277 -0.610167 14.8262 -0.692918C15.6248 -0.775669 16.4318 -0.692711 17.1967 -0.449233C17.9617 -0.205754 18.6682 0.192987 19.272 0.722068C19.8758 1.25115 20.3638 1.89914 20.7057 2.62552C21.0475 3.35189 21.2357 4.14101 21.2585 4.94347C21.2813 5.74593 21.1383 6.54447 20.8383 7.2891C20.5383 8.03373 20.0879 8.70844 19.5152 9.271" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </NuxtLink>

            <NuxtLink to="/cart" class="nav-cart position-relative text-decoration-none" title="Кошик">
              <span v-if="cartCount > 0" id="cart-count" class="cart-badge">{{ cartCount }}</span>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              <span class="cart-label">Кошик</span>
            </NuxtLink>
          </div>

          <!-- Mobile-only: search + phone in collapsed menu -->
          <div class="d-flex d-lg-none border-top pt-3 pb-1 mt-2 gap-4">
            <NuxtLink to="/catalog" class="nav-menu-action text-decoration-none d-flex align-items-center gap-2">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><circle cx="9" cy="9" r="6" stroke="#1A1A1A" stroke-width="1.5"/><path d="M13.5 13.5L17 17" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round"/></svg>
              Пошук
            </NuxtLink>
            <a v-if="phone" :href="`tel:${phone.replace(/\D/g, '')}`" class="nav-menu-action text-decoration-none d-flex align-items-center gap-2">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M3 3h4l2 4.5-2.5 1.5a11 11 0 0 0 4.5 4.5L12.5 11 17 13v4a1 1 0 0 1-1 1C7.163 18 2 12.837 2 5a1 1 0 0 1 1-2z" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              {{ phone }}
            </a>
          </div>
        </div>
      </div>
    </nav>

    <slot />

    <section class="loyalty-footer py-5">
      <div class="container">
        <div class="row align-items-center g-5">
          <div class="col-lg-7">
            <h2 class="fw-bold display-5 mb-3">Приєднуйтесь до нашої програми лояльності!</h2>
            <p class="lead text-muted">
              Реєструйтеся на сайті та отримуйте бонуси за покупки,<br>
              спеціальні пропозиції та персональні знижки.
            </p>
          </div>
          <div class="col-lg-5">
            <form class="loyalty-form">
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Ім'я" required>
              </div>
              <div class="mb-3">
                <input type="tel" class="form-control" placeholder="Номер телефону" required>
              </div>
              <div class="mb-4">
                <input type="email" class="form-control" placeholder="Електронна пошта" required>
              </div>
              <button type="submit" class="btn btn-dark w-100 py-3 fw-medium rounded-3">Підписатись</button>
              <p class="text-center text-muted mt-3 small">
                By clicking the button, I agree to the personal data processing policy.
              </p>
            </form>
          </div>
        </div>

        <hr class="my-5 border-light">

        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <h3 class="fw-bold mb-4">PELOVIT-R</h3>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="fw-semibold mb-3">Навігація</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><NuxtLink to="/about" class="text-dark text-decoration-none">Про нас</NuxtLink></li>
              <li class="mb-2"><NuxtLink to="/catalog" class="text-dark text-decoration-none">Препарати</NuxtLink></li>
              <li class="mb-2"><NuxtLink to="/kontractne-vyrobnyctvo" class="text-dark text-decoration-none">Контрактне виробництво</NuxtLink></li>
              <li class="mb-2"><NuxtLink to="/opt" class="text-dark text-decoration-none">Опт закупівлі</NuxtLink></li>
              <li class="mb-2"><NuxtLink to="/masters" class="text-dark text-decoration-none">Майстрам</NuxtLink></li>
              <li><NuxtLink to="/contacts" class="text-dark text-decoration-none">Адреси магазинів</NuxtLink></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="fw-semibold mb-3">Категорія товарів</h6>
            <ul class="list-unstyled">
              <li class="mb-2"><NuxtLink to="/catalog" class="text-dark text-decoration-none">Парфумована лінійка ART17</NuxtLink></li>
              <li class="mb-2"><NuxtLink to="/catalog" class="text-dark text-decoration-none">Лікувальні препарати</NuxtLink></li>
              <li class="mb-2"><NuxtLink to="/catalog" class="text-dark text-decoration-none">Доглядова косметика</NuxtLink></li>
              <li class="mb-2"><NuxtLink to="/catalog" class="text-dark text-decoration-none">PRO серія Майстер</NuxtLink></li>
              <li><NuxtLink to="/catalog" class="text-dark text-decoration-none">Комплекси</NuxtLink></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="fw-semibold mb-3">Контакти</h6>
            <ul class="list-unstyled">
              <li v-if="settings?.email" class="mb-3">
                <a :href="`mailto:${settings.email}`" class="text-dark text-decoration-none">✉ {{ settings.email }}</a>
              </li>
              <li v-for="key in ['phone', 'phone_2', 'phone_3']" :key="key" class="mb-2">
                <a v-if="settings?.[key]" :href="`tel:${settings[key].replace(/\D/g, '')}`" class="text-dark text-decoration-none">
                  ☎ {{ settings[key] }}
                </a>
              </li>
            </ul>
            <div class="d-flex gap-3 mt-3">
              <a v-if="settings?.instagram_url" :href="settings.instagram_url" target="_blank" rel="noopener" class="text-dark fs-4">
                <i class="fab fa-instagram"></i>
              </a>
              <a v-if="settings?.facebook_url" :href="settings.facebook_url" target="_blank" rel="noopener" class="text-dark fs-4">
                <i class="fab fa-facebook"></i>
              </a>
              <a v-if="settings?.youtube_url" :href="settings.youtube_url" target="_blank" rel="noopener" class="text-dark fs-4">
                <i class="fab fa-youtube"></i>
              </a>
              <a v-if="settings?.telegram_url" :href="settings.telegram_url" target="_blank" rel="noopener" class="text-dark fs-4">
                <i class="fab fa-telegram"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="text-center text-muted mt-5 pt-4 border-top">
          © Pelovit 2025. Політика конфіденційності. Умови використання. Політика cookie.
        </div>
      </div>
    </section>
  </div>
</template>

<script setup lang="ts">
import { useCartStore } from '~/stores/cart'
import { useWishlistStore } from '~/stores/wishlist'

const { data: settings } = await useSettings()

const cartStore = useCartStore()
const wishlistStore = useWishlistStore()

const cartCount = computed(() => cartStore.count)
const wishlistCount = computed(() => wishlistStore.count)
const phone = computed(() => settings.value?.phone || '+38 (063) 309-03-03')
</script>
