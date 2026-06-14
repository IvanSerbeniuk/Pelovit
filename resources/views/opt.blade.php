@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')


    <section class="py-5 text-white  loyalty-section ">
  <div class="container">
    <div class="loyalty-content">

      <!-- Left side - Text -->
      <div class="loyalty-text">
        <h2>Оптові закупівлі Pelovit-R</h2>
        <p>Натуральна косметика та засоби оздоровлення напряму від виробника — без посередників і з гнучкими умовами співпраці.</p>

        <button class="btn-register rad-16">Залишити заявку</button>
      </div>

      <!-- Right side - Benefit cards -->
      <div class="loyalty-benefits">

        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M23.3333 36.6667V63.3333C23.3333 64.2174 22.9821 65.0652 22.357 65.6904C21.7319 66.3155 20.8841 66.6667 20 66.6667H13.3333C12.4493 66.6667 11.6014 66.3155 10.9763 65.6904C10.3512 65.0652 10 64.2174 10 63.3333V40C10 39.116 10.3512 38.2681 10.9763 37.643C11.6014 37.0179 12.4493 36.6667 13.3333 36.6667H23.3333ZM23.3333 36.6667C26.8696 36.6667 30.2609 35.2619 32.7614 32.7614C35.2619 30.261 36.6667 26.8696 36.6667 23.3333V20C36.6667 18.2319 37.3691 16.5362 38.6193 15.286C39.8695 14.0357 41.5652 13.3333 43.3333 13.3333C45.1014 13.3333 46.7971 14.0357 48.0474 15.286C49.2976 16.5362 50 18.2319 50 20V36.6667H60C61.7681 36.6667 63.4638 37.3691 64.7141 38.6193C65.9643 39.8695 66.6667 41.5652 66.6667 43.3333L63.3333 60C62.854 62.0449 61.9446 63.8008 60.7422 65.0032C59.5398 66.2056 58.1095 66.7894 56.6667 66.6667H33.3333C30.6812 66.6667 28.1376 65.6131 26.2623 63.7377C24.3869 61.8624 23.3333 59.3188 23.3333 56.6667" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3  class="opt_head">Вигідні умови закупівель</h3>
        </div>

        <div class="benefit-card blue">
          <div class="icon">👤</div>
          <h3  class="opt_head">Професійна підтримка</h3>
          <p>Накопичуйте бали та обмінюйте їх на знижки.</p>
        </div>

        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 30C10 29.116 10.3512 28.2681 10.9763 27.643C11.6014 27.0179 12.4493 26.6667 13.3333 26.6667H66.6667C67.5507 26.6667 68.3986 27.0179 69.0237 27.643C69.6488 28.2681 70 29.116 70 30V36.6667C70 37.5507 69.6488 38.3986 69.0237 39.0237C68.3986 39.6488 67.5507 40 66.6667 40H13.3333C12.4493 40 11.6014 39.6488 10.9763 39.0237C10.3512 38.3986 10 37.5507 10 36.6667V30Z" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40 26.6667V70" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M63.3346 40V63.3333C63.3346 65.1014 62.6323 66.7971 61.382 68.0474C60.1318 69.2976 58.4361 70 56.668 70H23.3346C21.5665 70 19.8708 69.2976 18.6206 68.0474C17.3703 66.7971 16.668 65.1014 16.668 63.3333V40" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M25.0013 26.6667C22.7912 26.6667 20.6715 25.7887 19.1087 24.2259C17.5459 22.6631 16.668 20.5435 16.668 18.3333C16.668 16.1232 17.5459 14.0036 19.1087 12.4408C20.6715 10.878 22.7912 9.99999 25.0013 9.99999C28.2169 9.94397 31.3681 11.5042 34.0438 14.4772C36.7195 17.4502 38.7956 21.698 40.0013 26.6667C41.2071 21.698 43.2831 17.4502 45.9589 14.4772C48.6346 11.5042 51.7857 9.94397 55.0013 9.99999C57.2114 9.99999 59.3311 10.878 60.8939 12.4408C62.4567 14.0036 63.3346 16.1232 63.3346 18.3333C63.3346 20.5435 62.4567 22.6631 60.8939 24.2259C59.3311 25.7887 57.2114 26.6667 55.0013 26.6667" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3  class="opt_head">Бонуси та привілеї</h3>
        </div>

        <div class="benefit-card white">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M60 13.3333C62.6522 13.3333 65.1957 14.3869 67.0711 16.2622C68.9464 18.1376 70 20.6811 70 23.3333V50C70 52.6521 68.9464 55.1957 67.0711 57.0711C65.1957 58.9464 62.6522 60 60 60H43.3333L26.6667 70V60H20C17.3478 60 14.8043 58.9464 12.9289 57.0711C11.0536 55.1957 10 52.6521 10 50V23.3333C10 20.6811 11.0536 18.1376 12.9289 16.2622C14.8043 14.3869 17.3478 13.3333 20 13.3333H60Z" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M31.668 30H31.7013" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M48.332 30H48.3654" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M31.668 43.3333C32.7542 44.442 34.0508 45.3227 35.4817 45.924C36.9127 46.5253 38.4492 46.835 40.0013 46.835C41.5534 46.835 43.09 46.5253 44.5209 45.924C45.9518 45.3227 47.2484 44.442 48.3346 43.3333" stroke="#1A7B9E" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="opt_head">Бонуси та привілеї</h3>
        </div>

      </div>
    </div>
  </div>
