<script setup lang="ts">
// Стара адреса сторінки журналу. Раніше редирект робився через
// router.replace('/journal') в onMounted — він губив query, тож перехід
// із категорії відкривав журнал без фільтра. Тепер параметри зберігаються,
// а редирект віддається ще на сервері.
const route = useRoute()

await navigateTo(
  { path: '/journal', query: route.query },
  { replace: true, redirectCode: 301 },
)
</script>

<template>
  <div></div>
</template>
