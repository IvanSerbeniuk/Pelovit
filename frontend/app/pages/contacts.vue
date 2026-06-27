<script setup lang="ts">
useHead({
  title: 'Контакти — PELOVIT-R',
  meta: [{ name: 'description', content: 'Контакти PELOVIT-R. Адреса: вул. Успенська 59, Одеса. Телефон: +38 (063) 309-03-03.' }],
})

const config = useRuntimeConfig()
const { data } = await useFetch<any>(`${config.public.apiBase}/contacts`)
const team = computed(() => data.value?.team ?? [])
</script>

<template>
<section class="contact-section py-5">
  <div class="container">
    <h2 class="mb-5">Контакти</h2>
    <div class="row g-5">
      <div class="col-lg-5">
        <div class="contact-info">
          <p class="mb-4"><i class="fas fa-phone me-3"></i>+38 (063) 309-03-03</p>
          <p class="mb-4"><i class="fas fa-envelope me-3"></i>aksimed@ukr.net</p>
          <p class="mb-4"><i class="fas fa-map-marker-alt me-3"></i>вул. Успенська 59/ Пушкінська, Одеса</p>
          <p><i class="fas fa-clock me-3"></i>пн–пт — 10:00 до 18:00</p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="consultation-form">
          <h2>Виникли питання?</h2>
          <p>Наш фахівець допоможе підібрати ідеальні засоби Pelovit.</p>
          <form>
            <input type="text" class="width_input" placeholder="Ваше ім'я" required>
            <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required>
            <div class="contact-method">
              <p>Спосіб зв'язку</p>
              <label><input type="radio" name="contact" checked> Дзвінок</label>
              <label><input type="radio" name="contact"> Telegram</label>
              <label><input type="radio" name="contact"> Viber</label>
            </div>
            <button type="submit" class="submit-btn">Надіслати</button>
          </form>
        </div>
      </div>
    </div>
    <div class="mt-5 map_section">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3279.8955094662983!2d30.722343563286362!3d46.49097724401816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sua!4v1778526474245!5m2!1sen!2sua"
        width="100%" height="419" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</section>
</template>
