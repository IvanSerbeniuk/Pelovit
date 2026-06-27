import { useCartStore } from '~/stores/cart'
import { useWishlistStore } from '~/stores/wishlist'

export const useProduct = () => {
  const cart = useCartStore()
  const wishlist = useWishlistStore()
  const addedToCart = ref<Record<number, boolean>>({})

  function imgSrc(image: string | null) {
    return image ? '/' + image : '/images/image.png'
  }

  function addToCart(product: { id: number; name: string; price: number | string; image: string | null; slug: string }) {
    cart.add({ ...product, price: parseFloat(String(product.price)), image: product.image })
    addedToCart.value[product.id] = true
    setTimeout(() => { addedToCart.value[product.id] = false }, 1500)
  }

  function toggleWishlist(product: { id: number; name: string; price: number | string; image: string | null; slug: string }) {
    wishlist.toggle({ ...product, price: parseFloat(String(product.price)), image: product.image })
  }

  return { imgSrc, addToCart, toggleWishlist, addedToCart, wishlist }
}