</section>



<section class="suite_for_section container grid-container">
  <h2 class="header">Кому підійде:</h2>

  <div class="row g-3">
    <!-- Дропшипінг -->
    <div class="col-lg-4 col-md-6">
      <div class="card  p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M53.3346 41.6666L36.668 31.6666L53.3346 21.6666L70.0013 31.6666V50L53.3346 60V41.6666Z" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M36.668 31.6666V50L53.3346 60" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M53.332 41.8167L69.9987 31.7167" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M23.3346 30H6.66797" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M23.332 40H13.332" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M23.3333 50H20" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <h5 class="fw-medium">Дропшипінг</h5>
      </div>
    </div>

    <!-- Магазини косметики -->
    <div class="col-lg-4 col-md-6">
      <div class="card  p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M10 70H70" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M50 26.6667C50 29.3188 51.0536 31.8624 52.9289 33.7377C54.8043 35.6131 57.3478 36.6667 60 36.6667C62.6522 36.6667 65.1957 35.6131 67.0711 33.7377C68.9464 31.8624 70 29.3188 70 26.6667V23.3333L63.3333 10H16.6667L10 23.3333V26.6667C10 29.3188 11.0536 31.8624 12.9289 33.7377C14.8043 35.6131 17.3478 36.6667 20 36.6667C22.6522 36.6667 25.1957 35.6131 27.0711 33.7377C28.9464 31.8624 30 29.3188 30 26.6667M10 23.3333H70M30 26.6667V23.3333M30 26.6667C30 29.3188 31.0536 31.8624 32.9289 33.7377C34.8043 35.6131 37.3478 36.6667 40 36.6667C42.6522 36.6667 45.1957 35.6131 47.0711 33.7377C48.9464 31.8624 50 29.3188 50 26.6667M50 26.6667V23.3333" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16.668 70V36.1666" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M63.332 70V36.1666" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M30 70V56.6667C30 54.8986 30.7024 53.2029 31.9526 51.9526C33.2029 50.7024 34.8986 50 36.6667 50H43.3333C45.1014 50 46.7971 50.7024 48.0474 51.9526C49.2976 53.2029 50 54.8986 50 56.6667V70" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <h5 class="fw-medium">Магазини косметики<br>(онлайн/офлайн)</h5>
      </div>
    </div>

    <!-- Опт покупки -->
    <div class="col-lg-4 col-md-6">
      <div class="card  p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M39.9987 10L66.6654 25V55L39.9987 70L13.332 55V25L39.9987 10Z" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M40 40L66.6667 25" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M40 40V70" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M39.9987 40L13.332 25" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M53.3346 17.5L26.668 32.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <h5 class="fw-medium">Опт покупки</h5>
      </div>
    </div>

    <!-- Дистриб'ютор -->
    <div class="col-lg-4 col-md-6">
      <div class="card  p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M26.668 23.3333C26.668 26.8696 28.0727 30.2609 30.5732 32.7614C33.0737 35.2619 36.4651 36.6667 40.0013 36.6667C43.5375 36.6667 46.9289 35.2619 49.4294 32.7614C51.9299 30.2609 53.3346 26.8696 53.3346 23.3333C53.3346 19.7971 51.9299 16.4057 49.4294 13.9052C46.9289 11.4048 43.5375 10 40.0013 10C36.4651 10 33.0737 11.4048 30.5732 13.9052C28.0727 16.4057 26.668 19.7971 26.668 23.3333Z" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M20 70V63.3333C20 59.7971 21.4048 56.4057 23.9052 53.9052C26.4057 51.4048 29.7971 50 33.3333 50H46.6667C50.2029 50 53.5943 51.4048 56.0948 53.9052C58.5952 56.4057 60 59.7971 60 63.3333V70" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <h5 class="fw-medium">Дистриб'ютор</h5>
      </div>
    </div>

    <!-- Б'юті простори + школи -->
    <div class="col-lg-4 col-md-6">
        <div class="card  p-4 text-center">
          <div class="icon">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M36.668 56.6666C37.7194 57.1255 38.8541 57.3623 40.0013 57.3623C41.1485 57.3623 42.2833 57.1255 43.3346 56.6666" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M40.0002 10C24.4535 10 15.3469 17.77 13.7935 28.65C12.2351 38.6993 14.6239 48.962 20.4602 57.29C23.2691 61.3961 26.9002 64.874 31.1235 67.5033C36.6769 70.8367 43.3369 70.8367 48.8902 67.5033C53.1135 64.874 56.7446 61.3961 59.5535 57.29C65.3661 48.9514 67.7528 38.6983 66.2202 28.65C64.6669 17.7667 55.5602 10 40.0135 10H40.0002Z" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M26.668 36.6666L33.3346 43.3333" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M53.3346 36.6666L46.668 43.3333" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h5 class="fw-medium">Б'юті простори + школи</h5>
        </div>
      </div>
    </div>

    <!-- Дистриб'ютор-представник -->
    <div class="col-lg-4 col-md-6">
      <div class="card  p-4 text-center">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16.668 23.3333C16.668 26.8696 18.0727 30.2609 20.5732 32.7614C23.0737 35.2619 26.4651 36.6667 30.0013 36.6667C33.5375 36.6667 36.9289 35.2619 39.4294 32.7614C41.9299 30.2609 43.3346 26.8696 43.3346 23.3333C43.3346 19.7971 41.9299 16.4057 39.4294 13.9052C36.9289 11.4048 33.5375 10 30.0013 10C26.4651 10 23.0737 11.4048 20.5732 13.9052C18.0727 16.4057 16.668 19.7971 16.668 23.3333Z" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M10 70V63.3333C10 59.7971 11.4048 56.4057 13.9052 53.9052C16.4057 51.4048 19.7971 50 23.3333 50H36.6667C40.2029 50 43.5943 51.4048 46.0948 53.9052C48.5952 56.4057 50 59.7971 50 63.3333V70" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M53.332 10.4333C56.2001 11.1677 58.7422 12.8357 60.5575 15.1744C62.3728 17.5131 63.3582 20.3894 63.3582 23.35C63.3582 26.3106 62.3728 29.187 60.5575 31.5256C58.7422 33.8643 56.2001 35.5323 53.332 36.2667" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M70 70V63.3333C69.9831 60.3905 68.993 57.536 67.1842 55.2147C65.3754 52.8933 62.8494 51.2357 60 50.5" stroke="black" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <h5 class="fw-medium">Дистриб'ютор-<br>представник у областях</h5>
      </div>
    </div>
  </div>
