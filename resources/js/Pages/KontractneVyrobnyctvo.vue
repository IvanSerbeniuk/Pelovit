<script setup>
import { onMounted } from 'vue'

onMounted(() => {
    window.Cart?._updateBadge()
    window.Wishlist?._updateBadge()

    // Range slider bubbles
    const ranges = document.querySelectorAll('.custom-range')
    ranges.forEach(range => {
        const bubble = range.previousElementSibling
        function update() {
            const val = range.value
            const min = range.min
            const max = range.max
            const unit = range.dataset.unit || ''
            if (bubble) {
                bubble.textContent = val + ' ' + unit
                const percent = (val - min) / (max - min)
                bubble.style.left = (percent * range.offsetWidth + 8) + 'px'
            }
        }
        range.addEventListener('input', update)
        window.addEventListener('resize', update)
        update()
    })

    // Category tabs
    document.querySelectorAll('[data-category-tab]').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('[data-category-tab]').forEach(b => b.classList.remove('active'))
            btn.classList.add('active')
            const cat = btn.dataset.categoryTab
            document.querySelectorAll('[data-category-content]').forEach(c => {
                c.style.display = c.dataset.categoryContent === cat ? 'block' : 'none'
            })
        })
    })
})
</script>

<template>
<!-- Breadcrumb hero -->
<section class="py-4 bg-light">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Головна</a></li>
        <li class="breadcrumb-item active">Контрактне виробництво</li>
      </ol>
    </nav>
    <h1 class="fw-bold mt-2">Контрактне виробництво косметики</h1>
    <p class="lead">Виготовляємо косметику під вашим брендом — від розробки формули до готової продукції.</p>
    <a href="#consultation" class="btn btn-dark px-5 py-3 rad-16 mt-3">Отримати консультацію</a>
  </div>
</section>

<!-- Services section -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Наші послуги</h2>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Розробка формули</h5>
          <p class="text-muted">Індивідуальна розробка косметичної формули з урахуванням ваших вимог та цільової аудиторії.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Виробництво</h5>
          <p class="text-muted">Повний цикл виробництва на сертифікованому обладнанні відповідно до стандартів якості.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Пакування та маркування</h5>
          <p class="text-muted">Розробка дизайну та виготовлення пакування з вашим логотипом та брендингом.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Сертифікація</h5>
          <p class="text-muted">Супровід у процесі сертифікації та отримання всіх необхідних дозволів.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Логістика</h5>
          <p class="text-muted">Організація доставки готової продукції до вашого складу або до кінцевого споживача.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Технічна підтримка</h5>
          <p class="text-muted">Постійний супровід від наших технологів протягом усього виробничого процесу.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Own Brands -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold mb-4">Власні бренди</h2>
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="card text-center p-3">
          <img :src="'/images/image.png'" alt="Бренд" class="img-fluid mb-3">
          <h6>Пеловіт-Р</h6>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card text-center p-3">
          <img :src="'/images/image.png'" alt="Бренд" class="img-fluid mb-3">
          <h6>Доктор Лоріс+</h6>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Process steps -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-5">Як ми працюємо</h2>
    <div class="row g-4">
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">1</div>
        <h5>Заявка</h5>
        <p class="text-muted">Ви залишаєте заявку та описуєте ваш продукт</p>
      </div>
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">2</div>
        <h5>Консультація</h5>
        <p class="text-muted">Наш технолог підбирає формулу та інгредієнти</p>
      </div>
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">3</div>
        <h5>Виробництво</h5>
        <p class="text-muted">Запускаємо виробництво відповідно до вашого замовлення</p>
      </div>
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">4</div>
        <h5>Доставка</h5>
        <p class="text-muted">Готова продукція доставляється до вас</p>
      </div>
    </div>
  </div>
</section>

<!-- Calculator section -->
<section class="py-5 bg-light calculator-section">
  <div class="container">
    <h2 class="fw-bold mb-4">Калькулятор вартості</h2>
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="mb-4">
          <label class="form-label fw-medium">Обсяг виробництва (од.)</label>
          <div class="bubble-value" style="position:relative;">1000</div>
          <input type="range" class="form-range custom-range" min="100" max="10000" value="1000" step="100" data-unit="од.">
        </div>
        <div class="mb-4">
          <label class="form-label fw-medium">Об'єм продукту (мл)</label>
          <div class="bubble-value" style="position:relative;">250</div>
          <input type="range" class="form-range custom-range" min="50" max="1000" value="250" step="50" data-unit="мл">
        </div>
        <a href="#consultation" class="btn btn-dark px-4 py-2 rad-16">Отримати розрахунок</a>
      </div>
      <div class="col-lg-6">
        <div class="card p-4">
          <h5 class="mb-3">Орієнтована вартість</h5>
          <p class="text-muted">Точна вартість розраховується індивідуально залежно від складу, пакування та умов виробництва.</p>
          <p class="text-muted">Зв'яжіться з нами для отримання детального комерційного пропозиція.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Unique ingredients -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Унікальні інгредієнти</h2>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th>Інгредієнт</th>
            <th>Властивості</th>
            <th>Застосування</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Куяльницька грязь</td>
            <td>Протизапальна, регенеруюча</td>
            <td>Маски, скраби, лікувальні препарати</td>
          </tr>
          <tr>
            <td>Мінерали лиману</td>
            <td>Зміцнення, детокс</td>
            <td>Засоби догляду за тілом</td>
          </tr>
          <tr>
            <td>Натуральні олії</td>
            <td>Живлення, зволоження</td>
            <td>Всі типи продуктів</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Certificates -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold mb-4">Сертифікати</h2>
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="card p-3 text-center">
          <img :src="'/images/image.png'" alt="Сертифікат" class="img-fluid">
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card p-3 text-center">
          <img :src="'/images/image.png'" alt="Сертифікат" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Consultation Form -->
<section id="consultation" class="consultation-section py-5">
  <div class="container">
    <div class="consultation-grid">
      <div class="consultation-form">
        <h2>Замовити консультацію</h2>
        <p>Залиште свої контакти і наш менеджер зв'яжеться з вами для обговорення деталей контрактного виробництва.</p>
        <form>
          <input type="text" class="width_input" placeholder="Ваше ім'я" required>
          <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required>
          <input type="text" class="width_input" placeholder="Назва компанії / продукту">
          <div class="contact-method">
            <p>Спосіб зв'язку</p>
            <label><input type="radio" name="contact" checked> Дзвінок</label>
            <label><input type="radio" name="contact"> Telegram</label>
            <label><input type="radio" name="contact"> Viber</label>
            <label><input type="radio" name="contact"> WhatsApp</label>
          </div>
          <button type="submit" class="submit-btn">Надіслати</button>
        </form>
        <div class="social-links mt-3">
          <p>Ви можете написати нам самі:</p>
          <div class="social-icons">
            <a href="#" class="social-link">Instagram</a>
            <a href="#" class="social-link">Telegram</a>
            <a href="#" class="social-link">Viber</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>
