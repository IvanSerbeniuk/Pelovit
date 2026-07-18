<script setup lang="ts">
import { useCartStore } from '~/stores/cart'

useHead({ title: 'Оформлення замовлення — PELOVIT-R' })

const config = useRuntimeConfig()
const cartStore = useCartStore()
const { assetUrl } = useAsset()
const router = useRouter()
const { data: settings } = useSettings()

const cartTotal = computed(() => cartStore.total)
const submitting = ref(false)
const errors = ref<Record<string, string>>({})

const form = reactive({
  first_name: '',
  last_name: '',
  phone: '',
  email: '',
  city: '',
  branch: '',
  payment_method: 'card',
  comment: '',
})

function fmt(n: number) { return Math.round(n) + '₴' }

async function submitOrder() {
  if (cartStore.items.length === 0) return
  submitting.value = true
  errors.value = {}

  try {
    await $fetch(`${config.public.apiBase}/orders`, {
      method: 'POST',
      body: {
        ...form,
        items: cartStore.items,
        total: cartStore.total,
      },
    })
    cartStore.clear()
    router.push({ path: '/order/success', query: { payment_method: form.payment_method } })
  } catch (err: any) {
    if (err?.data?.errors) {
      errors.value = Object.fromEntries(
        Object.entries(err.data.errors).map(([k, v]: any) => [k, v[0]])
      )
    }
  } finally {
    submitting.value = false
  }
}
</script>

<template>
<section class="container order_section">
  <h1 class="fw-bold mt-4 mb-3">Оформлення замовлення</h1>

  <form @submit.prevent="submitOrder">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Контактні дані</div>
          <div class="card-body p-4 pt-0">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label fw-medium">Ваше ім'я <span class="text-danger">*</span></label>
                <input v-model="form.first_name" type="text" class="form-control" :class="{'is-invalid': errors.first_name}" placeholder="Введіть імʼя" required>
                <div v-if="errors.first_name" class="invalid-feedback">{{ errors.first_name }}</div>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium">Ваше прізвище <span class="text-danger">*</span></label>
                <input v-model="form.last_name" type="text" class="form-control" :class="{'is-invalid': errors.last_name}" placeholder="Введіть прізвище" required>
                <div v-if="errors.last_name" class="invalid-feedback">{{ errors.last_name }}</div>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium">Мобільний телефон</label>
                <input v-model="form.phone" type="tel" class="form-control" :class="{'is-invalid': errors.phone}" placeholder="Введіть телефон" required>
                <div v-if="errors.phone" class="invalid-feedback">{{ errors.phone }}</div>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium">Електронна пошта</label>
                <input v-model="form.email" type="email" class="form-control" placeholder="Введіть електронну пошту">
              </div>
            </div>
          </div>
        </div>

        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Спосіб доставки</div>
          <div class="card-body p-4 pt-0">
            <div class="d-flex align-items-center gap-2 mb-3"><span>Нова пошта</span></div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Місто / Населений пункт</label>
                <input v-model="form.city" type="text" class="form-control" placeholder="Оберіть місто">
              </div>
              <div class="col-md-6">
                <label class="form-label">Номер відділення / поштомату</label>
                <input v-model="form.branch" type="text" class="form-control" placeholder="Відділення №">
              </div>
            </div>
          </div>
        </div>

        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Спосіб оплати</div>
          <div class="card-body p-4 pt-0">
            <div class="form-check mb-3 p-3">
              <input v-model="form.payment_method" class="form-check-input" type="radio" value="card" id="cardPayment">
              <label class="form-check-label" for="cardPayment">Оплата на карту</label>
              <div class="text-muted small mt-1">Проведіть платіж безпосередньо на наш банківський рахунок.</div>
              <div v-if="form.payment_method === 'card' && settings?.payment_card_number" class="alert alert-light border mt-2 mb-0 py-2 px-3 small">
                Номер картки: <strong>{{ settings.payment_card_number }}</strong>
                <span v-if="settings.payment_card_holder"><br>Одержувач: <strong>{{ settings.payment_card_holder }}</strong></span>
              </div>
            </div>
            <div class="form-check p-3 rounded-3">
              <input v-model="form.payment_method" class="form-check-input" type="radio" value="cod" id="cashOnDelivery">
              <label class="form-check-label" for="cashOnDelivery">Оплата при отриманні</label>
              <div class="text-muted small mt-1">Накладений платіж + 20₴</div>
            </div>
          </div>
        </div>

        <div class="card checkout-card mb-4">
          <div class="card-header-custom">Коментар до замовлення</div>
          <div class="card-body p-4 pt-0">
            <textarea v-model="form.comment" class="form-control" rows="3" placeholder="Залишити коментар"></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card checkout-card mb-4 sticky-lg-top" style="top: 20px;">
          <div class="card-header-custom pb-0">Деталі замовлення</div>
          <div class="card-body p-4">
            <div class="cartItemsList">
              <p v-if="cartStore.items.length === 0" class="text-muted">Кошик порожній</p>
              <div v-for="item in cartStore.items" :key="item.id"
                   class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16 mb-2">
                <img :src="assetUrl(item.image)" :alt="item.name" class="product-img">
                <div class="flex-grow-1">
                  <h6>{{ item.name }}</h6>
                  <span class="text-muted small">{{ item.qty }} шт.</span>
                </div>
                <div class="fw-medium">{{ fmt(parseFloat(String(item.price)) * item.qty) }}</div>
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center bottom_sum pt-3">
              <span class="fw-semibold">Сума замовлення</span>
              <span>{{ fmt(cartTotal) }}</span>
            </div>

            <button type="submit" class="btn btn-checkout-primary w-100 text-white mt-4" :disabled="submitting || cartStore.items.length === 0">
              {{ submitting ? 'Оформлення...' : 'Підтвердити замовлення' }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
</template>
