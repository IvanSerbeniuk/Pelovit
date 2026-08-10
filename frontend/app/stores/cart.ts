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
  /** Нижня межа суми, з якої код діє. null — обмеження немає. */
  min_order_total: number | null
}

export const useCartStore = defineStore('cart', {
  state: () => ({
    items: [] as CartItem[],
    promo: null as AppliedPromo | null,
  }),

  getters: {
    count: (state) => state.items.reduce((sum, i) => sum + i.qty, 0),
    total: (state) => state.items.reduce((sum, i) => sum + i.price * i.qty, 0),

    /**
     * Знижка рахується від поточного кошика, а не запамʼятовується разом із
     * кодом: інакше зміна кількості робила б суму неправильною. Остаточне
     * слово все одно за бекендом — він перевіряє код ще раз при оформленні.
     */
    discount(state): number {
      const promo = state.promo
      if (!promo) return 0

      const subtotal = this.total
      if (promo.min_order_total && subtotal < promo.min_order_total) return 0

      const raw = promo.type === 'percent'
        ? Math.round((subtotal * promo.value) / 100 * 100) / 100
        : promo.value

      return Math.min(raw, subtotal)
    },

    /**
     * Скільки не вистачає до мінімальної суми промокоду. 0 — код діє.
     * Потрібно, щоб показати «додайте ще N₴», а не мовчки прибирати знижку.
     */
    promoShortfall(state): number {
      const min = state.promo?.min_order_total
      if (!min) return 0

      return Math.max(0, min - this.total)
    },
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

    add(product: Omit<CartItem, 'qty'>, qty = 1) {
      const existing = this.items.find((i) => i.id === product.id)
      if (existing) {
        existing.qty += qty
      } else {
        this.items.push({ ...product, qty })
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
      this.clearPromo()
      this._persist()
    },
  },
})
