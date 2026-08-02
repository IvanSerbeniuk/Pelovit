<script setup lang="ts">
// Поруч із кожним статичним зображенням у public/images лежить готовий
// <ім'я>.webp — але сайт його не використовував. Компонент підставляє webp
// із фолбеком на оригінал.
//
// Для картинок, шлях яких заводять в адмінці (товари, кейси, відгуки),
// webp не гарантований — там передавайте :webp="false".
const props = withDefaults(defineProps<{
  src: string | null | undefined
  alt?: string
  webp?: boolean
  imgClass?: string
  loading?: 'lazy' | 'eager'
}>(), {
  alt: '',
  webp: true,
  imgClass: '',
  loading: 'lazy',
})

const { assetUrl } = useAsset()

const url = computed(() => assetUrl(props.src))
const webpUrl = computed(() => (props.webp ? `${url.value}.webp` : null))
</script>

<template>
  <picture>
    <source v-if="webpUrl" :srcset="webpUrl" type="image/webp">
    <img :src="url" :alt="alt" :class="imgClass" :loading="loading" decoding="async">
  </picture>
</template>

<style scoped>
/* Обгортка не мусить впливати на верстку: наявні селектори виду
   `.hero-image img` і флекс-контейнери мають працювати так само, як з <img>. */
picture {
  display: contents;
}
</style>
