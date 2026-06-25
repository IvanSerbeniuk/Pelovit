<script setup>
import { ref, computed, onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    featured: Array,
})

const CROSS_SVG = `<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/><path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/></svg>`
const CART_SVG = `<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`

const cartItems = ref([])
const pendingRemoveId = ref(null)
const addedToCart = ref({})
const showDeleteModal = ref(false)

function imgSrc(image) {
    return image ? '/' + image : '/images/image.png'
}
function fmt(n) {
    return Math.round(n) + '₴'
}

function loadCart() {
    if (window.Cart) {
        cartItems.value = [...window.Cart.get()]
    }
}

const cartTotal = computed(() => {
    return cartItems.value.reduce((sum, item) => sum + parseFloat(item.price) * item.qty, 0)
})

function incQty(id) {
    if (!window.Cart) return
    const item = cartItems.value.find(i => i.id === id)
    if (item) { window.Cart.update(id, item.qty + 1); loadCart() }
}

function decQty(id) {
    if (!window.Cart) return
    const item = cartItems.value.find(i => i.id === id)
    if (item) { window.Cart.update(id, item.qty - 1); loadCart() }
}

function askRemove(id) {
    pendingRemoveId.value = id
    showDeleteModal.value = true
    if (typeof bootstrap !== 'undefined') {
        bootstrap.Modal.getOrCreateInstance(document.getElementById('infoModal')).show()
    }
}

function confirmRemove() {
    if (pendingRemoveId.value != null && window.Cart) {
        window.Cart.remove(pendingRemoveId.value)
        pendingRemoveId.value = null
        loadCart()
    }
    showDeleteModal.value = false
    if (typeof bootstrap !== 'undefined') {
        bootstrap.Modal.getInstance(document.getElementById('infoModal'))?.hide()
    }
}

function addFeaturedToCart(product) {
    if (!window.Cart) return
    window.Cart.add({
        id: product.id,
        name: product.name,
        price: parseFloat(product.price),
        image: product.image,
        slug: product.slug,
    })
    addedToCart.value[product.id] = true
    loadCart()
    setTimeout(() => { addedToCart.value[product.id] = false }, 1500)
}

onMounted(() => {
    loadCart()
    window.Cart?._updateBadge()
    window.Wishlist?._updateBadge()
})
</script>

