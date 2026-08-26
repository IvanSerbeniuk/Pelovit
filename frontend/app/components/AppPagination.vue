<script setup lang="ts">
const props = withDefaults(defineProps<{
  current: number
  last: number
  ariaLabel?: string
}>(), { ariaLabel: 'Сторінки' })

const emit = defineEmits<{ change: [page: number] }>()

// Свої номери замість links від Laravel: у label приходять ключі
// 'pagination.previous'/'pagination.next' — для локалі uk перекладів немає.
const pages = computed(() => {
  const total = props.last
  const current = props.current

  if (total <= 7) return Array.from({ length: total }, (_, i) => i + 1)

  const set = new Set([1, total, current])
  for (let i = current - 1; i <= current + 1; i++) {
    if (i > 1 && i < total) set.add(i)
  }
  return [...set].sort((a, b) => a - b)
})

function go(page: number) {
  if (page < 1 || page > props.last || page === props.current) return
  emit('change', page)
}
</script>

<template>
  <nav v-if="last > 1" class="pagination-nav" :aria-label="ariaLabel">
    <button
      type="button"
      class="pagination-nav__arrow"
      :disabled="current === 1"
      aria-label="Попередня сторінка"
      @click="go(current - 1)"
    >
      <AppIcon name="chevron-left" />
    </button>

    <ul class="pagination-nav__pages">
      <template v-for="(page, i) in pages" :key="page">
        <li v-if="i > 0 && page - pages[i - 1]! > 1" class="pagination-nav__gap" aria-hidden="true">…</li>
        <li>
          <button
            type="button"
            class="pagination-nav__page"
            :class="{ 'is-current': page === current }"
            :aria-current="page === current ? 'page' : undefined"
            :aria-label="`Сторінка ${page}`"
            @click="go(page)"
          >{{ page }}</button>
        </li>
      </template>
    </ul>

    <button
      type="button"
      class="pagination-nav__arrow"
      :disabled="current === last"
      aria-label="Наступна сторінка"
      @click="go(current + 1)"
    >
      <AppIcon name="chevron-right" />
    </button>
  </nav>
</template>
