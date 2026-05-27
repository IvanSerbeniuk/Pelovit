

@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')

<!-- Hero Section -->
<section class="hero" >
  <div class="container">
    <div class="row align-items-center">
      <!-- Ліва частина - текст -->
      <div class="col-lg-7">
        <h1 class="display-3 fw-bold mb-4">Про нас</h1>
        <p class="lead fs-5">
          Аксімед — це інноваційне підприємство, підрозділ Одеської регіональної академії наук.
          Він знаходиться у Одесі і працює з 1985 року. На базі підприємства науковцями академії
          багато років проводяться наукові дослідження, клінічні спостереження та розробляються
          запатентовані рецептури.
        </p>
      </div>

      <!-- Права частина - статистика -->
      <div class="col-lg-5">
        <div class="row g-4">
          <div class="col-6">
            <div class="stat-card text-center">
              <div class="stat-number">50</div>
              <p class="mb-0 fw-medium">Працівників</p>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-card text-center">
              <div class="stat-number">1000</div>
              <p class="mb-0 fw-medium">Одиниць виробляємо в день</p>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-card text-center">
              <div class="stat-number">88</div>
              <p class="mb-0 fw-medium">Сертифікованих засобів</p>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-card text-center">
              <div class="stat-number">50</div>
              <p class="mb-0 fw-medium">Працівників</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-nagoroda">
  <div class="container p-5">
    <h3 class="title_nagoroda text-center mb-5">
      Робота Асимед неодноразово відмічена нагородами
    </h3>
    <div class="nagoroda_img text-center">
      <img src="{{ Vite::asset('resources/images/nagorods.png') }}" alt="" class=" img-fluid">
    </div>
  </div>
</section>

<section class="py-5 doslidgenja_section">
  <div class="container">
    <div class="row g-5 align-items-center">

      <!-- Ліва колонка - Навігація -->
      <div class="col-lg-4">
        <div class="sidebar-nav">
          <a href="#">Винахідник</a>
          <a href="#">Pelovit</a>
          <a href="#" class="active">Дослідження</a>
          <a href="#">Виробництво</a>
        </div>
      </div>

      <!-- Центральна колонка - Фото -->
      <div class="col-lg-4">
        <img src="{{ Vite::asset('resources/images/science_in_laboratory.png') }}"
             alt="Дослідження в лабораторії"
             class="research-img img-fluid">
      </div>

      <!-- Права колонка - Текст -->
      <div class="col-lg-4">
        <h2 class="section-title mb-4">Дослідження</h2>
        <p class="lead">
          Одеська регіональна академія наук (ОРАН) — одна з найстаріших організацій України, що займається
          біологією і медициною. Її ранніми розробками в області біотехнологій, зокрема, дитячого харчування,
          ми користуємося щодня, їх назви вже давно стали загальними. Після аварії на Чорнобильській АЕС
          академія отримала держзамовлення на створення нового препарату з сильним лікувальним і
          відновлювальним ефектом.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="values_section py-5">
  <div class="container">
    <h2 class="text-center  mb-5 display-5">Наша місія та цінності</h2>

    <div class="row g-5 align-items-center">

      <!-- Ліва частина — Засновник -->
      <div class="col-lg-5">
        <div class="p-4 value-card">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330"
               alt="Ім'я Прізвище"
               class="founder-photo img-fluid mb-4">

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

      <!-- Права частина — Цінності -->
      <div class="col-lg-7">
        <div class="row g-4">
          <div class="col-md-6">
            <div class="value-card text-center">
              <div class="value-icon">
                <i>
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M26.6654 13.3333L13.332 19.9999V36.6666L26.6654 43.3333L39.9987 36.6666V19.9999L26.6654 13.3333Z" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M40 36.6666L53.3333 43.3333L66.6667 36.6666V19.9999L53.3333 13.3333L40 19.9999" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M26.668 43.3333V59.9999L40.0013 66.6666L53.3346 59.9999V43.3333" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </i>
              </div>
              <h5 class="fw-bold">Інноваційність</h5>
              <p>Поєднуємо науку та природу для створення дієвих рішень.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="value-card text-center">
              <div class="value-icon">
                <i class="sertificate"><svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M40 50C40 52.6522 41.0536 55.1957 42.9289 57.0711C44.8043 58.9464 47.3478 60 50 60C52.6522 60 55.1957 58.9464 57.0711 57.0711C58.9464 55.1957 60 52.6522 60 50C60 47.3478 58.9464 44.8043 57.0711 42.9289C55.1957 41.0536 52.6522 40 50 40C47.3478 40 44.8043 41.0536 42.9289 42.9289C41.0536 44.8043 40 47.3478 40 50Z" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M43.332 58.3333V73.3333L49.9987 68.3333L56.6654 73.3333V58.3333" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M33.3333 63.3334H16.6667C14.8986 63.3334 13.2029 62.631 11.9526 61.3808C10.7024 60.1306 10 58.4349 10 56.6668V23.3334C10 19.6667 13 16.6667 16.6667 16.6667H63.3333C65.1014 16.6667 66.7971 17.3691 68.0474 18.6194C69.2976 19.8696 70 21.5653 70 23.3334V56.6668C69.9988 57.8358 69.6902 58.9841 69.1051 59.9962C68.5201 61.0084 67.6791 61.8489 66.6667 62.4334" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20 30H60" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20 40H30" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20 50H26.6667" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              </i>
              </div>
              <h5 class="fw-bold">Якість та надійність</h5>
              <p>Кожен продукт проходить контроль і випробування.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="value-card text-center">
              <div class="value-icon"><i><svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.0047 64.7434C33.6781 71.7601 46.3214 71.7601 54.9914 64.7434C63.6647 57.7268 65.8647 45.7168 60.2114 36.2568L43.9114 12.0568C42.5114 9.97342 39.6214 9.38008 37.4581 10.7334C36.915 11.0742 36.4495 11.525 36.0914 12.0568L19.7814 36.2568C14.1314 45.7168 16.3314 57.7268 25.0047 64.7434Z" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              </i></div>
              <h5 class="fw-bold">Прозорість і чесність</h5>
              <p>Ми відкриті у складі та діях наших засобів.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="value-card text-center">
              <div class="value-icon"><i class="man"><svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M26.668 23.3333C26.668 26.8696 28.0727 30.2609 30.5732 32.7614C33.0737 35.2619 36.4651 36.6667 40.0013 36.6667C43.5375 36.6667 46.9289 35.2619 49.4294 32.7614C51.9299 30.2609 53.3346 26.8696 53.3346 23.3333C53.3346 19.7971 51.9299 16.4057 49.4294 13.9052C46.9289 11.4048 43.5375 10 40.0013 10C36.4651 10 33.0737 11.4048 30.5732 13.9052C28.0727 16.4057 26.668 19.7971 26.668 23.3333Z" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20 70V63.3333C20 59.7971 21.4048 56.4057 23.9052 53.9052C26.4057 51.4048 29.7971 50 33.3333 50H46.6667C50.2029 50 53.5943 51.4048 56.0948 53.9052C58.5952 56.4057 60 59.7971 60 63.3333V70" stroke="#5E3F3E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              </i></div>
              <h5 class="fw-bold">Орієнтація на клієнта</h5>
              <p>Створюємо продукти, які дійсно працюють для вас.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Наша історія -->
