const CART_KEY = 'pelovit_cart'
const PROMO_KEY = 'pelovit_promo'

interface CartItem {
  id: number
  name: string
  price: number
  image: string | null
  slug: string
  qty: number
}

interface AppliedPromo {
  code: string
  type: string
  value: number
  discount: number
}

export const useCartStore = defineStore('cart', {
  state: () => ({
    items: [] as CartItem[],
    promo: null as AppliedPromo | null,
  }),

  getters: {
    count: (state) => state.items.reduce((sum, i) => sum + i.qty, 0),
    total: (state) => state.items.reduce((sum, i) => sum + i.price * i.qty, 0),
    discount: (state) => state.promo?.discount ?? 0,
  },

  actions: {
    load() {
      if (import.meta.client) {
        try {
          this.items = JSON.parse(localStorage.getItem(CART_KEY) || '[]')
        } catch {
          this.items = []
        }
        try {
          this.promo = JSON.parse(localStorage.getItem(PROMO_KEY) || 'null')
        } catch {
          this.promo = null
        }
      }
    },

    _persist() {
      if (import.meta.client) {
        localStorage.setItem(CART_KEY, JSON.stringify(this.items))
        localStorage.setItem(PROMO_KEY, JSON.stringify(this.promo))
      }
    },

    applyPromo(promo: AppliedPromo) {
      this.promo = promo
      this._persist()
    },

    clearPromo() {
      this.promo = null
      this._persist()
    },

    add(product: Omit<CartItem, 'qty'>) {
      const existing = this.items.find((i) => i.id === product.id)
      if (existing) {
        existing.qty += 1
      } else {
        this.items.push({ ...product, qty: 1 })
      }
      this.clearPromo()
      this._persist()
    },

    remove(id: number) {
      this.items = this.items.filter((i) => i.id !== id)
      this.clearPromo()
      this._persist()
    },

    update(id: number, qty: number) {
      const item = this.items.find((i) => i.id === id)
      if (item) {
        item.qty = Math.max(1, qty)
        this.clearPromo()
        this._persist()
      }
    },

    clear() {
      this.items = []
      this.clearPromo()
      this._persist()
    },
  },
})
