<script setup lang="ts">
const { assetUrl } = useAsset()

useSeoPage({
  pageKey: 'about',
  fallbackTitle: 'Про нас — PELOVIT',
  fallbackDescription: 'Аксімед — інноваційне підприємство з 1985 року. Розробляємо натуральну косметику на основі наукових досліджень.',
  canonicalPath: '/about',
})

const ICON_ATTRS = 'width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"'
const PATH_ATTRS = 'stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"'

const watchUsShots = ['catname4.png', 'face_washing.png', 'catname5.png', 'catname3.png']

const HISTORY_IMAGE = 'images/handwash3.jpg'

// Верхній ряд — три віхи з фото зверху, нижній — дві з фото знизу (як у макеті).
const historyTop = [
  { year: '2010', text: 'Заснування бренду, початок виробництва спа-косметики.', image: HISTORY_IMAGE },
  { year: '2016', text: 'Початок контрактного виробництва для сторонніх брендів.', image: HISTORY_IMAGE },
  { year: '2022', text: 'Запуск нових антивікових та універсальних косметичних ліній.', image: HISTORY_IMAGE },
]

const historyBottom = [
  { year: '2013', text: 'Впровадження лікувальних комплексів для застосування вдома.', image: HISTORY_IMAGE },
  { year: '2019', text: 'Відкриття мережі дистрибуції по Україні та онлайн-продажів.', image: HISTORY_IMAGE },
]

const values = [
  {
    title: 'Інноваційність',
    text: 'Поєднуємо науку та природу для створення дієвих рішень.',
    icon: `<svg ${ICON_ATTRS}>
      <path d="M26.6654 13.3333L13.332 19.9999V36.6666L26.6654 43.3333L39.9987 36.6666V19.9999L26.6654 13.3333Z" ${PATH_ATTRS}/>
      <path d="M40 36.6666L53.3333 43.3333L66.6667 36.6666V19.9999L53.3333 13.3333L40 19.9999" ${PATH_ATTRS}/>
      <path d="M26.668 43.3333V59.9999L40.0013 66.6666L53.3346 59.9999V43.3333" ${PATH_ATTRS}/>
    </svg>`,
  },
  {
    title: 'Якість та надійність',
    text: 'Кожен продукт проходить контроль і випробування.',
    icon: `<svg ${ICON_ATTRS}>
      <path d="M40 50C40 52.6522 41.0536 55.1957 42.9289 57.0711C44.8043 58.9464 47.3478 60 50 60C52.6522 60 55.1957 58.9464 57.0711 57.0711C58.9464 55.1957 60 52.6522 60 50C60 47.3478 58.9464 44.8043 57.0711 42.9289C55.1957 41.0536 52.6522 40 50 40C47.3478 40 44.8043 41.0536 42.9289 42.9289C41.0536 44.8043 40 47.3478 40 50Z" ${PATH_ATTRS}/>
      <path d="M43.332 58.3333V73.3333L49.9987 68.3333L56.6654 73.3333V58.3333" ${PATH_ATTRS}/>
      <path d="M33.3333 63.3334H16.6667C14.8986 63.3334 13.2029 62.631 11.9526 61.3808C10.7024 60.1306 10 58.4349 10 56.6668V23.3334C10 19.6667 13 16.6667 16.6667 16.6667H63.3333C65.1014 16.6667 66.7971 17.3691 68.0474 18.6194C69.2976 19.8696 70 21.5653 70 23.3334V56.6668C69.9988 57.8358 69.6902 58.9841 69.1051 59.9962C68.5201 61.0084 67.6791 61.8489 66.6667 62.4334" ${PATH_ATTRS}/>
      <path d="M20 30H60" ${PATH_ATTRS}/>
      <path d="M20 40H30" ${PATH_ATTRS}/>
      <path d="M20 50H26.6667" ${PATH_ATTRS}/>
    </svg>`,
  },
  {
    title: 'Прозорість і чесність',
    text: 'Ми відкриті у складі та діях наших засобів.',
    icon: `<svg ${ICON_ATTRS}>
      <path d="M25.0047 64.7434C33.6781 71.7601 46.3214 71.7601 54.9914 64.7434C63.6647 57.7268 65.8647 45.7168 60.2114 36.2568L43.9114 12.0568C42.5114 9.97342 39.6214 9.38008 37.4581 10.7334C36.915 11.0742 36.4495 11.525 36.0914 12.0568L19.7814 36.2568C14.1314 45.7168 16.3314 57.7268 25.0047 64.7434Z" ${PATH_ATTRS}/>
    </svg>`,
  },
  {
    title: 'Орієнтація на клієнта',
    text: 'Створюємо продукти, які дійсно працюють для вас.',
    icon: `<svg ${ICON_ATTRS}>
      <path d="M26.668 23.3333C26.668 26.8696 28.0727 30.2609 30.5732 32.7614C33.0737 35.2619 36.4651 36.6667 40.0013 36.6667C43.5375 36.6667 46.9289 35.2619 49.4294 32.7614C51.9299 30.2609 53.3346 26.8696 53.3346 23.3333C53.3346 19.7971 51.9299 16.4057 49.4294 13.9052C46.9289 11.4048 43.5375 10 40.0013 10C36.4651 10 33.0737 11.4048 30.5732 13.9052C28.0727 16.4057 26.668 19.7971 26.668 23.3333Z" ${PATH_ATTRS}/>
      <path d="M20 70V63.3333C20 59.7971 21.4048 56.4057 23.9052 53.9052C26.4057 51.4048 29.7971 50 33.3333 50H46.6667C50.2029 50 53.5943 51.4048 56.0948 53.9052C58.5952 56.4057 60 59.7971 60 63.3333V70" ${PATH_ATTRS}/>
    </svg>`,
  },
]
</script>

