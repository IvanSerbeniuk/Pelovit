<script setup lang="ts">
useHead({ title: 'Замовлення оформлено — PELOVIT' })

const route = useRoute()
const { data: settings } = useSettings()
const isCardPayment = computed(() => route.query.payment_method === 'card')
const isLiqpayPayment = computed(() => route.query.payment_method === 'liqpay')
const trackToken = computed(() => (route.query.token as string) ?? '')
</script>

<template>
<section class="container py-5 text-center">
  <div class="py-5">
    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" class="mb-4">
      <circle cx="40" cy="40" r="40" fill="#F0FFF4"/>
      <path d="M24 40L34 50L56 28" stroke="#38A169" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <h1 class="fw-bold mb-3">Замовлення оформлено!</h1>
    <p class="text-muted mb-4">Дякуємо за покупку. Наш менеджер зв'яжеться з вами найближчим часом.</p>

    <div v-if="isLiqpayPayment" class="alert alert-light border d-inline-block mx-auto mb-4" style="max-width: 460px;">
      Дякуємо! Оплата обробляється. Щойно платіж підтвердиться, статус замовлення оновиться автоматично.
    </div>

    <div v-if="isCardPayment && settings?.payment_card_number" class="alert alert-light border d-inline-block text-start mx-auto mb-4" style="max-width: 420px;">
      <div class="fw-semibold mb-1">Реквізити для оплати</div>
      <div>Номер картки: <strong>{{ settings.payment_card_number }}</strong></div>
      <div v-if="settings.payment_card_holder">Одержувач: <strong>{{ settings.payment_card_holder }}</strong></div>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-3">
      <NuxtLink
        v-if="trackToken"
        :to="{ path: '/order/track', query: { token: trackToken } }"
        class="btn btn-dark px-5 py-3 rad-16"
      >Відстежити замовлення</NuxtLink>
      <NuxtLink to="/" class="btn btn-outline-dark px-5 py-3 rad-16">На головну</NuxtLink>
    </div>

    <p v-if="trackToken" class="text-muted small mt-3 mb-0">
      Посилання на статус ми також надіслали вам на пошту.
    </p>
  </div>
</section>
</template>
