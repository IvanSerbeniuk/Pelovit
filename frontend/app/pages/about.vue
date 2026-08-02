<script setup lang="ts">
const { assetUrl } = useAsset()

useSeoPage({
  pageKey: 'about',
  fallbackTitle: 'Про нас — PELOVIT-R',
  fallbackDescription: 'Аксімед — інноваційне підприємство з 1985 року. Розробляємо натуральну косметику на основі наукових досліджень.',
  canonicalPath: '/about',
})
</script>

<template>
<section class="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <h1 class="display-3 fw-bold mb-4">Про нас</h1>
        <p class="lead fs-5">
          Аксімед — це інноваційне підприємство, підрозділ Одеської регіональної академії наук.
          Він знаходиться у Одесі і працює з 1985 року. На базі підприємства науковцями академії
          багато років проводяться наукові дослідження, клінічні спостереження та розробляються
          запатентовані рецептури.
        </p>
      </div>
      <div class="col-lg-5">
        <div class="row g-4">
          <div class="col-6"><div class="stat-card text-center"><div class="stat-number">50</div><p class="mb-0 fw-medium">Працівників</p></div></div>
          <div class="col-6"><div class="stat-card text-center"><div class="stat-number">1000</div><p class="mb-0 fw-medium">Одиниць виробляємо в день</p></div></div>
          <div class="col-6"><div class="stat-card text-center"><div class="stat-number">88</div><p class="mb-0 fw-medium">Сертифікованих засобів</p></div></div>
          <div class="col-6"><div class="stat-card text-center"><div class="stat-number">40+</div><p class="mb-0 fw-medium">Років досвіду</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-nagoroda">
  <div class="container p-5">
    <h3 class="title_nagoroda text-center mb-5">Робота Асимед неодноразово відмічена нагородами</h3>
    <div class="nagoroda_img text-center">
      <img :src="assetUrl('images/nagorods.png')" alt="" class="img-fluid">
    </div>
  </div>
</section>

<section class="py-5 doslidgenja_section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-4">
        <div class="sidebar-nav">
          <a href="#">Винахідник</a>
          <a href="#">Pelovit</a>
          <a href="#" class="active">Дослідження</a>
          <a href="#">Виробництво</a>
        </div>
      </div>
      <div class="col-lg-4">
        <img :src="assetUrl('images/science_in_laboratory.png')" alt="Дослідження в лабораторії" class="research-img img-fluid">
      </div>
      <div class="col-lg-4">
        <h2 class="section-title mb-4">Дослідження</h2>
        <p class="lead">
          Одеська регіональна академія наук (ОРАН) — одна з найстаріших організацій України, що займається
          біологією і медициною. Після аварії на Чорнобильській АЕС академія отримала держзамовлення на
          створення нового препарату з сильним лікувальним і відновлювальним ефектом.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="values_section py-5">
  <div class="container">
    <h2 class="text-center mb-5 display-5">Наша місія та цінності</h2>
    <div class="row g-4">
      <div class="col-md-3"><div class="value-card text-center"><h5 class="fw-bold">Інноваційність</h5><p>Поєднуємо науку та природу.</p></div></div>
      <div class="col-md-3"><div class="value-card text-center"><h5 class="fw-bold">Якість</h5><p>Кожен продукт проходить контроль.</p></div></div>
      <div class="col-md-3"><div class="value-card text-center"><h5 class="fw-bold">Прозорість</h5><p>Відкриті у складі та діях засобів.</p></div></div>
      <div class="col-md-3"><div class="value-card text-center"><h5 class="fw-bold">Клієнт</h5><p>Продукти, що дійсно працюють.</p></div></div>
    </div>
  </div>
</section>

<section class="kontractne_vyrobnyctvo_page cert-section">
  <div class="container">
    <h2 class="section-title text-center">Аксимед має європейську сертифікацію GMP ISO 22716</h2>
    <div class="row g-5 justify-content-center">
      <div class="col-lg-5 col-md-6"><div class="cert-card"><img :src="assetUrl('images/sertificate1.png')" alt="Сертифікат GMP ISO 22716" class="cert-image"></div></div>
      <div class="col-lg-5 col-md-6"><div class="cert-card"><img :src="assetUrl('images/sertificate2.png')" alt="Сертифікат GMP ISO 22716" class="cert-image"></div></div>
    </div>
  </div>
</section>
</template>
