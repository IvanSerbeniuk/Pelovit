<script setup lang="ts">
useHead({ title: 'Замовлення оформлено — PELOVIT-R' })
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
    <NuxtLink to="/" class="btn btn-dark px-5 py-3 rad-16">На головну</NuxtLink>
  </div>
</section>
</template>
