@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')
<section class="article_section">

  <div class="container py-5">

    <!-- TITLE -->
    <h1 class="fw-bold mb-4">
      Шкіра любить відновлювальну терапію
    </h1>

    <!-- HERO IMAGE -->
    <div class="mb-4">
      <img src="{{ asset('images/skincare1.png') }}"  class="img-fluid rounded-4 w-100 article-image" alt="">
    </div>

    <!-- ACTIONS -->
    <div class="d-flex justify-content-between align-items-center mb-5">
      <div class="wrapper_date">
        <button class="btn rounded-pill px-4 lik_prof">
          Лікування та профілактика
        </button>
        <div class="date_artc_wrapper">
          <span class="date_artc">Дата публікації</span>
          <div class="date">20 серпня 2022</div>
        </div>
      </div>


      <button class="btn btn-light rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#shareModal">
        <i class="bi bi-share me-2"></i> Поділитись
      </button>
    </div>


    <!-- TEXT -->
    <section class="article_content  w-50 mx-auto">
      <p class="text-muted mb-5" style="border-left: 1px solid;padding-left: 1rem;">
        Хвороби шкіри, одного з органів захисту та виведення, майже у 100% випадках мають глибокі першопричини. (Виняток становлять механічні пошкодження та опіки). Ослаблений епідерміс запалення реагує на токсини, що виходять з дерми або підшкірного жирового шару. І ця область стає легкою здобиччю для патологічних бактерій та грибків.
      </p>

      <!-- SECTION -->
      <h3 class="fw-bold mb-3">Правильне лікування дерматології</h3>
      <p class="text-muted mb-5">
        Пелоїди та мінерали лікувального компонента Дерміс-геля – екстракту Пеловіт-Р здійснюють потужну імунокорекцію шкіри пацієнтів з вираженими запаленнями, дерматитами, свербінням, алергією. Гель створює стійкий терапевтичний ефект при самостійному застосуванні, м’яко виводить токсини, загоює епідерміс, перешкоджаючи приєднанню вірусів.
        Гель є гіпоалергенним, не має запаху, повністю натуральний і не містить продуктів рослинного походження. Це виключає алергію на препарат, у тому числі у дітей, у жінок у період вагітності та лактації, робить його прийнятним для пацієнтів з бронхіальною астмою або з аутоімунними захворюваннями.
      </p>

      <!-- SECTION -->
      <h3 class="fw-bold mb-3">Комплексна схема</h3>
      Лікування за комплексною схемою дерматозів, псоріазу в період ремісії, нейродерміту, екземи, грибкових захворювань та інших проводиться до повного зникнення запальних явищ і включає:
      <br>• з 1-го дня Пеловіт-Р Класичний 1 раз на день увечері – ванни на 30 хвилин або інші лікувальні процедури.
      <br>• з 1-го дня Дерміс-гель 2-7 разів протягом дня. Перші дні при гострих запаленнях – кожні 30-40 хвилин.
      <br>• з 1-го дня мінеральний комплекс Соллеран для виключення мікроелементозу як однієї з причин патології.
      <br>• з 3-го дня або з дня повної епітелізації хворої зони можна застосовувати скраб для тіла і шкіри голови, або пілінг для обличчя. Вони прискорюють відлущування відмерлих патологічних клітин, відкривають доступ кисню для формування здорового епітелію, що прискорює настання косметичного ефекту.
      <br>Ліквідація гострих захворювань може обійтися меншими зусиллями. Хронічні захворювання слід лікувати курсами із перервами. У цьому період ремісії між загостреннями зростатиме.
      Застосування кожного препарату можна коригувати індивідуально залежно від локалізації та виду патології. Однак повний курс має більш виражену пролонговану дію. Після його закінчення організм сам відновлюватиметься шляхом накопичених у шкірному депо лікувальних компонентів.
      Сировина для виробництва препаратів Аксімед

      <!-- IMAGE GRID -->
      <div class="row g-3 mb-5 content_images">
        <div class="col-md-6">
          <img src="{{ asset('images/face_washing.png') }}" class="img-fluid rounded-4 w-100" alt="">
          <p class="mt-2 small text-muted">Назва продукту</p>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('images/science_in_laboratory.png') }}" class="img-fluid rounded-4 w-100" alt="">
          <p class="mt-2 small text-muted">Назва продукту</p>
        </div>
      </div>

      <!-- TABLE -->
      <div class="table-responsive mb-5">
        <table class="table align-middle">
          <thead>
          <tr>
            <th>Заголовок</th>
            <th>Заголовок</th>
            <th>Заголовок</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>Lorem ipsum dolor sit amet consectetur.</td>
            <td>Lorem ipsum dolor sit amet consectetur.</td>
            <td>Lorem ipsum dolor sit amet consectetur.</td>
          </tr>
          <tr>
            <td>Lorem ipsum dolor sit amet consectetur.</td>
            <td>Lorem ipsum dolor sit amet consectetur.</td>
            <td>Lorem ipsum dolor sit amet consectetur.</td>
          </tr>
          </tbody>
        </table>
      </div>

      <!-- VIDEO -->
      <div class="mb-5">
        <div class="ratio ratio-16x9">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/n55z6Rk-NJU?si=GGob0jXOMnS5KH2F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>

      <h4 class="fw-bold mb-3">Рекомендації</h4>
      <p class="text-muted mb-5">
        Для гострих станів рекомендується використовувати гель до 7 разів на день з поступовим зниженням частоти після стабілізації. Для профілактики загострень та підтримки здоров’я шкіри слід регулярно приймати ванни з Пеловіт-Р та проводити підтримуючий курс Дерміс-гелю 1–2 рази на день. Використання скрабів та пілінгів після епітелізації зони дозволяє прискорити відновлення та покращує косметичний ефект.
      </p>

      <!-- QUOTE -->
      <div class="bg-light rounded-4 p-4 mb-5">
        <div>
          <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.98673 14.0664C2.68289 14.0664 1.69248 13.59 1.01549 12.6372C0.338496 11.6593 0 10.3053 0 8.57522C0 6.69469 0.476401 5.02729 1.4292 3.57301C2.40708 2.11873 3.88643 0.927729 5.86726 0L7.22124 2.78319C6.0177 3.30973 5.11504 3.96165 4.51327 4.73894C3.9115 5.51622 3.61062 6.46903 3.61062 7.59734L3.64823 11.1327L1.73009 8.38717C2.03097 8.1615 2.38201 7.96091 2.78319 7.7854C3.18437 7.60988 3.58555 7.52212 3.98673 7.52212C4.88938 7.52212 5.65413 7.79793 6.28097 8.34956C6.90782 8.90118 7.22124 9.65339 7.22124 10.6062C7.22124 11.6593 6.92035 12.4993 6.31858 13.1261C5.71681 13.753 4.93953 14.0664 3.98673 14.0664ZM13.7655 14.0664C12.4617 14.0664 11.4712 13.59 10.7942 12.6372C10.1173 11.6593 9.77876 10.3053 9.77876 8.57522C9.77876 6.69469 10.2552 5.02729 11.208 3.57301C12.1858 2.11873 13.6652 0.927729 15.646 0L17 2.78319C15.7965 3.30973 14.8938 3.96165 14.292 4.73894C13.6903 5.51622 13.3894 6.46903 13.3894 7.59734L13.427 11.1327L11.5089 8.38717C11.8097 8.1615 12.1608 7.96091 12.5619 7.7854C12.9631 7.60988 13.3643 7.52212 13.7655 7.52212C14.6681 7.52212 15.4329 7.79793 16.0597 8.34956C16.6866 8.90118 17 9.65339 17 10.6062C17 11.6593 16.6991 12.4993 16.0973 13.1261C15.4956 13.753 14.7183 14.0664 13.7655 14.0664Z" fill="#AD8F8E"/>
          </svg>

        </div>
        <blockquote class="mb-0 text-muted">
          Lorem ipsum dolor sit amet consectetur. Diam mattis quis augue integer eget. Tortor enim accumsan eget purus rhoncus ac aliquam ante. Suspendisse volutpat senectus quam aenean vitae convallis. Velit donec tristique donec duis morbi. Luctus dui amet mauris mattis id consectetur pharetra tellus ac. Sodales eu.
        </blockquote>
        <div>
          — Імʼя Прізвище
        </div>
      </div>

      <!-- CONCLUSION -->
      <h4 class="fw-bold mb-3">Підсумок</h4>
      <p class="text-muted mb-5">
        Застосування препаратів на основі пелоїдів та мінералів Пеловіт-Р забезпечує глибоку і тривалу терапевтичну дію. Вони допомагають не лише усунути симптоми, а й впливати на першопричини дерматологічних проблем, зміцнюють імунітет шкіри та запобігають повторним загостренням.
      </p>

      <!-- RATING -->
      <div class="mb-4">
        <span class="text-warning">
          <span class="text-muted">Поставити оцінку:</span>  ★★★★☆
        </span>
      </div>

      <!-- COMMENT -->
      <div class="mb-5">
        <span class="text-muted">Залишити коментар</span>
        <textarea class="form-control rounded-4 p-3 border-0" rows="4" placeholder="Ваш коментар"></textarea>
      </div>

      <!-- BUTTON -->
      <button class="btn btn-dark rad-16 px-4">
        Надіслати
      </button>
    </section>
  </div>