</section>


<section class="our_contacts_section">
  <div class="container">
    <div class="row g-4">
      <!-- 1 -->
      <div class="col-lg-2-custom col-md-4 col-sm-6 col-12">
        <div class="contact-card h-100">
          <img src="https://images.unsplash.com/photo-1556155092-490a1ba16284?w=600" alt="Менеджер Privat Label">
          <div class="contact-info">
            <h5>Ім'я</h5>
            <p class="position">Менеджер Privat Label</p>
            <a href="tel:+380934948557" class="phone text-decoration-none">
              <i class="fas fa-phone"></i> +38 (093) 494-85-57
            </a>
          </div>
        </div>
      </div>

      <!-- 2 -->
      <div class="col-lg-2-custom col-md-4 col-sm-6 col-12">
        <div class="contact-card h-100">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600" alt="Менеджер для масажистів">
          <div class="contact-info">
            <h5>Ім'я</h5>
            <p class="position">Менеджер з дистрибуції</p>
            <a href="tel:+380934948557" class="phone text-decoration-none">
              <i class="fas fa-phone"></i> +38 (093) 494-85-57
            </a>
          </div>
        </div>
      </div>

      <!-- 3 -->
      <div class="col-lg-2-custom col-md-4 col-sm-6 col-12">
        <div class="contact-card h-100">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600" alt="Менеджер для масажистів">
          <div class="contact-info">
            <h5>Ім'я</h5>
            <p class="position">Менеджер з дистрибуції</p>
            <a href="tel:+380934948557" class="phone text-decoration-none">
              <i class="fas fa-phone"></i> +38 (093) 494-85-57
            </a>
          </div>
        </div>
      </div>

      <!-- 4 -->
      <div class="col-lg-2-custom col-md-4 col-sm-6 col-12">
        <div class="contact-card h-100">
          <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600" alt="Навчання">
          <div class="contact-info">
            <h5>Ім'я</h5>
            <p class="position">Навчання</p>
            <a href="tel:+380934948557" class="phone text-decoration-none">
              <i class="fas fa-phone"></i> +38 (093) 494-85-57
            </a>
          </div>
        </div>
      </div>

      <!-- 5 -->
      <div class="col-lg-2-custom col-md-4 col-sm-6 col-12">
        <div class="contact-card h-100">
          <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600" alt="Навчання">
          <div class="contact-info">
            <h5>Ім'я</h5>
            <p class="position">Бухгалтер</p>
            <a href="tel:+380934948557" class="phone text-decoration-none">
              <i class="fas fa-phone"></i> +38 (093) 494-85-57
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="drop_shipping_section">
  <div class="container">
    <div class="hero-content">
      <h1>Опановуй дропшиппінг з нашою платформою!</h1>
      <p>
        Гейміфіковане навчання з короткими відео, тестами та MindMap.
        Пройди курс і отримай набір тестерів продукції на 5000 грн.
        Місця обмежені — лише 10 учасників!
      </p>
      <button
              class="btn btn-apply">
        Подати заявку
      </button>
    </div>
  </div>
