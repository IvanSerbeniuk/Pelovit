const CART_KEY = 'pelovit_cart'

interface CartItem {
  id: number
  name: string
  price: number
  image: string | null
  slug: string
  qty: number
}

export const useCartStore = defineStore('cart', {
  state: () => ({
    items: [] as CartItem[],
  }),

  getters: {
    count: (state) => state.items.reduce((sum, i) => sum + i.qty, 0),
    total: (state) => state.items.reduce((sum, i) => sum + i.price * i.qty, 0),
  },

  actions: {
    load() {
      if (import.meta.client) {
        try {
          this.items = JSON.parse(localStorage.getItem(CART_KEY) || '[]')
        } catch {
          this.items = []
        }
      }
    },

    _persist() {
      if (import.meta.client) {
        localStorage.setItem(CART_KEY, JSON.stringify(this.items))
      }
    },

    add(product: Omit<CartItem, 'qty'>) {
      const existing = this.items.find((i) => i.id === product.id)
      if (existing) {
        existing.qty += 1
      } else {
        this.items.push({ ...product, qty: 1 })
      }
      this._persist()
    },

    remove(id: number) {
      this.items = this.items.filter((i) => i.id !== id)
      this._persist()
    },

    update(id: number, qty: number) {
      const item = this.items.find((i) => i.id === id)
      if (item) {
        item.qty = Math.max(1, qty)
        this._persist()
      }
    },

    clear() {
      this.items = []
      this._persist()
    },
  },
})
