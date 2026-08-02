<script setup lang="ts">
// Swiper і його CSS живуть лише тут, тому на сторінках, де каруселі немає,
// вони не потрапляють у критичний шлях. На головній компонент вантажиться
// через <ClientOnly><LazyProductsCarousel>, тобто вже після гідратації.
import { Swiper, SwiperSlide } from 'swiper/vue'
import 'swiper/css'

defineProps<{ products: any[] }>()

const swiper = ref<any>(null)
</script>

<template>
  <div class="swiper-with-nav">
    <button class="section-nav-btn section-nav-btn--side" @click="swiper?.slidePrev()" aria-label="Назад">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <Swiper
      :slides-per-view="2"
      :space-between="16"
      :breakpoints="{ 576: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 992: { slidesPerView: 4 } }"
      :grab-cursor="true"
      @swiper="swiper = $event"
    >
      <SwiperSlide v-for="product in products" :key="product.id">
        <ProductCard :product="product" />
      </SwiperSlide>
    </Swiper>
    <button class="section-nav-btn section-nav-btn--side" @click="swiper?.slideNext()" aria-label="Вперед">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
  </div>
</template>
