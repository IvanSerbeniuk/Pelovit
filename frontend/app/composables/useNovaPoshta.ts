export interface NovaPoshtaCity {
  ref: string
  name: string
  area: string
}

export interface NovaPoshtaWarehouse {
  ref: string
  description: string
  number: string | null
}

export const useNovaPoshta = () => {
  const config = useRuntimeConfig()

  async function searchCities(query: string): Promise<NovaPoshtaCity[]> {
    if (query.trim().length < 2) return []
    return await $fetch<NovaPoshtaCity[]>(`${config.public.apiBase}/nova-poshta/cities`, {
      params: { q: query },
    })
  }

  async function getWarehouses(cityRef: string): Promise<NovaPoshtaWarehouse[]> {
    if (!cityRef) return []
    return await $fetch<NovaPoshtaWarehouse[]>(`${config.public.apiBase}/nova-poshta/warehouses`, {
      params: { city_ref: cityRef },
    })
  }

  return { searchCities, getWarehouses }
}