<section class="py-5 history_section">
  <div class="container">
    <h2 class="text-center display-5 mb-5">Наша історія</h2>

    <div class="timeline row g-5 text-center">

      <!-- 2010 -->
      <div class="col-lg-4 timeline-item">
        <img src="{{ Vite::asset('resources/images/handwash3.jpg') }}"
             alt="2010" class="img-fluid mb-4">
        <div class="year">2010</div>
        <p class="mt-3">Заснування бренду, початок виробництва спа-косметики.</p>
      </div>

      <!-- 2016 -->
      <div class="col-lg-4 timeline-item">
        <img src="{{ Vite::asset('resources/images/handwash3.jpg') }}"
             alt="2016" class="img-fluid mb-4">
        <div class="year">2016</div>
        <p class="mt-3">Початок контрактного виробництва для сторонніх брендів.</p>
      </div>

      <!-- 2022 -->
      <div class="col-lg-4 timeline-item">
        <img src="{{ Vite::asset('resources/images/handwash3.jpg') }}"
             alt="2022" class="img-fluid mb-4">
        <div class="year">2022</div>
        <p class="mt-3">Запуск нових антивікових та універсальних косметичних ліній.</p>
      </div>

      <div class="d-line m-0"></div>

      <!-- 2013 -->
      <div class="col-lg-6 timeline-item m-0">
        <div class="year">2013</div>
        <p class="mt-3">Впровадження лікувальних комплексів для застосування вдома.</p>
        <img src="{{ Vite::asset('resources/images/handwash3.jpg') }}"
             alt="2013" class="img-fluid mb-4">
      </div>

      <!-- 2019 -->
      <div class="col-lg-6 timeline-item m-0">
        <div class="year">2019</div>
        <p class="mt-3">Відкриття мережі дистрибуції по Україні та онлайн-продажів.</p>
        <img src="{{ Vite::asset('resources/images/handwash3.jpg') }}"
             alt="2019" class="img-fluid mb-4">
      </div>

    </div>
  </div>
</section>


<section class=" kontractne_vyrobnyctvo_page cert-section">
  <div class="container">
    <h2 class="section-title text-center">
      Аксимед має європейську сертифікацію GMP ISO 22716
    </h2>
    <div class="row g-5 justify-content-center">
      <div class="col-lg-5 col-md-6">
        <div class="cert-card">
          <img src="{{ Vite::asset('resources/images/sertificate1.png') }}" alt="Сертифікат GMP ISO 22716 - Англійська версія" class="cert-image">
        </div>
      </div>
      <div class="col-lg-5 col-md-6">
        <div class="cert-card">
          <img src="{{ Vite::asset('resources/images/sertificate2.png') }}" alt="Сертифікат GMP ISO 22716 - Українська версія" class="cert-image">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="watcheus_section">
  <div class="container">
    <div class="row g-4">
      <h2>Слідкуйте за нами</h2>

      <div class="col-md-3 col-6"><img src="{{ Vite::asset('resources/images/catname4.png') }}" alt="" class="img-fluid"></div>
      <div class="col-md-3 col-6"><img src="{{ Vite::asset('resources/images/face_washing.png') }}" alt="" class="img-fluid"></div>
      <div class="col-md-3 col-6"><img src="{{ Vite::asset('resources/images/catname5.png') }}" alt="" class="img-fluid"></div>
      <div class="col-md-3 col-6"><img src="{{ Vite::asset('resources/images/catname3.png') }}" alt="" class="img-fluid"></div>
    </div>
  </div>
</section>


<script>
    const ranges = document.querySelectorAll('.custom-range');
    ranges.forEach(range => {
        const bubble = range.previousElementSibling;
        function update() {
            const val = range.value;
            const min = range.min;
            const max = range.max;
            const unit = range.dataset.unit || '';
            bubble.textContent = val + ' ' + unit;

            const percent = (val - min) / (max - min);
            const offset = percent * range.offsetWidth;

            bubble.style.left = offset + 8 + 'px';
        }

        range.addEventListener('input', update);
        window.addEventListener('resize', update);

        update();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
