import { Capacitor } from '@capacitor/core'
import { App } from '@capacitor/app'
import { Browser } from '@capacitor/browser'
import { StatusBar, Style } from '@capacitor/status-bar'
import { SplashScreen } from '@capacitor/splash-screen'

export default defineNuxtPlugin(async () => {
  // У браузері нативних API немає — плагін тут нічого не робить.
  if (!Capacitor.isNativePlatform()) return

  const router = useRouter()

  try {
    await StatusBar.setStyle({ style: Style.Light })
    await StatusBar.setBackgroundColor({ color: '#ffffff' })
  } catch {
    // StatusBar недоступний на деяких пристроях — не критично.
  }

  // Апаратна кнопка «назад» на Android: гортаємо історію,
  // а з кореневого екрана згортаємо застосунок замість білого екрана.
  App.addListener('backButton', ({ canGoBack }) => {
    if (canGoBack && router.currentRoute.value.path !== '/') {
      router.back()
    } else {
      App.exitApp()
    }
  })

  // Повернення з зовнішнього браузера після оплати LiqPay:
  // pelovit://order/success?... → відповідний маршрут усередині застосунку.
  App.addListener('appUrlOpen', ({ url }) => {
    Browser.close().catch(() => {})

    // URL із кастомною схемою не розбирається через new URL() передбачувано:
    // для non-special схем host лишається порожнім, а весь шлях осідає
    // в pathname. Тому зрізаємо схему вручну.
    const withoutScheme = url.replace(/^[a-z][a-z0-9+.-]*:\/\//i, '')
    const [rawPath = '', query] = withoutScheme.split('?')
    const path = `/${rawPath.replace(/^\/+|\/+$/g, '')}`

    router.push(query ? `${path}?${query}` : path)
  })

  await SplashScreen.hide()
})
