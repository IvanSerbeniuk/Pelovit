import type { Ref } from 'vue'

/**
 * Посилання «Редагувати в адмінці» для тих, хто вже залогінений у MoonShine.
 *
 * Запит іде тільки з браузера і з кукою сесії: на сервері (SSR) її немає, та
 * й кешувати таку відповідь не можна — для звичайного покупця вона порожня.
 * У застосунку (Capacitor) адмінка не потрібна, тому там не питаємо взагалі.
 */
export function useAdminEditLink(resource: string, id: Ref<number | undefined>) {
  const config = useRuntimeConfig()
  const url = ref<string | null>(null)

  async function load() {
    if (config.public.isApp || !id.value) {
      url.value = null
      return
    }

    try {
      const res = await $fetch<{ authenticated: boolean, url: string | null }>(
        `${config.public.apiBase}/admin/edit-link`,
        { credentials: 'include', query: { resource, id: id.value } },
      )
      url.value = res?.url ?? null
    } catch {
      // Гість отримує 401/419 або CORS-помилку — просто не показуємо кнопку.
      url.value = null
    }
  }

  onMounted(load)
  watch(id, load)

  return { adminEditUrl: url }
}
