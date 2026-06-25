<script setup>
import { onMounted } from 'vue'

onMounted(() => {
    window.Cart?._updateBadge()
    window.Wishlist?._updateBadge()
})
</script>

<template>
<!-- Hero/Loyalty Section -->
<section class="py-5 text-white loyalty-section">
  <div class="container">
    <div class="loyalty-content">
      <div class="loyalty-text">
        <h2>Оптові закупівлі Pelovit-R</h2>
        <p>Натуральна косметика та засоби оздоровлення напряму від виробника — без посередників і з гнучкими умовами співпраці.</p>
        <button class="btn-register rad-16">Залишити заявку</button>
      </div>
      <div class="loyalty-benefits">
        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
              <path d="M23.3333 36.6667V63.3333C23.3333 64.2174 22.9821 65.0652 22.357 65.6904C21.7319 66.3155 20.8841 66.6667 20 66.6667H13.3333C12.4493 66.6667 11.6014 66.3155 10.9763 65.6904C10.3512 65.0652 10 64.2174 10 63.3333V40C10 39.116 10.3512 38.2681 10.9763 37.643C11.6014 37.0179 12.4493 36.6667 13.3333 36.6667H23.3333ZM23.3333 36.6667C26.8696 36.6667 30.2609 35.2619 32.7614 32.7614C35.2619 30.261 36.6667 26.8696 36.6667 23.3333V20C36.6667 18.2319 37.3691 16.5362 38.6193 15.286C39.8695 14.0357 41.5652 13.3333 43.3333 13.3333C45.1014 13.3333 46.7971 14.0357 48.0474 15.286C49.2976 16.5362 50 18.2319 50 20V36.6667H60C61.7681 36.6667 63.4638 37.3691 64.7141 38.6193C65.9643 39.8695 66.6667 41.5652 66.6667 43.3333L63.3333 60C62.854 62.0449 61.9446 63.8008 60.7422 65.0032C59.5398 66.2056 58.1095 66.7894 56.6667 66.6667H33.3333C30.6812 66.6667 28.1376 65.6131 26.2623 63.7377C24.3869 61.8624 23.3333 59.3188 23.3333 56.6667" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="opt_head">Вигідні умови закупівель</h3>
        </div>
        <div class="benefit-card blue">
          <div class="icon">👤</div>
          <h3 class="opt_head">Професійна підтримка</h3>
          <p>Накопичуйте бали та обмінюйте їх на знижки.</p>
        </div>
        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
              <path d="M10 30C10 29.116 10.3512 28.2681 10.9763 27.643C11.6014 27.0179 12.4493 26.6667 13.3333 26.6667H66.6667C67.5507 26.6667 68.3986 27.0179 69.0237 27.643C69.6488 28.2681 70 29.116 70 30V36.6667C70 37.5507 69.6488 38.3986 69.0237 39.0237C68.3986 39.6488 67.5507 40 66.6667 40H13.3333C12.4493 40 11.6014 39.6488 10.9763 39.0237C10.3512 38.3986 10 37.5507 10 36.6667V30Z" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40 26.6667V70" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M63.3346 40V63.3333C63.3346 65.1014 62.6323 66.7971 61.382 68.0474C60.1318 69.2976 58.4361 70 56.668 70H23.3346C21.5665 70 19.8708 69.2976 18.6206 68.0474C17.3703 66.7971 16.668 65.1014 16.668 63.3333V40" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M25.0013 26.6667C22.7912 26.6667 20.6715 25.7887 19.1087 24.2259C17.5459 22.6631 16.668 20.5435 16.668 18.3333C16.668 16.1232 17.5459 14.0036 19.1087 12.4408C20.6715 10.878 22.7912 9.99999 25.0013 9.99999C28.2169 9.94397 31.3681 11.5042 34.0438 14.4772C36.7195 17.4502 38.7956 21.698 40.0013 26.6667C41.2071 21.698 43.2831 17.4502 45.9589 14.4772C48.6346 11.5042 51.7857 9.94397 55.0013 9.99999C57.2114 9.99999 59.3311 10.878 60.8939 12.4408C62.4567 14.0036 63.3346 16.1232 63.3346 18.3333C63.3346 20.5435 62.4567 22.6631 60.8939 24.2259C59.3311 25.7887 57.2114 26.6667 55.0013 26.6667" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="opt_head">Бонуси та привілеї</h3>
        </div>
        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
              <path d="M60 13.3333C62.6522 13.3333 65.1957 14.3869 67.0711 16.2622C68.9464 18.1376 70 20.6811 70 23.3333V50C70 52.6521 68.9464 55.1957 67.0711 57.0711C65.1957 58.9464 62.6522 60 60 60H43.3333L26.6667 70V60H20C17.3478 60 14.8043 58.9464 12.9289 57.0711C11.0536 55.1957 10 52.6521 10 50V23.3333C10 20.6811 11.0536 18.1376 12.9289 16.2622C14.8043 14.3869 17.3478 13.3333 20 13.3333H60Z" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="opt_head">Підтримка клієнтів</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Who is it for -->
<section class="suite_for_section container grid-container">
  <h2 class="header">Кому підійде:</h2>
  <div class="row g-3">
    <div class="col-lg-4 col-md-6">
      <div class="card p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" class="mb-3 mx-auto">
          <path d="M53.3346 41.6666L36.668 31.6666L53.3346 21.6666L70.0013 31.6666V50L53.3346 60V41.6666Z" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M36.668 31.6666V50L53.3346 60" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M23.3346 30H6.66797" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M23.3346 40H13.3346" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M23.3346 50H6.66797" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <h5>Для дропшипінгу</h5>
        <p class="text-muted">Продавайте без закупівлі — ми відправляємо від вашого імені.</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" class="mb-3 mx-auto">
          <path d="M40 10C23.431 10 10 23.431 10 40C10 56.569 23.431 70 40 70C56.569 70 70 56.569 70 40C70 23.431 56.569 10 40 10Z" stroke="black" stroke-width="1.33333"/>
          <path d="M40 25V40L50 50" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <h5>Для інтернет-магазинів</h5>
        <p class="text-muted">Широкий асортимент, гнучкі умови, швидке постачання.</p>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" class="mb-3 mx-auto">
          <path d="M40 10L50 30H70L55 45L60 65L40 55L20 65L25 45L10 30H30L40 10Z" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
        <h5>Для салонів краси</h5>
        <p class="text-muted">Професійні засоби за вигідними цінами для вашого бізнесу.</p>
      </div>
    </div>
  </div>
</section>

<!-- Consultation Form -->
<section class="consultation-section py-5">
  <div class="container">
    <div class="consultation-form">
      <h2>Залишити заявку</h2>
      <p>Зв'яжіться з нашим менеджером для обговорення умов співпраці.</p>
      <form>
        <input type="text" class="width_input" placeholder="Ваше ім'я" required>
        <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required>
        <input type="text" class="width_input" placeholder="Назва компанії">
        <div class="contact-method">
          <p>Спосіб зв'язку</p>
          <label><input type="radio" name="contact" checked> Дзвінок</label>
          <label><input type="radio" name="contact"> Telegram</label>
          <label><input type="radio" name="contact"> Viber</label>
          <label><input type="radio" name="contact"> WhatsApp</label>
        </div>
        <button type="submit" class="submit-btn">Надіслати</button>
      </form>
    </div>
  </div>
</section>
</template>
