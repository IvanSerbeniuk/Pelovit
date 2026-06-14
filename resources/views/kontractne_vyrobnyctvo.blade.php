@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')


    <div class="kontractne_vyrobnyctvo_page">
  <section class="breadrembs-section">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/">Домашня</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Контрактне виробництво
          </li>
        </ol>
      </nav>
    </div>
  </section>


  <section class="consultation-section">
    <div class="container">
      <div class="consultation-grid">

        <!--Right-->
        <div class="left">
          <h1 class="title">
            Замовляйте власний бренд косметики “під ключ”
          </h1>
          <div class="content">
            Від розробки рецептури до дизайну етикетки
          </div>
          <div class="blue_tags_wrapper">
            <div class="blue_tag rounded-pill">від 7500 грн</div>
            <div class="blue_tag rounded-pill">за 15 днів</div>
            <div class="blue_tag rounded-pill">дизайн — безкоштовно</div>
          </div>
        </div>

        <!-- Left: Consultation Form -->
        <div class="consultation-form">
          <h2>Запишіться на персональну консультацію</h2>
          <p>Наш фахівець допоможе підібрати ідеальні засоби Pelovit саме для ваших потреб та розповість, як отримати максимальний ефект.</p>

          <form>
            <input type="text" class="width_input" placeholder="Ваше ім’я" required="">
            <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required="">

            <div class="contact-method">
              <p>Спосіб зв’язку</p>
              <label><input type="radio" name="contact" checked=""> Дзвінок</label>
              <label><input type="radio" name="contact"> Telegram</label>
              <label><input type="radio" name="contact"> Viber</label>
              <label><input type="radio" name="contact"> WhatsApp</label>
            </div>

            <button type="submit" class="submit-btn">Надіслати</button>
          </form>

          @include('partials.social-links')
        </div>

      </div>
    </div>
  </section>

  <section class="work_for  own_brands">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-2">Створюємо власні бренди косметики “під ключ”</h2>
      </div>
      <div class="own_brands_title">Працюємо для:</div>

      <div class="row cards">
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/massage1.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Масажистів та спа майстрів</p>
          </div>
        </div>
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/cosmetology2.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Косметологів</p>
          </div>
        </div>
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/med3.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Медичних та оздоровчих центрів</p>
          </div>
        </div>
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/tryhologit4.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Трихологів</p>
          </div>
        </div>
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/podologiv5.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Подологів</p>
          </div>
        </div>
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/manikure6.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Майстрів манікюру</p>
          </div>
        </div>
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/brow7.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Лашмейкерів та бровістів</p>
          </div>
        </div>
        <div class="cat_card">
          <div class="category-card ">
            <img src="{{ asset('images/epilation8.png') }}" class="rounded-4 w-100" alt="">
            <p class="mt-3 fw-medium cat_name">Майстрів епіляції</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="in_posluga">
    <div class="container">
      <div class="title_posluga">
        У послугу входить:
      </div>
      <div class="posluga_wrapper">
        <div class="posluga_card">
          <i class="svg_posluga">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M63.3337 13.3334V66.6667H23.3337C21.5655 66.6667 19.8699 65.9643 18.6196 64.7141C17.3694 63.4638 16.667 61.7682 16.667 60V20C16.667 18.2319 17.3694 16.5362 18.6196 15.286C19.8699 14.0358 21.5655 13.3334 23.3337 13.3334H63.3337Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M63.3337 53.3334H23.3337C21.5655 53.3334 19.8699 54.0358 18.6196 55.286C17.3694 56.5362 16.667 58.2319 16.667 60" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M30 26.6666H50" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </i>
          <div class="card_content">
            Рецептури
          </div>
        </div>
        <div class="posluga_card">
          <i class="svg_posluga">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M66.25 20.9001C67.3956 21.5516 68.3469 22.4966 69.006 23.6379C69.6652 24.7792 70.0082 26.0755 70 27.3934V51.6734C70 54.3701 68.5233 56.8567 66.14 58.1667L43.64 72.4001C42.5245 73.0125 41.2725 73.3336 40 73.3336C38.7275 73.3336 37.4755 73.0125 36.36 72.4001L13.86 58.1667C12.6939 57.5295 11.7204 56.5906 11.0414 55.4483C10.3623 54.306 10.0027 53.0023 10 51.6734V27.3901C10 24.6934 11.4767 22.2101 13.86 20.9001L36.36 7.63339C37.5085 7.00018 38.7986 6.66809 40.11 6.66809C41.4215 6.66809 42.7115 7.00018 43.86 7.63339L66.36 20.9001H66.25Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M51.667 31.4067C52.707 32.0067 53.3437 33.1234 53.3337 34.3267V45.25C53.3337 46.4634 52.677 47.5834 51.617 48.1734L41.617 54.58C41.1223 54.8544 40.566 54.9983 40.0003 54.9983C39.4347 54.9983 38.8783 54.8544 38.3837 54.58L28.3837 48.1734C27.8627 47.8845 27.4287 47.4612 27.1268 46.9477C26.8249 46.4341 26.6661 45.8491 26.667 45.2534V34.3267C26.667 33.1134 27.3237 31.9934 28.3803 31.4034L38.3803 25.4367C39.417 24.8567 40.6803 24.8567 41.7137 25.4367L51.7137 31.4034H51.667V31.4067Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </i>
          <div class="card_content">
            Виробництво засобу
          </div>
        </div>
        <div class="posluga_card">
          <i class="svg_posluga">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M39.9997 10L66.6663 25V55L39.9997 70L13.333 55V25L39.9997 10Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40 40L66.6667 25" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40 40V70" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M39.9997 40L13.333 25" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M53.3337 17.5L26.667 32.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </i>
          <div class="card_content">
            Підбір та замовлення упаковки
          </div>
        </div>
        <div class="posluga_card">
          <i class="svg_posluga">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M63.333 10H49.9997C48.2316 10 46.5359 10.7024 45.2856 11.9526C44.0354 13.2029 43.333 14.8986 43.333 16.6667V56.6667C43.333 60.2029 44.7378 63.5943 47.2383 66.0948C49.7387 68.5952 53.1301 70 56.6663 70C60.2026 70 63.5939 68.5952 66.0944 66.0948C68.5949 63.5943 69.9997 60.2029 69.9997 56.6667V16.6667C69.9997 14.8986 69.2973 13.2029 68.0471 11.9526C66.7968 10.7024 65.1011 10 63.333 10Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M43.3332 24.5L36.6666 17.8334C35.4164 16.5836 33.721 15.8815 31.9532 15.8815C30.1855 15.8815 28.4901 16.5836 27.2399 17.8334L17.8132 27.26C16.5634 28.5102 15.8613 30.2056 15.8613 31.9734C15.8613 33.7411 16.5634 35.4365 17.8132 36.6867L47.8132 66.6867" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M24.3333 43.3334H16.6667C14.8986 43.3334 13.2029 44.0358 11.9526 45.286C10.7024 46.5362 10 48.2319 10 50V63.3334C10 65.1015 10.7024 66.7972 11.9526 68.0474C13.2029 69.2977 14.8986 70 16.6667 70H56.6667" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M56.667 56.6666V56.7" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </i>
          <div class="card_content">
            Дизайн та друк етикетки
          </div>
        </div>
        <div class="posluga_card">
          <i class="svg_posluga">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.3337 55L6.66699 45L23.3337 35L40.0003 45V63.3333L23.3337 73.3333V55Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6.66699 45V63.3333L23.3337 73.3333" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M23.333 55.15L39.9997 45.05" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M56.6667 55L40 45L56.6667 35L73.3333 45V63.3333L56.6667 73.3333V55Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40 63.3334L56.6667 73.3334" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M56.667 55L73.3337 45" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M39.9997 45V26.6666L23.333 16.6666L39.9997 6.66663L56.6663 16.6666V35" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M23.333 16.7667V34.9501" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40 26.6666L56.6667 16.6666" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </i>
          <div class="card_content">
            Фасування, маркування та поклейка
          </div>
        </div>
        <div class="posluga_card">
          <i class="svg_posluga">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M30 50C30 52.6522 31.0536 55.1957 32.9289 57.0711C34.8043 58.9464 37.3478 60 40 60C42.6522 60 45.1957 58.9464 47.0711 57.0711C48.9464 55.1957 50 52.6522 50 50C50 47.3478 48.9464 44.8043 47.0711 42.9289C45.1957 41.0536 42.6522 40 40 40C37.3478 40 34.8043 41.0536 32.9289 42.9289C31.0536 44.8043 30 47.3478 30 50Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M33.333 23.3334H46.6663" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M33.333 60V73.3333L39.9997 70L46.6663 73.3333V60" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M33.3333 63.3333H26.6667C24.8986 63.3333 23.2029 62.631 21.9526 61.3807C20.7024 60.1305 20 58.4348 20 56.6667V16.6667C20 14.8986 20.7024 13.2029 21.9526 11.9526C23.2029 10.7024 24.8986 10 26.6667 10H53.3333C55.1014 10 56.7971 10.7024 58.0474 11.9526C59.2976 13.2029 60 14.8986 60 16.6667V56.6667C60 58.4348 59.2976 60.1305 58.0474 61.3807C56.7971 62.631 55.1014 63.3333 53.3333 63.3333H46.6667" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </i>
          <div class="card_content">
            Сертифікація
          </div>
        </div>
      </div>
    </div>

  </section>


  <section class="calculator_section py-5">
    <div class="calculator-container container">
      <div class="row g-5">

        <!-- Ліва частина -->
        <div class="col-lg-7">
          <h2 class="mb-5 fw-bold">Розрахувати вартість продукту</h2>

          <div class="mb-4">
            <label class="form-label">Обрати продукт (вид продукту)</label>
            <select class="form-select form-select-lg" style="background-color: #fff;">
              <option>Крем</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label">Обрати складність формули</label>
            <select class="form-select form-select-lg" style="background-color: #fff;">
              <option>Максимально натуральне</option>
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label">Обрати об'єм</label>
            <div class="range-wrap">
              <div class="range-bubble">30 ml</div>
              <input type="range" class="form-range custom-range" min="10" max="100" value="30" data-unit="ml">
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label">Обрати кількість</label>
            <div class="range-wrap">
              <div class="range-bubble">100</div>
              <input type="range" class="form-range custom-range" min="10" max="500" value="100" data-unit="шт">
            </div>
          </div>

          <!-- Упаковка -->
          <div class="mb-5">
            <label class="form-label mb-3">Обрати упаковку</label>
            <div class="row g-3" id="packaging-grid">

              <div class="col-4">
                <div class="packaging-card active text-center">
                  <img src="https://i.imgur.com/8zX9pL2.jpeg" class="img-fluid" alt="bottle">
                  <p class="small mt-2 mb-0">Пляшка з переробленого ПЕТ</p>
                </div>
              </div>
              <div class="col-4">
                <div class="packaging-card active text-center">
                  <img src="https://i.imgur.com/8zX9pL2.jpeg" class="img-fluid" alt="bottle">
                  <p class="small mt-2 mb-0">Пляшка з переробленого ПЕТ</p>
                </div>
              </div>
              <div class="col-4">
                <div class="packaging-card active text-center">
                  <img src="https://i.imgur.com/8zX9pL2.jpeg" class="img-fluid" alt="bottle">
                  <p class="small mt-2 mb-0">Пляшка з переробленого ПЕТ</p>
                </div>
              </div>
              <!-- Будуть заповнені через JS або вручну -->
            </div>
          </div>

          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label">Обрати вид етикетки</label>
              <select class="form-select">
                <option>Вид етикетки</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Потрібна коробка?</label>
              <select class="form-select">
                <option>Так</option>
                <option>Ні</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Права частина -->
        <div class="col-lg-5">
          <div class="price-box mb-4">
            <div class="price_wrapper">
              <p class="mb-1">Ціна за одиницю:</p>
              <h2 class="fw-bold text-end">600€</h2>
            </div>
            <small class="text-muted">*Вартість розрахована орієнтовно та може відрізнятися залежно від вибраної країни через логістику.</small>
          </div>

          <!-- Форма зв'язку -->
          <div class="consultation-form">
            <h2>Зв’язатись з нами</h2>
            <p>Наш фахівець допоможе підібрати ідеальні засоби Pelovit саме для ваших потреб та розповість, як отримати максимальний ефект.</p>

            <form>
              <input type="text" class="width_input" placeholder="Ваше ім’я" required="">
              <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required="">

              <div class="contact-method">
                <p>Спосіб зв’язку</p>
                <label><input type="radio" name="contact" checked=""> Дзвінок</label>
                <label><input type="radio" name="contact"> Telegram</label>
                <label><input type="radio" name="contact"> Viber</label>
                <label><input type="radio" name="contact"> WhatsApp</label>
              </div>

              <button type="submit" class="submit-btn">Надіслати</button>
            </form>

            @include('partials.social-links')
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="tabs_own_brand">
    <div class="container">
      <div class="container-fluid py-5">
        <div class="row">
          <h4 class="mb-4 px-2">Засоби для випуску під вашим брендом</h4>
          <!-- Sidebar -->
          <div class="col-lg-3 col-xl-2 sidebar">
            <div class="nav flex-column px-2" id="categoryTabs">
              <a href="#" class="nav-link active" data-category="kosmetolog">Косметолог</a>
              <a href="#" class="nav-link" data-category="spa">Спа майстри</a>
              <a href="#" class="nav-link" data-category="tryholog">Трихолог</a>
              <a href="#" class="nav-link" data-category="manicure">Манікюр</a>
              <a href="#" class="nav-link" data-category="massage">Масаж</a>
              <a href="#" class="nav-link" data-category="podolog">Подолог</a>
              <a href="#" class="nav-link" data-category="epilation">Епіляція</a>
              <a href="#" class="nav-link" data-category="new">Новинки</a>
            </div>
          </div>

          <!-- Products Grid -->
          <div class="col-lg-9 col-xl-10">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="productsGrid">
              <!-- Products loaded by jQuery -->
            </div>
          </div>
        </div>
      </div>
    </div>


    <script>
        // Data for each category
        const productsData = {
            kosmetolog: [
                { title: "Парфінова маска для рук фукус океанічний", img: "assets/cosmetic_shot.png" },
                { title: "Крем-маска для обличчя з колагеном", img: "assets/cosmetic_shot.png" },
                { title: "Сироватка для зрілої шкіри", img: "assets/cosmetic_shot.png" },
                { title: "Парфінова маска для рук фукус океанічний", img: "assets/cosmetic_shot.png" },
                { title: "Крем-маска для обличчя з колагеном", img: "assets/cosmetic_shot.png" },
                { title: "Сироватка для зрілої шкіри", img: "assets/cosmetic_shot.png" },
                { title: "Парфінова маска для рук фукус океанічний", img: "assets/cosmetic_shot.png" },
                { title: "Крем-маска для обличчя з колагеном", img: "assets/cosmetic_shot.png" },
                { title: "Сироватка для зрілої шкіри", img: "assets/cosmetic_shot.png" }
            ],
            spa: [
                { title: "Аромаолія для масажу", img: "assets/cosmetic_shot.png" },
                { title: "Скраб для тіла з морською сіллю", img: "assets/cosmetic_shot.png" },
                { title: "Молочко для тіла", img: "assets/cosmetic_shot.png" }
            ],
            tryholog: [
                { title: "Шампунь проти випадіння волосся", img: "assets/cosmetic_shot.png" },
                { title: "Маска для волосся з кератином", img: "assets/cosmetic_shot.png" },
                { title: "Сироватка для росту волосся", img: "assets/cosmetic_shot.png" }
            ],
            manicure: [
                { title: "Крем для рук і нігтів", img: "assets/cosmetic_shot.png" },
                { title: "Парафінова маска для рук", img: "assets/cosmetic_shot.png" }
            ],
            massage: [
                { title: "Масажна олія лаванда", img: "assets/cosmetic_shot.png" },
                { title: "Гель для лімфодренажу", img: "assets/cosmetic_shot.png" }
            ],
            podolog: [
                { title: "Крем для ніг з сечовиною", img: "assets/cosmetic_shot.png" },
                { title: "Пілінг для стоп", img: "assets/cosmetic_shot.png" }
            ],
            epilation: [
                { title: "Гель після епіляції", img: "assets/cosmetic_shot.png" },
                { title: "Лосьйон уповільнення росту волосся", img: "assets/cosmetic_shot.png" }
            ],
            new: [
                { title: "Нова сироватка з пептидами", img: "assets/cosmetic_shot.png" },
                { title: "Інноваційна маска для шкіри", img: "assets/cosmetic_shot.png" }
            ]
        };

        function renderProducts(category) {
            const grid = $('#productsGrid');
            grid.empty();

            const products = productsData[category] || productsData.kosmetolog;

            products.forEach(product => {
                const card = `
            <div class="col">
                <div class="product-card h-100">
                    <div class="product-img">
                        <img src="${product.img}" alt="${product.title}">
                    </div>
                    <div class="card_content py-2">
                        <p class="mb-2 truncate">${product.title}</p>
                        <div class="d-flex flex-wrap gap-3 mb-3">
                            <span class="tag_brand">Активи</span>
                            <span class="tag_brand">Ефект </span>
                            <span class="tag_brand">Склад </span>
                        </div>
                        <button class="btn calc-btn text-white w-100">Розрахувати вартість</button>
                    </div>
                </div>
            </div>
        `;
                grid.append(card);
            });
        }
        $(document).ready(function() {
            $('#categoryTabs').on('click', '.nav-link', function(e) {
                e.preventDefault();

                // Remove active class from all links
                $('#categoryTabs .nav-link').removeClass('active');

                // Add active class to clicked link
                $(this).addClass('active');

                // Get category and render products
                const category = $(this).data('category');
                renderProducts(category);
            });

            // Initial load
            renderProducts('kosmetolog');
        });
    </script>
  </section>

  <section class="hero-section">
    <div class="container">

      <!-- Top Text -->
      <div class="row mb-3">
        <div class="col-lg-12">
          <h2 class="mb-4 title_contract">
            Аксимед пропонує найкращі умови для контрактного виробництва
          </h2>
        </div>
      </div>

      <div class="row align-items-center g-5">

        <!-- Left Box -->
        <div class="col-lg-6">
          <div class="beige-box">
            Розробка бренда під ключ: ви робите<br>замовлення — Аксимед робить все інше
          </div>
        </div>

        <!-- Right Benefits -->
        <div class="col-lg-6">
          <div class="benefit-item">
            <span><strong>7500 грн</strong> — мінімальна ціна партії одного препарату</span>
          </div>
          <div class="benefit-item">
            <span>З кожним клієнтом працює персональний менеджер</span>
          </div>
          <div class="benefit-item">
            <span>Розробка дизайну етикетки — безкоштовно</span>
          </div>
          <div class="benefit-item">
            <span>Від затвердження етикетки до готового продукту — 15 днів</span>
          </div>
        </div>
      </div>

      <!-- Big Image -->
      <div class="mt-5 hero-image">
        <img src="{{ asset('images/skincare_routine.png') }}" alt="Косметика Аксимед" class="img-fluid">
      </div>

    </div>
  </section>

  <section class="process-section">
    <div class="container">

      <div class="title">Як відбувається співпраця</div>

      <div class="process-grid">
        <!-- Row 1 -->
        <div class="step-card">
          <div class="step-number">1</div>
          <div class="step-text">Ви залишаєте заявку</div>
        </div>
        <div class="step-card">
          <div class="step-number">2</div>
          <div class="step-text">Обговорюєте з менеджером бажані засоби</div>
        </div>
        <div class="step-card">
          <div class="step-number">3</div>
          <div class="step-text">Аксимед пропонує рецептуру та надає зразки</div>
        </div>
        <div class="step-card">
          <div class="step-number">4</div>
          <div class="step-text">Заключаємо договір</div>
        </div>
        <div class="step-card">
          <div class="step-number">5</div>
          <div class="step-text">Ви вносите передоплату 50%</div>
        </div>

        <!-- Row 2 -->
        <div class="step-card">
          <div class="step-number">6</div>
          <div class="step-text">Обираємо тару</div>
        </div>
        <div class="step-card">
          <div class="step-number">7</div>
          <div class="step-text">Ви отримуєте 3 безкоштовні години з дизайнером на етикетку</div>
        </div>
        <div class="step-card">
          <div class="step-number">8</div>
          <div class="step-text">Аксимед виробляє, фасує засіб та клеїть етикетки</div>
        </div>
        <div class="step-card">
          <div class="step-number">9</div>
          <div class="step-text">Ви вносите остаточну оплату</div>
        </div>
        <div class="step-card">
          <div class="step-number">10</div>
          <div class="step-text">Аксимед відправляє ваше замовлення та сертифікати</div>
        </div>
      </div>

      <div class="bottom-text">
        За 15 днів ваша мрія про власний бренд косметики стане реальністю!
      </div>
    </div>
  </section>


  <section class="tester-section">
    <div class="container">
      <div class="row g-5 align-items-center test_container">

        <!-- Left Side -->
        <div class="col-lg-7 left_side">
          <h2 class="display-5 fw-bold mb-4">
            Бажаєте спробувати дієвість<br>засобу?
          </h2>
          <p class="lead mb-5">
            Пройдіть коротке опитування, щоб ми краще зрозуміли ваші потреби та запропонували найкращі рішення.
          </p>

          <!-- Offer Card -->
          <div class="offer-card mb-5">
            <div class="row align-items-center">
              <div class="col-md-4 text-center">
                <img src="{{ asset('images/amber_test.png') }}" alt="Крем" class="img-fluid" style="max-height: 160px;">
              </div>
              <div class="col-md-7">
                <h5 class="fw-bold">ОТРИМАЙТЕ 3 безкоштовні пробники нашої продукції</h5>
                <p class="mb-3">До кінця акції лишилось:</p>
                <div class="row g-2 text-center">
                  <div class="col-3">
                    <div class="timer-box"><h5>3</h5> <small>Дні</small></div>
                  </div>
                  <div class="col-3">
                    <div class="timer-box"><h5>12</h5> <small>Годин</small></div>
                  </div>
                  <div class="col-3">
                    <div class="timer-box"><h5>45</h5> <small>Хвилин</small></div>
                  </div>
                  <div class="col-3">
                    <div class="timer-box"><h5>21</h5> <small>Секунд</small></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <button class="btn btn-dark btn-lg w-100 py-4 fs-5 rad-16">
            Розпочати опитування
          </button>
        </div>

        <!-- Right Side - Form -->
        <div class="col-lg-5 right_side">
          <!-- Форма зв'язку -->
          <div class="consultation-form">
            <h4>Замовити тестер</h4>

            <form>
              <input type="text" class="width_input" placeholder="Ваше ім’я" required="">
              <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required="">

              <div class="contact-method">
                <p>Спосіб зв’язку</p>
                <label><input type="radio" name="contact" checked=""> Дзвінок</label>
                <label><input type="radio" name="contact"> Telegram</label>
                <label><input type="radio" name="contact"> Viber</label>
                <label><input type="radio" name="contact"> WhatsApp</label>
              </div>

              <button type="submit" class="submit-btn">Надіслати</button>
            </form>

            @include('partials.social-links')
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="unique-section">
    <div class="container">
      <h2 class="display-5 fw-bold mb-4">
        Косметика Аксимед має унікальний<br>запатентований інгредієнт
      </h2>
      <!-- Top Text -->
      <div class="row align-items-center g-5 mb-5">
        <div class="col-lg-6">
          <div class="beige-box">
            40 років досвіду + цілющі грязі Куяльнику
            = біостимулюючий екстракт Пеловіт
          </div>
        </div>
        <div class="col-lg-6">
          <p class="lead">
            Аксимед 40 років займається розробкою косметики
            на основі Пеловіту — лікувального екстракту грязі
            Куяльнику
          </p>
        </div>
      </div>

      <!-- Big Image -->
      <div class="main-image mb-5">
        <img src="{{ asset('images/makeup_pencil.png') }}" alt="Пеловіт eyeliner" class="img-fluid">
      </div>

      <!-- Three Columns -->
      <div class="table-responsive mt-5">
        <table class="table align-middle custom-table">
          <thead>
          <tr>
            <th class="feature-title text-center">Біостимулятор</th>
            <th class="feature-title text-center">Натуральний антибіотик</th>
            <th class="feature-title text-center">Імуномодулятор</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>покращує кровообіг у шкірі</td>
            <td>надає антибактеріальну дію</td>
            <td>знімає запалення</td>
          </tr>
          <tr>
            <td>стимулює оновлення тканин</td>
            <td>має протигрибковий ефект</td>
            <td>підвищує імунітет покривів</td>
          </tr>
          <tr>
            <td>сприяє росту клітин</td>
            <td>знищує віруси</td>
            <td>покращує стійкість шкіри до зовнішніх подразників</td>
          </tr>
          </tbody>
        </table>
      </div>

      <!-- Bottom Box -->
      <div class="bottom-box">
        Пеловіт + європейські активи = унікальні засоби під ваш запит
      </div>

    </div>
  </section>

  <section class="testimonials-section">
    <div class="container">
      <h2 class="section-title">Відгуки про співпрацю</h2>

      <div id="testimonialsCarousel" class="carousel slide">
        <div class="carousel-inner">

          <!-- Slide 1 - 2 cards -->
          <div class="carousel-item active">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="testimonial-card">
                  <div class="wrapper_review">
                    <div class="quote-text">“Сприйняття мене, як професіонала, змінилося”</div>
                    <div class="testimonial-text">
                      Коли люди дізнаються, що в мене є засоби власної розробки, а потім бачать, що вони ефективні, то починають цінити мене, як справжнього професіонала.
                    </div>
                  </div>
                  <div class="client-info">
                    <img src="{{ asset('images/pexel_oly.jpg') }}" alt="Юлія" class="client-avatar">
                    <div>
                      <strong>Юлія</strong><br>
                      <small>косметолог</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="testimonial-card">
                  <div class="quote-text">“Кількість клієнтів підвищилася”</div>
                  <div class="testimonial-text">
                    Замовила розробку зігріваючої маски для массажа та крема для рук з мінералами під моєю власною маркою Blossom Nails. Манікюр з їх використанням дуже подобається клієнтам і вони рекомендують мене знайомим, тож за півроку кількість моїх клієнтів збільшилася вдвічі”
                  </div>
                  <div class="client-info">
                    <img src="{{ asset('images/skin_portrait.png') }}"  alt="Тетяна" class="client-avatar">
                    <div>
                      <strong>Тетяна</strong><br>
                      <small>майстер манікюру</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 - 2 cards -->
          <div class="carousel-item">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="testimonial-card">
                  <div class="quote-text">“Звичні процедури стали ефективнішими”</div>
                  <div class="testimonial-text">
                    Масаж з остеопатичними техніками дає прекрасні результати. Клієнти помічають різницю і завжди повертаються.
                  </div>
                  <div class="client-info">
                    <img src="{{ asset('images/skin_portrait.png') }}" alt="Олена" class="client-avatar">
                    <div>
                      <strong>Олена</strong><br>
                      <small>масажист</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="testimonial-card">
                  <div class="quote-text">“Мої клієнти тепер питають саме мої засоби”</div>
                  <div class="testimonial-text">
                    Після запуску власної лінійки косметики клієнти стали частіше записуватись і питати саме мої продукти.
                  </div>
                  <div class="client-info">
                    <img src="{{ asset('images/pexel_oly.jpg') }}" alt="Ірина" class="client-avatar">
                    <div>
                      <strong>Ірина</strong><br>
                      <small>трихолог</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Arrows -->
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </section>


  <section class="about-section">
    <div class="container">
      <div class="row align-items-center g-5">

        <h3 class="display-5 fw-bold">Хто ми?</h3>

        <!-- Left Text -->
        <div class="col-lg-5">
          <p class="lead">
            Аксимед — це інноваційне підприємство, підрозділ Одеської регіональної академії наук.
            Він знаходиться в Одесі і працює з 1985 року. На базі підприємства науковцями академії
            багато років проводяться наукові дослідження, клінічні спостереження та розробляються
            запатентовані рецептури.
          </p>
        </div>

        <!-- Statistics -->
        <div class="col-lg-7">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="stats-card">
                <div class="stats-number">1000</div>
                <div class="stats-label">Одиниць<br>виробляємо в день</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stats-card">
                <div class="stats-number">88</div>
                <div class="stats-label">Сертифікованих<br>засобів</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stats-card">
                <div class="stats-number">50</div>
                <div class="stats-label">Працівників</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Laboratory Images -->
      <div class="row g-4 mt-4">
        <div class="col-lg-6">
          <div class="lab-image">
            <img src="{{ asset('images/pexel_arnempodrez.jpg') }}" alt="Науковець з колбою" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="lab-image">
            <img src="{{ asset('images/science_in_laboratory.png') }}" alt="Лабораторія Аксимед" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-nagoroda">
    <div class="container">
      <h3 class="title_nagoroda text-center mb-5">
        Робота Асимед неодноразово відмічена нагородами
      </h3>
      <div class="nagoroda_img">
        <img src="{{ asset('images/nagorods.png') }}" alt="" class=" img-fluid">
      </div>
    </div>
  </section>


  <section class="cert-section">
    <div class="container">
      <h2 class="section-title">
        Аксимед має європейську сертифікацію GMP ISO 22716
      </h2>
      <div class="row g-5 justify-content-center">
        <div class="col-lg-5 col-md-6">
          <div class="cert-card">
            <img src="{{ asset('images/sertificate1.png') }}" alt="Сертифікат GMP ISO 22716 - Англійська версія" class="cert-image">
          </div>
        </div>
        <div class="col-lg-5 col-md-6">
          <div class="cert-card">
            <img src="{{ asset('images/sertificate2.png') }}" alt="Сертифікат GMP ISO 22716 - Українська версія" class="cert-image">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="develop_cons_section">
    <div class="container">
      <div class="row g-5">

        <!-- Left Side -->
        <div class="col-lg-6 left-content">
          <h1>Розробка власного бренду<br>косметики — новий рівень<br>доходу</h1>
          <p class="lead" style="font-size: 1.2rem; line-height: 1.5;">
            Аксимед робить цей крок доступним. Замовляйте<br>
            сьогодні та представляйте клієнтам засоби вашого<br>
            бренду вже за 2 тижні.
          </p>
        </div>

        <!-- Right Side - Form -->
        <div class="col-lg-6">
          <div class="consultation-form">
            <h4>Зв’язатись з нами</h4>

            <form>
              <input type="text" class="width_input" placeholder="Ваше ім’я" required="">
              <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required="">

              <div class="contact-method">
                <p>Спосіб зв’язку</p>
                <label><input type="radio" name="contact" checked=""> Дзвінок</label>
                <label><input type="radio" name="contact"> Telegram</label>
                <label><input type="radio" name="contact"> Viber</label>
                <label><input type="radio" name="contact"> WhatsApp</label>
              </div>

              <button type="submit" class="submit-btn">Надіслати</button>
            </form>

            @include('partials.social-links')
          </div>
        </div>
      </div>
    </div>
  </section>

</div>


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