</section>

<section class="container publications_box similar py-5">
  <h2 class="mb-4">Подібні публікації</h2>

  <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-lg-4">
      <div class="card h-100">
        <div class="position-relative">
          <div class="card-img-top_wrapper">
            <img src="https://picsum.photos/id/1011/800/600" class="card-img-top" alt="Жіноче обличчя">
          </div>
          <span class="badge position-absolute  px-3 py-2">Клінічні дослідження</span>
        </div>
        <div class="card-body d-flex flex-column">
          <p class="text-muted small data">12 вересня 2025</p>
          <h5 class="card-title">Висновок одеського інституту здоров’я сім’ї</h5>
          <a href="#" class="detailed">Детальніше
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17.3172 10.442L11.6922 16.067C11.5749 16.1843 11.4159 16.2502 11.25 16.2502C11.0841 16.2502 10.9251 16.1843 10.8078 16.067C10.6905 15.9498 10.6247 15.7907 10.6247 15.6249C10.6247 15.459 10.6905 15.2999 10.8078 15.1827L15.3664 10.6249H3.125C2.95924 10.6249 2.80027 10.559 2.68306 10.4418C2.56585 10.3246 2.5 10.1656 2.5 9.99986C2.5 9.8341 2.56585 9.67513 2.68306 9.55792C2.80027 9.44071 2.95924 9.37486 3.125 9.37486H15.3664L10.8078 4.81705C10.6905 4.69977 10.6247 4.54071 10.6247 4.37486C10.6247 4.20901 10.6905 4.04995 10.8078 3.93267C10.9251 3.8154 11.0841 3.74951 11.25 3.74951C11.4159 3.74951 11.5749 3.8154 11.6922 3.93267L17.3172 9.55767C17.3753 9.61572 17.4214 9.68465 17.4529 9.76052C17.4843 9.8364 17.5005 9.91772 17.5005 9.99986C17.5005 10.082 17.4843 10.1633 17.4529 10.2392C17.4214 10.3151 17.3753 10.384 17.3172 10.442Z" fill="#1A1A1A"/>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-lg-4">
      <div class="card h-100">
        <div class="position-relative">
          <div class="card-img-top_wrapper">
            <img src="https://picsum.photos/id/106/800/600" class="card-img-top" alt="Флакон">
          </div>
          <span class="badge position-absolute  px-3 py-2">Клінічні дослідження</span>
        </div>
        <div class="card-body d-flex flex-column">
          <p class="text-muted small data">12 вересня 2025</p>
          <h5 class="card-title">Висновок одеського інституту здоров’я сім’ї</h5>
          <a  href="#" class="detailed">Детальніше
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17.3172 10.442L11.6922 16.067C11.5749 16.1843 11.4159 16.2502 11.25 16.2502C11.0841 16.2502 10.9251 16.1843 10.8078 16.067C10.6905 15.9498 10.6247 15.7907 10.6247 15.6249C10.6247 15.459 10.6905 15.2999 10.8078 15.1827L15.3664 10.6249H3.125C2.95924 10.6249 2.80027 10.559 2.68306 10.4418C2.56585 10.3246 2.5 10.1656 2.5 9.99986C2.5 9.8341 2.56585 9.67513 2.68306 9.55792C2.80027 9.44071 2.95924 9.37486 3.125 9.37486H15.3664L10.8078 4.81705C10.6905 4.69977 10.6247 4.54071 10.6247 4.37486C10.6247 4.20901 10.6905 4.04995 10.8078 3.93267C10.9251 3.8154 11.0841 3.74951 11.25 3.74951C11.4159 3.74951 11.5749 3.8154 11.6922 3.93267L17.3172 9.55767C17.3753 9.61572 17.4214 9.68465 17.4529 9.76052C17.4843 9.8364 17.5005 9.91772 17.5005 9.99986C17.5005 10.082 17.4843 10.1633 17.4529 10.2392C17.4214 10.3151 17.3753 10.384 17.3172 10.442Z" fill="#1A1A1A"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="col-lg-4">
      <div class="card h-100">
        <div class="position-relative">
          <div class="card-img-top_wrapper">
            <img src="https://picsum.photos/id/106/800/600" class="card-img-top" alt="Флакон">
          </div>
          <span class="badge position-absolute  px-3 py-2">Клінічні дослідження</span>
        </div>
        <div class="card-body d-flex flex-column">
          <p class="text-muted small data">12 вересня 2025</p>
          <h5 class="card-title">Висновок одеського інституту здоров’я сім’ї</h5>
          <a  href="#" class="detailed">Детальніше
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.3172 10.442L11.6922 16.067C11.5749 16.1843 11.4159 16.2502 11.25 16.2502C11.0841 16.2502 10.9251 16.1843 10.8078 16.067C10.6905 15.9498 10.6247 15.7907 10.6247 15.6249C10.6247 15.459 10.6905 15.2999 10.8078 15.1827L15.3664 10.6249H3.125C2.95924 10.6249 2.80027 10.559 2.68306 10.4418C2.56585 10.3246 2.5 10.1656 2.5 9.99986C2.5 9.8341 2.56585 9.67513 2.68306 9.55792C2.80027 9.44071 2.95924 9.37486 3.125 9.37486H15.3664L10.8078 4.81705C10.6905 4.69977 10.6247 4.54071 10.6247 4.37486C10.6247 4.20901 10.6905 4.04995 10.8078 3.93267C10.9251 3.8154 11.0841 3.74951 11.25 3.74951C11.4159 3.74951 11.5749 3.8154 11.6922 3.93267L17.3172 9.55767C17.3753 9.61572 17.4214 9.68465 17.4529 9.76052C17.4843 9.8364 17.5005 9.91772 17.5005 9.99986C17.5005 10.082 17.4843 10.1633 17.4529 10.2392C17.4214 10.3151 17.3753 10.384 17.3172 10.442Z" fill="#1A1A1A"/>
          </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
    <div class="modal-content rounded-4 shadow">

      <!-- Header -->
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="shareModalLabel">Поділитися:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body pt-2">
        <!-- URL + Copy Button -->
        <div class="input-group mb-4">
          <input type="text" id="shareUrl" class="form-control bg-light border-0"
                 value="https://pelovit.com/instruktsii/sun-defense-..." readonly>
          <button class="btn btn-primary px-4" id="copyBtn" type="button">
            Скопіювати
            <i class="bi bi-clipboard ms-1"></i>
          </button>
        </div>

        <!-- Social Icons -->
        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a href="#" class="share-icon"><i class="bi bi-box-arrow-up fs-3"></i></a>
          <a href="#" class="share-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="48" height="48" alt="WhatsApp"></a>
          <a href="#" class="share-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" width="48" height="48" alt="Telegram"></a>
          <a href="#" class="share-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Viber_logo_2018_%28without_text%29.svg/960px-Viber_logo_2018_%28without_text%29.svg.png?utm_source=commons.wikimedia.org&utm_campaign=imageinfo&utm_content=thumbnail" width="48" height="48" alt="Viber"></a>
          <a href="#" class="share-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" width="48" height="48" alt="Instagram"></a>
          <a href="#" class="share-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" width="48" height="48" alt="Facebook"></a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    document.getElementById('copyBtn').addEventListener('click', function() {
        const urlInput = document.getElementById('shareUrl');
        urlInput.select();
        navigator.clipboard.writeText(urlInput.value).then(() => {
            const originalText = this.innerHTML;
            this.innerHTML = 'Скопійовано!';
            this.style.backgroundColor = '#198754';

            setTimeout(() => {
                this.innerHTML = originalText;
                this.style.backgroundColor = '';
            }, 2000);
        });
        const shareModal = new bootstrap.Modal(document.getElementById('shareModal'));
        shareModal.show();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
