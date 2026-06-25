<script setup>
import { ref, computed, onMounted } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const cartItems = ref([])
const cartTotal = computed(() => cartItems.value.reduce((s, i) => s + parseFloat(i.price) * i.qty, 0))

function fmt(n) { return Math.round(n) + '₴' }

function loadCart() {
    if (window.Cart) cartItems.value = [...window.Cart.get()]
}

function submitOrder(e) {
    // Inject cart data into hidden fields before submit
    document.getElementById('order-items-input').value = JSON.stringify(cartItems.value)
    document.getElementById('order-total-input').value = cartTotal.value
}

onMounted(() => {
    loadCart()
    window.Cart?._updateBadge()
    window.Wishlist?._updateBadge()
})
</script>

<template>
<section class="container order_section">
  <h1 class="fw-bold mt-4 mb-3">Оформлення замовлення</h1>

  <form id="order-form" method="POST" action="/order" @submit="submitOrder">
    <input type="hidden" name="_token" :value="$page.props.csrf_token">
    <input type="hidden" name="items" id="order-items-input">
    <input type="hidden" name="total" id="order-total-input">

    <div class="row g-4">
      <!-- Left column: contacts, delivery, payment, comment -->
      <div class="col-lg-7">
        <!-- Contact info -->
        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Контактні дані</div>
          <div class="card-body p-4 pt-0">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label fw-medium">Ваше ім'я <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="first_name" placeholder="Введіть імʼя" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium">Ваше прізвище <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="last_name" placeholder="Введіть прізвище" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium">Мобільний телефон</label>
                <input type="tel" class="form-control" name="phone" placeholder="Введіть телефон" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium">Електронна пошта</label>
                <input type="email" class="form-control" name="email" placeholder="Введіть електронну пошту">
              </div>
            </div>
          </div>
        </div>

        <!-- Delivery -->
        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Спосіб доставки</div>
          <div class="card-body p-4 pt-0">
            <div class="d-flex align-items-center gap-2 mb-3">
              <span>Нова пошта</span>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Місто / Населений пункт</label>
                <input type="text" class="form-control" name="city" placeholder="Оберіть місто">
              </div>
              <div class="col-md-6">
                <label class="form-label">Номер відділення / поштомату</label>
                <input type="text" class="form-control" name="branch" placeholder="Відділення №">
              </div>
            </div>
          </div>
        </div>

        <!-- Payment -->
        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Спосіб оплати</div>
          <div class="card-body p-4 pt-0">
            <div class="form-check mb-3 p-3">
              <div class="wrapper_payment">
                <div class="payment_content">
                  <input class="form-check-input" type="radio" name="payment_method" value="card" id="cardPayment" checked>
                  <label class="form-check-label" for="cardPayment">Оплата на карту</label>
                </div>
                <div class="payment_icons">
                  <i class="master_card">
                    <svg width="53" height="36" viewBox="0 0 53 36" fill="none"><path d="M18 0.5H34.5C44.165 0.5 52 8.335 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.335 35.5 0.5 27.665 0.5 18C0.5 8.335 8.335 0.5 18 0.5Z" stroke="#F3F2F2"/><path d="M33.187 7.836C38.84 7.836 43.422 12.472 43.422 18.19C43.422 23.909 38.84 28.545 33.187 28.545C30.652 28.545 28.335 27.611 26.547 26.067C24.759 27.611 22.442 28.545 19.907 28.545C14.254 28.545 9.672 23.909 9.672 18.19C9.672 12.472 14.254 7.836 19.907 7.836C22.441 7.836 24.759 8.769 26.547 10.313C28.334 8.769 30.652 7.836 33.187 7.836Z" fill="#ED0006"/><path d="M33.187 7.836C38.84 7.836 43.422 12.472 43.422 18.19C43.422 23.909 38.84 28.545 33.187 28.545C30.652 28.545 28.335 27.611 26.547 26.067C28.747 24.168 30.144 21.345 30.144 18.19C30.144 15.035 28.747 12.212 26.547 10.313C28.334 8.769 30.652 7.836 33.187 7.836Z" fill="#F9A000"/><path d="M26.545 10.312C28.745 12.212 30.142 15.035 30.142 18.19C30.142 21.345 28.745 24.168 26.545 26.067C24.346 24.168 22.949 21.345 22.949 18.19C22.949 15.036 24.345 12.212 26.545 10.312Z" fill="#FF5E00"/></svg>
                  </i>
                  <i class="visa">
                    <svg width="53" height="36" viewBox="0 0 53 36" fill="none"><path d="M18 0.5H34.5C44.165 0.5 52 8.335 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.335 35.5 0.5 27.665 0.5 18C0.5 8.335 8.335 0.5 18 0.5Z" stroke="#F3F2F2"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15.938 24.387H12.757L10.372 15.289C10.259 14.87 10.019 14.5 9.665 14.326C8.783 13.887 7.811 13.539 6.75 13.363V13.012H11.874C12.581 13.012 13.111 13.539 13.199 14.15L14.437 20.713L17.616 13.012H20.708L15.938 24.387ZM22.476 24.387H19.472L21.945 13.012H24.949L22.476 24.387ZM28.835 16.164C28.923 15.551 29.454 15.201 30.073 15.201C31.045 15.113 32.104 15.289 32.988 15.725L33.518 13.276C32.634 12.926 31.662 12.75 30.78 12.75C27.864 12.75 25.743 14.326 25.743 16.512C25.743 18.176 27.246 19.049 28.306 19.576C29.454 20.1 29.896 20.451 29.807 20.975C29.807 21.762 28.923 22.113 28.041 22.113C26.98 22.113 25.92 21.85 24.949 21.412L24.419 23.863C25.479 24.299 26.627 24.475 27.688 24.475C30.956 24.562 32.988 22.988 32.988 20.625C32.988 17.65 28.835 17.475 28.835 16.164ZM43.5 24.387L41.115 13.012H38.553C38.023 13.012 37.493 13.363 37.316 13.887L32.899 24.387H35.992L36.609 22.725H40.408L40.762 24.387H43.5ZM38.995 16.076L39.878 20.363H37.404L38.995 16.076Z" fill="#172B85"/></svg>
                  </i>
                </div>
              </div>
              <div class="text-muted small mt-1">Проведіть платіж безпосередньо на наш банківський рахунок. Будь ласка, вкажіть номер Вашого замовлення в описі переказу.</div>
            </div>
            <div class="form-check p-3 rounded-3">
              <input class="form-check-input" type="radio" name="payment_method" value="cod" id="cashOnDelivery">
              <label class="form-check-label" for="cashOnDelivery">Оплата при отриманні</label>
              <div class="text-muted small mt-1">Накладений платіж + 20₴ (згідно з тарифами перевізника)</div>
            </div>
            <div class="form-text mt-3">Ваші особисті дані будуть використані для обробки вашого замовлення.</div>
          </div>
        </div>

        <!-- Comment -->
        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Коментар до замовлення</div>
          <div class="leve_comment">Залишити коментар</div>
          <div class="card-body p-4 pt-0">
            <textarea class="form-control" name="comment" rows="3" placeholder="Залишити коментар (додаткові побажання, зручний час доставки тощо)"></textarea>
          </div>
        </div>
      </div>

      <!-- Right column: order summary -->
      <div class="col-lg-5">
        <div class="card checkout-card mb-4 sticky-lg-top" style="top: 20px;">
          <div class="card-header-custom pb-0">Деталі замовлення</div>
          <div class="card-body p-4">

            <!-- Cart items list -->
            <div class="cartItemsList">
              <p v-if="cartItems.length === 0" class="text-muted">Кошик порожній</p>
              <div v-for="item in cartItems" :key="item.id"
                   class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16 mb-2">
                <img :src="item.image ? '/' + item.image : '/images/image.png'" :alt="item.name" class="product-img">
                <div class="flex-grow-1">
                  <h6>{{ item.name }}</h6>
                  <span class="text-muted small">{{ item.qty }} шт.</span>
                </div>
                <div class="fw-medium">{{ fmt(parseFloat(item.price) * item.qty) }}</div>
              </div>
            </div>

            <!-- Gifts section -->
            <div class="mt-4 pt-2">
              <div class="d-flex justify-content-between align-items-center pb-2">
                <span class="fw-semibold">Ваші подарунки</span>
              </div>
              <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
                <img :src="'/images/image.png'" alt="Пеловіт" class="product-img">
                <div class="flex-grow-1">
                  <h6>Пеловіт-Р Класичний 500мл</h6>
                </div>
                <div class="text-end d-flex flex-column">
                  <div class="fw-medium">690₴</div>
                </div>
              </div>

              <!-- Promo code -->
              <div class="mt-4 promocode_block pb-3">
                <label class="form-label">Промокод</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="promoInput" placeholder="Введіть промокод">
                  <button class="btn actualize" type="button" id="applyPromoBtn">Застосувати</button>
                </div>
                <div class="mt-3 text-gr">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Знижка</span>
                    <span>0₴</span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Сума</span>
                    <span>{{ fmt(cartTotal) }}</span>
                  </div>
                </div>
              </div>

              <!-- Total -->
              <div class="d-flex justify-content-between align-items-center bottom_sum pt-3">
                <span class="fw-semibold">Сума замовлення</span>
                <span>{{ fmt(cartTotal) }}</span>
              </div>
            </div>

            <!-- Agree + submit -->
            <div class="form-check mt-3 mb-3">
              <input class="form-check-input" type="checkbox" id="agreeCheckbox">
              <label class="form-check-label small" for="agreeCheckbox">
                Погоджуюсь на обробку персональних данних
              </label>
            </div>
            <button type="submit" class="btn btn-checkout-primary w-100 text-white" id="confirmOrderBtn">
              Підтвердити замовлення
            </button>
            <div class="text-center mt-3">
              <span class="bonus-note">Після оформлення замовлення на ваш аккаунт буде нараховано 30 бонусів</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
</template>
