import { useCartStore } from '~/stores/cart'
import { useWishlistStore } from '~/stores/wishlist'

export const useProduct = () => {
  const cart = useCartStore()
  const wishlist = useWishlistStore()
  const { add: addToast } = useToast()
  const addedToCart = ref<Record<number, boolean>>({})
  const config = useRuntimeConfig()

  function imgSrc(image: string | null) {
    return image ? `${config.public.assetBase}/${image}` : '/images/image.png'
  }

  function addToCart(product: { id: number; name: string; price: number | string; image: string | null; slug: string }) {
    cart.add({ ...product, price: parseFloat(String(product.price)), image: product.image })
    addedToCart.value[product.id] = true
    addToast(`${product.name} — додано до кошика`, 'cart')
    setTimeout(() => { addedToCart.value[product.id] = false }, 1500)
  }

  function toggleWishlist(product: { id: number; name: string; price: number | string; image: string | null; slug: string }) {
    const wasInWishlist = wishlist.has(product.id)
    wishlist.toggle({ ...product, price: parseFloat(String(product.price)), image: product.image })
    addToast(wasInWishlist ? 'Видалено з обраного' : 'Додано до обраного', 'wishlist')
  }

  return { imgSrc, addToCart, toggleWishlist, addedToCart, wishlist }
}