<template>
<section class="hero about-hero">
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
          <div class="col-6"><div class="stat-card stat-card--metric text-center"><div class="stat-number">50</div><p class="mb-0 fw-medium">Працівників</p></div></div>
          <div class="col-6"><div class="stat-card stat-card--metric text-center"><div class="stat-number">1000</div><p class="mb-0 fw-medium">Одиниць виробляємо в день</p></div></div>
          <div class="col-6"><div class="stat-card stat-card--metric text-center"><div class="stat-number">88</div><p class="mb-0 fw-medium">Сертифікованих засобів</p></div></div>
          <div class="col-6"><div class="stat-card stat-card--metric text-center"><div class="stat-number">40+</div><p class="mb-0 fw-medium">Років досвіду</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-nagoroda">
  <div class="container p-5">
    <h3 class="title_nagoroda text-center mb-5">Робота Асимед неодноразово відмічена нагородами</h3>
    <div class="nagoroda_img text-center">
      <img :src="assetUrl('images/nagorods.png')" alt="" class="img-fluid" loading="lazy" decoding="async">
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
        <img :src="assetUrl('images/science_in_laboratory.png')" alt="Дослідження в лабораторії" class="research-img img-fluid" loading="lazy" decoding="async">
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

    <div class="row g-5 align-items-center">
      <!-- Засновник -->
      <div class="col-lg-5">
        <div class="p-4 value-card">
          <img :src="assetUrl('images/skin_portrait.png')" alt="Ім'я Прізвище" class="founder-photo img-fluid mb-4" loading="lazy" decoding="async">

          <h4 class="fw-bold">Ім'я Прізвище</h4>
          <p class="mb-3">засновник компанії</p>

          <p class="fst-italic">
            «Коли ми починали роботу над Pelovit, головною ідеєю було поєднати
            унікальні властивості української природи з сучасними науковими
            розробками. Ми хотіли створювати продукти, яким можна довіряти
            щодня: безпечні, ефективні та доступні.»
          </p>
        </div>
      </div>

      <!-- Цінності -->
      <div class="col-lg-7">
        <div class="row g-4">
          <div v-for="value in values" :key="value.title" class="col-md-6">
            <div class="value-card text-center">
              <div class="value-icon" v-html="value.icon"></div>
              <h3 class="value-title fw-bold">{{ value.title }}</h3>
              <p>{{ value.text }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 history_section">
  <div class="container">
    <h2 class="text-center display-5 mb-5">Наша історія</h2>

    <div class="timeline row g-5 text-center">
      <!-- Верхній ряд: фото над роком -->
      <div v-for="item in historyTop" :key="item.year" class="col-lg-4 timeline-item">
        <img :src="assetUrl(item.image)" :alt="item.year" class="img-fluid mb-4" loading="lazy" decoding="async">
        <div class="year">{{ item.year }}</div>
        <p class="mt-3">{{ item.text }}</p>
      </div>

      <div class="d-line m-0"></div>

      <!-- Нижній ряд: фото під текстом -->
      <div v-for="item in historyBottom" :key="item.year" class="col-lg-6 timeline-item m-0">
        <div class="year">{{ item.year }}</div>
        <p class="mt-3">{{ item.text }}</p>
        <img :src="assetUrl(item.image)" :alt="item.year" class="img-fluid mb-4" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>

<section class="kontractne_vyrobnyctvo_page cert-section">
  <div class="container">
    <h2 class="section-title text-center">Аксимед має європейську сертифікацію GMP ISO 22716</h2>
    <div class="row g-5 justify-content-center">
      <div class="col-lg-5 col-md-6"><div class="cert-card"><img :src="assetUrl('images/sertificate1.png')" alt="Сертифікат GMP ISO 22716" class="cert-image" loading="lazy" decoding="async"></div></div>
      <div class="col-lg-5 col-md-6"><div class="cert-card"><img :src="assetUrl('images/sertificate2.png')" alt="Сертифікат GMP ISO 22716" class="cert-image" loading="lazy" decoding="async"></div></div>
    </div>
  </div>
</section>

<section class="watcheus_section">
  <div class="container">
    <div class="row g-4">
      <h2>Слідкуйте за нами</h2>

      <div v-for="shot in watchUsShots" :key="shot" class="col-md-3 col-6">
        <img :src="assetUrl(`images/${shot}`)" alt="" class="img-fluid" loading="lazy" decoding="async">
      </div>
    </div>
  </div>
</section>
</template>
