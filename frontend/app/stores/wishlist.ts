const WISHLIST_KEY = 'pelovit_wishlist'

interface WishlistItem {
  id: number
  name: string
  price: number
  image: string | null
  slug: string
}

export const useWishlistStore = defineStore('wishlist', {
  state: () => ({
    items: [] as WishlistItem[],
  }),

  getters: {
    count: (state) => state.items.length,
    has: (state) => (id: number) => state.items.some((i) => i.id === id),
  },

  actions: {
    load() {
      if (import.meta.client) {
        try {
          this.items = JSON.parse(localStorage.getItem(WISHLIST_KEY) || '[]')
        } catch {
          this.items = []
        }
      }
    },

    _persist() {
      if (import.meta.client) {
        localStorage.setItem(WISHLIST_KEY, JSON.stringify(this.items))
      }
    },

    toggle(product: WishlistItem) {
      const idx = this.items.findIndex((i) => i.id === product.id)
      if (idx >= 0) {
        this.items.splice(idx, 1)
      } else {
        this.items.push(product)
      }
      this._persist()
    },

    remove(id: number) {
      this.items = this.items.filter((i) => i.id !== id)
      this._persist()
    },
  },
})