<template>
<section class="cart-section">
  <div class="container">
    <h1 class="mb-4">Кошик</h1>
    <div class="row g-5">

      <!-- Left - Cart Items -->
      <div class="col-lg-7">
        <div class="d-flex align-items-center flex-grow-1 progress_bar_box">
          <div class="step-circle active">1</div>
          <div class="progress_bar"></div>
          <div class="step-circle">2</div>
          <div class="progress_bar"></div>
          <div class="step-circle">3</div>
        </div>

        <div class="reg_inloyal d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
          <p class="mb-3">
            Додайте ще один товар та зареєструйтесь в нашій програмі лояльності, щоб обрати подарунок
          </p>
          <button class="btn btn-brown px-4 mb-4 rad-16" data-bs-toggle="modal" data-bs-target="#loyaltyGiftModal">Зареєструватись</button>
        </div>

        <!-- Cart Items -->
        <div class="cart_wrapper gap-2 d-flex flex-column">
          <p v-if="cartItems.length === 0" class="text-muted">Ваш кошик порожній.</p>
          <div v-for="item in cartItems" :key="item.id"
               class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
            <img :src="imgSrc(item.image)" :alt="item.name" class="product-img">
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
              <div class="fw-medium">{{ fmt(parseFloat(item.price) * item.qty) }}</div>
            </div>
          </div>
        </div>

        <!-- Featured products -->
        <template v-if="featured && featured.length > 0">
          <h5 class="mt-5 mb-3">Акційні товари</h5>
          <div class="d-flex flex-column gap-2">
            <div v-for="product in featured" :key="product.id"
                 class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
              <a :href="`/product/${product.slug}`">
                <img :src="product.image ? '/' + product.image : '/images/image.png'"
                     :alt="product.name" class="product-img">
              </a>
              <div class="flex-grow-1">
                <h6><a :href="`/product/${product.slug}`" class="text-dark text-decoration-none">{{ product.name }}</a></h6>
                <div class="fw-medium">{{ Math.round(product.price) }}₴</div>
              </div>
              <button class="btn buy rad-16"
                :disabled="addedToCart[product.id]"
                @click="addFeaturedToCart(product)">
                <span>{{ addedToCart[product.id] ? '✓' : 'Купити' }}</span>
                <span v-if="!addedToCart[product.id]" v-html="CART_SVG"></span>
              </button>
            </div>
          </div>
        </template>
      </div>

      <!-- Right - Summary -->
      <div class="col-lg-5">
        <div class="summary-box">
          <div class="d-flex justify-content-between mb-2 gray_cl">
            <span>Знижка</span>
            <span>0₴</span>
          </div>
          <div class="d-flex justify-content-between mb-3 gray_cl">
            <span>Сума</span>
            <span>{{ fmt(cartTotal) }}</span>
          </div>

          <div class="loyalty-box mb-4 box-gift">
            <div class="d-flex align-items-start gap-3">
              <span style="font-size: 2rem;">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22 28V44H14C12.4087 44 10.8826 43.3679 9.75736 42.2427C8.63214 41.1174 8 39.5913 8 38V30C8 29.4696 8.21071 28.9609 8.58579 28.5858C8.96086 28.2107 9.46957 28 10 28H22ZM38 28C38.5304 28 39.0391 28.2107 39.4142 28.5858C39.7893 28.9609 40 29.4696 40 30V38C40 39.5913 39.3679 41.1174 38.2426 42.2427C37.1174 43.3679 35.5913 44 34 44H26V28H38ZM33 4.00001C34.181 3.99977 35.3429 4.29835 36.3775 4.86795C37.4121 5.43755 38.2858 6.25966 38.9171 7.25775C39.5485 8.25583 39.9171 9.39744 39.9886 10.5763C40.0601 11.7552 39.8322 12.9329 39.326 14H40C41.0609 14 42.0783 14.4214 42.8284 15.1716C43.5786 15.9217 44 16.9391 44 18V20C44 21.0609 43.5786 22.0783 42.8284 22.8284C42.0783 23.5786 41.0609 24 40 24H26V14H22V24H8C6.93913 24 5.92172 23.5786 5.17157 22.8284C4.42143 22.0783 4 21.0609 4 20V18C4 16.9391 4.42143 15.9217 5.17157 15.1716C5.92172 14.4214 6.93913 14 8 14H8.674C8.22888 13.0626 7.99861 12.0377 8 11C8 7.13401 11.134 4.00001 14.966 4.00001C18.476 3.94001 21.59 6.18401 23.728 9.86801L24 10.354C26.066 6.52601 29.12 4.12601 32.582 4.00401L33 4.00001ZM15 8.00001C14.2044 8.00001 13.4413 8.31608 12.8787 8.87869C12.3161 9.4413 12 10.2044 12 11C12 11.7957 12.3161 12.5587 12.8787 13.1213C13.4413 13.6839 14.2044 14 15 14H21.286C19.804 10.19 17.388 7.96001 15 8.00001ZM32.966 8.00001C30.606 7.96001 28.196 10.192 26.714 14H33C33.7957 13.9955 34.5569 13.6751 35.1163 13.1093C35.6758 12.5435 35.9875 11.7787 35.983 10.983C35.9785 10.1874 35.6581 9.42609 35.0923 8.86667C34.5265 8.30725 33.7617 7.99551 32.966 8.00001Z" fill="#69BDDB"/>
                </svg>
              </span>
              <div class="flex-grow-1">
                Зареєструйтесь в програмі лояльності,<br>
                щоб отримати 60 бонусів на рахунок
              </div>
            </div>
            <button class="btn btn-brown w-100 mt-3 rad-16">Зареєструватись</button>
          </div>

          <div class="d-flex justify-content-between mb-3">
            <span>Сума замовлення</span>
            <span><strong>{{ fmt(cartTotal) }}</strong></span>
          </div>

          <a href="/order" class="btn btn-brown w-100 py-3 fs-5 mb-3 rad-16" style="display:flex;align-items:center;justify-content:center;gap:.5rem;">Зробити замовлення</a>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="instagram">
            <label class="form-check-label small gray_dr_cl" for="instagram">
              Хочу підписатися на Instagram та залишити відгук, щоб отримати тревел-версію продукту (15 мл) у подарунок
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Loyalty Gift Modal -->
<div class="modal fade loyalty_modal" id="loyaltyGiftModal" tabindex="-1" aria-labelledby="loyaltyGiftModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="wrapper_header">
          <h1 class="lead text-center">Зареєструйтесь в нашій програмі лояльності та оберіть 1 із цих подарунків</h1>
        </div>
        <div class="row mt-4" id="giftList">
          <div class="col-md-6 col-lg-3 rad-16 card_mod">
            <div class="gift-option text-center h-100"><img :src="'/images/image.png'" alt="" class="img-fluid card_img"><div class="gift-name">15 мл<br>Спрей від нежиті<br>Доктор Лоріс+</div></div>
          </div>
          <div class="col-md-6 col-lg-3 rad-16 card_mod">
            <div class="gift-option text-center h-100"><img :src="'/images/image.png'" alt="" class="img-fluid card_img"><div class="gift-name">15 мл<br>Масло для тіла<br>Липолитик</div></div>
          </div>
          <div class="col-md-6 col-lg-3 rad-16 card_mod">
            <div class="gift-option text-center h-100"><img :src="'/images/image.png'" alt="" class="img-fluid card_img"><div class="gift-name">15 мл<br>Скраб-бустер<br>для тіла</div></div>
          </div>
          <div class="col-md-6 col-lg-3 rad-16 card_mod">
            <div class="gift-option text-center h-100"><img :src="'/images/image.png'" alt="" class="img-fluid card_img"><div class="gift-name">15 мл<br>Лікувальний<br>ополіскувач</div></div>
          </div>
        </div>
      </div>
      <button class="border-0 mt-3 w-100 text-center btn-register">Зареєструватись</button>
    </div>
  </div>
</div>

<!-- Delete Confirm Modal -->
<div class="modal fade delete_item_modal" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4-0 align-items-center rad-16">
      <div class="modal-header border-0 pb-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <img :src="'/images/image.png'" alt="Товар" class="img-fluid mb-2 rad-16">
      <h4 id="infoModalLabel" class="mb-4 text-center">Ви справді хочете видалити продукт з кошика?</h4>
      <div class="d-flex gap-2">
        <button type="button" class="btn btn_cancel" data-bs-dismiss="modal">Скасувати</button>
        <button type="button" class="btn btn_delete" @click="confirmRemove">Видалити</button>
      </div>
    </div>
  </div>
</div>
</template>
