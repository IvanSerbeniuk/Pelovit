@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')

    <!-- Hero Section -->
<section class="hero" >
  <div class="container">
    <div class="row align-items-center">
      <!-- Ліва частина - текст -->
      <div class="col-lg-7">
        <h1 class="fw-bold mb-4">Pelovit-R — натуральна сила Куяльницького лиману для здоров’я та краси вдома</h1>
        <p class="lead fs-5">
          • Натуральні компоненти, перевірені часом
        </p>
        <p class="lead fs-5">• Ефект санаторію без виходу з дому </p>
        <p class="lead fs-5">• Продукти для тіла, обличчя та загального оздоровлення </p>
        <a href="#" class="btn btn-light btn-lg px-3 py-3 fw-medium rad-16">Дізнатись більше</a>
      </div>

      <!-- Права частина - статистика -->
      <div class="col-lg-5">
        <div class="row g-4">
          <div class="col-6">
            <div class="stat-card ">
              <p class="mb-0 fw-medium">Спа-масажі</p>
              <i><x-icons.sparkle /></i>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-card ">
              <p class="mb-0 fw-medium">Лікувальні масажі</p>
              <i><x-icons.clipboard-heart /></i>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-card ">
              <p class="mb-0 fw-medium">Антицелюлітні масажі</p>
              <i><x-icons.droplet-slash /></i>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-card ">
              <p class="mb-0 fw-medium">Апаратні масажі</p>
              <i><x-icons.webcam /></i>
            </div>
          </div>
          <div class="col-6">
            <div class="stat-card ">
              <p class="mb-0 fw-medium">Масажі обличчя</p>
              <i><x-icons.face-smile /></i>
            </div>
          </div>
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
          <h1>Отримайте безкоштовний відеопротокол та розрахунок процедури</h1>
          <p class="lead" style="font-size: 1.2rem; line-height: 1.5;">
            Залиште свої контакти — ми надішлемо 1 <br>
            відеопротокол безкоштовно, а також підготуємо калькуляцію собівартості.
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
