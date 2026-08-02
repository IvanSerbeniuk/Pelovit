<script setup lang="ts">
useSeoPage({
  pageKey: 'contract',
  fallbackTitle: 'Контрактне виробництво косметики — PELOVIT',
  fallbackDescription: 'Виготовляємо косметику під вашим брендом — від розробки формули до готової продукції. GMP ISO 22716.',
  canonicalPath: '/kontractne-vyrobnyctvo',
})

onMounted(() => {
  const ranges = document.querySelectorAll<HTMLInputElement>('.custom-range')
  ranges.forEach(range => {
    const bubble = range.previousElementSibling as HTMLElement | null
    function update() {
      if (bubble) {
        const val = range.value
        const min = +range.min
        const max = +range.max
        const unit = range.dataset.unit || ''
        bubble.textContent = val + ' ' + unit
        const percent = (+val - min) / (max - min)
        bubble.style.left = (percent * range.offsetWidth + 8) + 'px'
      }
    }
    range.addEventListener('input', update)
    window.addEventListener('resize', update)
    update()
  })
})
</script>

<template>
<section class="py-4 bg-light">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><NuxtLink to="/">Головна</NuxtLink></li>
        <li class="breadcrumb-item active">Контрактне виробництво</li>
      </ol>
    </nav>
    <h1 class="fw-bold mt-2">Контрактне виробництво косметики</h1>
    <p class="lead">Виготовляємо косметику під вашим брендом — від розробки формули до готової продукції.</p>
    <a href="#consultation" class="btn btn-dark px-5 py-3 rad-16 mt-3">Отримати консультацію</a>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Наші послуги</h2>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6"><div class="card h-100 p-4"><h5>Розробка формули</h5><p class="text-muted">Індивідуальна розробка косметичної формули з урахуванням ваших вимог.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="card h-100 p-4"><h5>Виробництво</h5><p class="text-muted">Повний цикл виробництва на сертифікованому обладнанні.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="card h-100 p-4"><h5>Пакування та маркування</h5><p class="text-muted">Розробка дизайну та виготовлення пакування з вашим брендингом.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="card h-100 p-4"><h5>Сертифікація</h5><p class="text-muted">Супровід у процесі сертифікації та отримання дозволів.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="card h-100 p-4"><h5>Логістика</h5><p class="text-muted">Організація доставки готової продукції.</p></div></div>
      <div class="col-lg-4 col-md-6"><div class="card h-100 p-4"><h5>Технічна підтримка</h5><p class="text-muted">Постійний супровід від наших технологів.</p></div></div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-5">Як ми працюємо</h2>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="step-number mb-3">1</div><h5>Заявка</h5><p class="text-muted">Залишаєте заявку та описуєте ваш продукт</p></div>
      <div class="col-md-3 text-center"><div class="step-number mb-3">2</div><h5>Консультація</h5><p class="text-muted">Технолог підбирає формулу та інгредієнти</p></div>
      <div class="col-md-3 text-center"><div class="step-number mb-3">3</div><h5>Виробництво</h5><p class="text-muted">Запускаємо виробництво відповідно до замовлення</p></div>
      <div class="col-md-3 text-center"><div class="step-number mb-3">4</div><h5>Доставка</h5><p class="text-muted">Готова продукція доставляється до вас</p></div>
    </div>
  </div>
</section>

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
          <p class="text-muted">Точна вартість розраховується індивідуально. Зв'яжіться з нами для комерційної пропозиції.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="consultation" class="consultation-section py-5">
  <div class="container">
    <div class="consultation-form" style="grid-column: 1 / -1;">
      <h2>Замовити консультацію</h2>
      <p>Залиште контакти і наш менеджер зв'яжеться з вами.</p>
      <LeadForm source="contract" :show-company="true" />
    </div>
  </div>
</section>
</template>
