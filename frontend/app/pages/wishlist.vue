<script setup lang="ts">
import { useWishlistStore } from '~/stores/wishlist'

useHead({ title: 'Обране — PELOVIT' })

const wishlistStore = useWishlistStore()
</script>

<template>
<section class="py-5">
  <div class="container">
    <h1 class="mb-4">Обране</h1>
    <!-- Обране зберігається в localStorage — рендеримо лише на клієнті,
         інакше серверна розмітка розходиться з клієнтською. -->
    <ClientOnly>
      <template #fallback>
        <p class="text-muted">Завантаження…</p>
      </template>
      <p v-if="wishlistStore.items.length === 0" class="text-muted">У вас ще немає збережених товарів.</p>
      <div v-else class="row g-4">
        <div v-for="item in wishlistStore.items" :key="item.id" class="col-md-3 col-6">
          <ProductCard :product="item" />
        </div>
      </div>
    </ClientOnly>
  </div>
</section>
</template>
