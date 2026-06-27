import { useCartStore } from '~/stores/cart'
import { useWishlistStore } from '~/stores/wishlist'

export default defineNuxtPlugin(() => {
  const cart = useCartStore()
  const wishlist = useWishlistStore()
  cart.load()
  wishlist.load()
})
