<script setup lang="ts">
useHead({
  title: 'Статус замовлення — PELOVIT',
  // Персональне посилання не має потрапляти в пошук.
  meta: [{ name: 'robots', content: 'noindex, nofollow' }],
})

const config = useRuntimeConfig()
const route = useRoute()
const { imgSrc } = useProduct()

const token = computed(() => (route.query.token as string) ?? '')

const { data: order, error } = await useAsyncData(
  () => `order-track-${token.value}`,
  () => token.value
    ? $fetch<any>(`${config.public.apiBase}/orders/track/${token.value}`)
    : Promise.resolve(null),
  { watch: [token] },
)

const STEPS = [
  { key: 'pending', label: 'Прийнято' },
  { key: 'confirmed', label: 'Підтверджено' },
  { key: 'shipped', label: 'Відправлено' },
  { key: 'completed', label: 'Виконано' },
]

// Скасоване замовлення випадає з лінійного шляху, тож смугу прогресу
// для нього не малюємо взагалі.
const isCancelled = computed(() => order.value?.status === 'cancelled')
const currentStep = computed(() => STEPS.findIndex(s => s.key === order.value?.status))

const PAYMENT_LABELS: Record<string, string> = {
  card: 'Переказ на картку',
  cod: 'Накладний платіж',
  liqpay: 'Оплата карткою онлайн',
}

function fmt(n: number) {
  return Math.round(n) + '₴'
}

function fmtDate(iso: string) {
  return new Date(iso).toLocaleString('uk-UA', {
    day: '2-digit', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit',
  })
}
</script>

<template>
<section class="order-track-section">
  <div class="container">
    <div v-if="!token || error || !order" class="text-center py-5">
      <h1 class="fw-bold mb-3">Замовлення не знайдено</h1>
      <p class="text-muted mb-4">
        Перевірте, чи повністю скопійоване посилання з листа. Якщо воно не працює —
        напишіть нам, і ми підкажемо статус.
      </p>
      <NuxtLink to="/contacts" class="btn btn-dark px-5 py-3 rad-16">Звʼязатися з нами</NuxtLink>
    </div>

    <div v-else class="mx-auto" style="max-width: 720px;">
      <h1 class="fw-bold mb-1">Замовлення №{{ order.id }}</h1>
      <p class="text-muted mb-4">від {{ fmtDate(order.created_at) }}</p>

      <div v-if="isCancelled" class="alert alert-danger rad-16 mb-4">
        <strong>Замовлення скасоване.</strong>
        Якщо це помилка — звʼяжіться з нами, і ми його відновимо.
      </div>

      <div v-else class="track-card mb-4">
        <div class="p-4">
          <div class="d-flex align-items-start track-steps">
            <div
              v-for="(step, i) in STEPS"
              :key="step.key"
              class="track-step"
              :class="{
                'track-step--done': i <= currentStep,
                'track-step--current': i === currentStep,
              }"
            >
              <div class="track-step__circle mx-auto mb-2">{{ i + 1 }}</div>
              <div class="track-step__label">{{ step.label }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="track-card mb-4">
        <div class="track-card__header">Склад замовлення</div>
        <div class="p-4">
          <div
            v-for="item in order.items"
            :key="item.id"
            class="track-item d-flex align-items-center gap-3 py-2"
          >
            <img :src="imgSrc(item.image)" :alt="item.name" class="product-img" loading="lazy" decoding="async">
            <div class="flex-grow-1">
              <h6 class="mb-1">{{ item.name }}</h6>
              <span class="text-muted small">{{ item.qty }} шт.</span>
            </div>
            <div class="fw-medium">{{ fmt(item.price * item.qty) }}</div>
          </div>

          <div v-if="order.discount > 0" class="d-flex justify-content-between pt-3">
            <span>Знижка<span v-if="order.promo_code"> ({{ order.promo_code }})</span></span>
            <span>−{{ fmt(order.discount) }}</span>
          </div>
          <div class="d-flex justify-content-between fw-bold fs-5 pt-2">
            <span>Разом</span>
            <span>{{ fmt(order.total) }}</span>
          </div>
        </div>
      </div>

      <div class="track-card mb-4">
        <div class="track-card__header">Доставка та оплата</div>
        <div class="p-4">
          <dl class="row mb-0 track-meta">
            <dt class="col-sm-4">Одержувач</dt>
            <dd class="col-sm-8">{{ order.first_name }} {{ order.last_name }}</dd>

            <dt class="col-sm-4">Телефон</dt>
            <dd class="col-sm-8">{{ order.phone }}</dd>

            <dt class="col-sm-4">Місто</dt>
            <dd class="col-sm-8">{{ order.city }}</dd>

            <dt class="col-sm-4">Відділення</dt>
            <dd class="col-sm-8">{{ order.branch }}</dd>

            <dt class="col-sm-4">Оплата</dt>
            <dd class="col-sm-8">
              {{ PAYMENT_LABELS[order.payment_method] ?? order.payment_method }}
              <span
                class="badge ms-1"
                :class="order.payment_status === 'paid' ? 'bg-success' : 'bg-secondary'"
              >{{ order.payment_status_label }}</span>
            </dd>

            <template v-if="order.comment">
              <dt class="col-sm-4">Коментар</dt>
              <dd class="col-sm-8 mb-0">{{ order.comment }}</dd>
            </template>
          </dl>
        </div>
      </div>

      <div class="text-center">
        <NuxtLink to="/catalog" class="btn btn-dark px-5 py-3 rad-16">До каталогу</NuxtLink>
      </div>
    </div>
  </div>
</section>
</template>