</section>

<section class="doc_learn_cond_section">
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-lg-3 mb-4">
        <div class="sidebar">
          <button class="sidebar-btn active">
            <strong>Умови співпраці</strong>
          </button>
          <button class="sidebar-btn">Документи</button>
          <button class="sidebar-btn">Навчання</button>
        </div>
      </div>

      <!-- Main Table -->
      <div class="col-lg-9">
        <div class="table-container">
          <table class="table ">
            <tbody>
            <tr>
              <th>Асортимент</th>
              <td>доглядова косметика<br>професійна косметика<br>парфуми<br>лікувально-профілактична продукція</td>
            </tr>
            <tr class="highlight">
              <th>Умови оплати</th>
              <td>
                Викуп продукції з можливістю обміну, що не продається<br><br>
                <strong>Дроп</strong> — оплата за фактом
              </td>
            </tr>
            <tr>
              <th>Націнка</th>
              <td>
                дроп — 30 відсотків<br>
                представники — 40-50 залежно від обсягів<br>
                салони — 30-40 відсотків залежно від обсягів продажів
              </td>
            </tr>
            <tr>
              <th>Цінова політика</th>
              <td>
                Попереджаємо про підвищення цін за 2 тижні. Ціна продажу не може бути нижчою, ніж роздрібний прайс на сайті виробника.
              </td>
            </tr>
            <tr>
              <th>Демпінг</th>
              <td>
                Ми не дозволяємо встановлювати ціни нижчі за наші, вищі — так, нижчі — ні. Акції не враховуються.
              </td>
            </tr>
            <tr>
              <th>Навчання персоналу</th>
              <td>
                Навчання: обов’язково за нашими стандартами онлайн чи офлайн.<br><br>
                Період навчання за 7 днів до вступу товару, не пізніше. Обов’язково під час навчання у всіх мають бути каталоги, прайс-листи та пробники продукції.
              </td>
            </tr>
            <tr>
              <th>Тестери</th>
              <td>
                Обов’язково тестери на полиці для клієнтів офлайн магазинах або салоні — обов’язково та пробники.<br><br>
                10% від вартості замовлення — пробники<br><br>
                10 тис. замовлення — 1 тис. на пробники (1 пробник — 50 грн)
              </td>
            </tr>
            </tbody>
          </table>
        </div>

        <div class="view-more ">
          <a href="#" class="view-all mx-auto">Переглянути більше</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="kontractne_vyrobnyctvo_page">
  <section class="develop_cons_section">
    <div class="container">
      <div class="row g-5">

        <!-- Left Side -->
        <div class="col-lg-6 left-content">
          <h1>Потрібна додаткова інформація?</h1>
          <p class="lead" style="font-size: 1.2rem; line-height: 1.5;">
            Залиште свої контакти, і ми надамо консультацію з усіх питань співпраці.
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
