@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')
<script id="product-data" type="application/json">
{!! json_encode([
    'id'    => $product->id,
    'name'  => $product->name,
    'price' => (float) $product->price,
    'image' => $product->image,
    'slug'  => $product->slug,
]) !!}
</script>
    <div class="product_name_page" data-product-name="pelovit">

  <section class="container py-5">
    <!-- Product Section -->
    <div class="row g-5">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="/products">Products</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Пеловіт-Р Стомат Freshmint
          </li>
        </ol>
      </nav>


      <!-- Left - Images -->
      <div class="col-lg-5 left_content">
        <div class="text-center">
          <div class="share_wrapper">
            <i class="share"><x-icons.share /></i>
            <i class="like"><x-icons.heart-like size="20" /></i>
          </div>
          <img src="{{ asset('images/page_pelovit.jpg') }}"
               class="img-fluid product-image shadow-sm rounded" alt="Пеловіт-Р Стомат Freshmint">
        </div>
        <!-- Thumbnails -->
<!--        <div class="d-flex justify-content-center gap-3 mt-4">-->
<!--          <img src="assets/page_pelovit.jpg" class="img-thumbnail" alt="">-->
<!--          <img src="assets/page_pelovit.jpg" class="img-thumbnail" alt="">-->
<!--          <img src="assets/page_pelovit.jpg" class="img-thumbnail" alt="">-->
<!--        </div>-->
      </div>

      <!-- Right - Info -->
      <div class="col-lg-7 right_content">
        <h1 class="fw-bold">Пеловіт-Р Стомат Freshmint</h1>
        <div class="categories">
          <p class="text-muted">Лікувальні препарати</p>
          <p class="text-muted">Стоматологія</p>
        </div>



        <div class="d-flex align-items-center gap-3 mb-4">
          <span class="rating fs-4">★★★★★</span>
          <span><strong>4.9</strong> (15 відгуків)</span>
        </div>

        <p class="text-muted small">
          Після оформлення вас зв'яжеться продавець-консультант.<br>
          Залишайте оплату будь-яким зручним для вас способом.
        </p>

        <h2 class="price">300₴</h2>
        <div class="portion_box">
          <p class="portion_text">200 мл</p>
          <p class="portion_text">400 мл</p>
        </div>

        <div class="my-4 counter_cart_wrapper">
          <div class="counter">
            <button class="btn_counter minus">−</button>
            <span class="value">1</span>
            <button class="btn_counter plus">+</button>
          </div>
          <button class="btn btn-dark btn-lg px-5 me-3 add_incart">Додати в кошик</button>
          <button class="btn btn-outline-dark px-5 btn-lg buy_in_oneclick">Купити в один клік</button>
        </div>

        <div class="cons_wrap">
          <div><x-icons.chat /> Після оформлення з вами зв’язується продавець-консультант</div>
          <div><x-icons.wallet /> Здійснюєте оплату будь-яким зручним для вас способом</div>
          <div><x-icons.box /> Отримуєте посилку Новою Поштою (в межах України)</div>

        </div>



        <!-- Description -->
        <div class="description_wrapper_dropdown">
          <h5 class="mt-5 mb-3">Механізм дії</h5>
          <p>Натуральний препарат для щоденного догляду за ротовою порожниною. Нормалізує мікрофлору, зменшує запалення, кровоточивість ясен та сприяє регенерації слизової оболонки.</p>

          <h5 class="mt-5 mb-3">Склад</h5>
          <p>Водневий показник (рН) 7,72 Загальна жорсткість 785,0 мг-екв/дм3 Загальна лужність 5,2 мг-екв/дм3 Сухий залишок (мінералізація) 157,8 г/дм3 Натрій + 60,0 г/дм3 Калій + 0,9 г/дм3 Кальцій2+ 2,5 г/дм3 Магній2+ 8,03 г/дм3 Хлор – 91,2 г/дм3 Сульфати 2- 2,1 г/дм3 Карбонати2- 0,02 г/дм3 Бікарбонати – 0,317 г/дм3 Еп +289,0
          </p>

          <h5 class="mt-4 mb-3">Показання</h5>
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>Проблема</th>
              <th>Спосіб застосування</th>
              <th>Результат</th>
            </tr>
            </thead>
            <tbody>
            <tr><td>Зубний біль</td><td>Полоскання 4–8 разів на день</td><td>Нормалізація чутливості</td></tr>
            <tr><td>Гінгівіт, пародонтит</td><td>Регулярне полоскання</td><td>Зменшення запалення</td></tr>
            <tr><td>Стоматит</td><td>Курсова терапія</td><td>Прискорення загоєння</td></tr>
            </tbody>
          </table>
        </div>

        <!-- Reviews -->
        <section class="reviews_section">
          <h5 class="mt-5 ">Відгуки</h5>
          <div class="wrapper_review">

            <div class="avarege_rate_wrapper">
              <div class="averare_rate">
                <x-icons.star />
                <span>4.9</span>
              </div>
              <div class="count_rates">
                15 відгуків
              </div>
              <!-- Button -->
              <button class="btn py-2 fw-medium rad-16 leave_review">
                Залишити відгук
              </button>
            </div>
            <div class="border rad-16  p-3 mb-3 table_rate">
              <div class="mb-4">
                <div class="rating-row">
                  <input type="checkbox" class="bg-white border-secondary">
                  <span class="star-number">5</span>
                  <div class="flex-grow-1 bar-container">
                    <div class="bar1" ></div>
                  </div>
                  <span class=" ms-2" style="width: 48px;">96%</span>
                </div>

                <div class="rating-row">
                  <input type="checkbox" class="bg-white border-secondary">
                  <span class="star-number">4</span>
                  <div class="flex-grow-1 bar-container">
                    <div class="bar2" ></div>
                  </div>
                  <span class=" ms-2" style="width: 48px;">2%</span>
                </div>

                <div class="rating-row">
                  <input type="checkbox" class="bg-white border-secondary">
                  <span class="star-number">3</span>
                  <div class="flex-grow-1 bar-container">
                    <div class="bar3" ></div>
                  </div>
                  <span class=" ms-2" style="width: 48px;">&lt;1%</span>
                </div>

                <div class="rating-row">
                  <input type="checkbox" class="bg-white border-secondary">
                  <span class="star-number">2</span>
                  <div class="flex-grow-1 bar-container">
                    <div class="bar4" ></div>
                  </div>
                  <span class=" ms-2" style="width: 48px;">&lt;1%</span>
                </div>

                <div class="rating-row">
                  <input type="checkbox" class="bg-white border-secondary">
                  <span class="star-number">1</span>
                  <div class="flex-grow-1 bar-container">
                    <div class="bar5" ></div>
                  </div>
                  <span class=" ms-2" style="width: 48px;">&lt;1%</span>
                </div>
              </div>
            </div>
          </div>
        </section>

        <div class="tabs">
          <button class="tab ">Огляди</button>
          <button class="tab active">Відгуки</button>
        </div>

  <!--      Comments-->
        <section class="comments_section">
            <div class="review-card mx-auto ">
              <!-- Header -->
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="d-flex gap-3 align-items-center">
                  <div class="avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" version="1.1" width="120" height="120">
                      <path d="M0 0 C39.6 0 79.2 0 120 0 C120 39.6 120 79.2 120 120 C80.4 120 40.8 120 0 120 C0 80.4 0 40.8 0 0 Z " fill="#C5C5C5" transform="translate(0,0)"/>
                      <path d="M0 0 C8.05665274 4.29148337 13.66690713 10.25698184 16.39453125 19.0546875 C17.65313036 29.76362992 16.47249028 38.93774896 10.39453125 48.0546875 C9.73453125 48.0546875 9.07453125 48.0546875 8.39453125 48.0546875 C8.39453125 48.7146875 8.39453125 49.3746875 8.39453125 50.0546875 C6.72786458 51.38802083 5.06119792 52.72135417 3.39453125 54.0546875 C3.39453125 54.7146875 3.39453125 55.3746875 3.39453125 56.0546875 C4.45671875 56.34601563 5.51890625 56.63734375 6.61328125 56.9375 C17.39791936 60.01390758 25.66067371 62.93918103 31.4296875 73.17578125 C33.95238371 78.08840018 34.39453125 80.22099488 34.39453125 86.0546875 C6.01453125 86.0546875 -22.36546875 86.0546875 -51.60546875 86.0546875 C-49.67610299 75.44317583 -47.98601871 68.92914329 -39.41796875 62.6796875 C-33.77068604 59.22803763 -27.25220456 57.0546875 -20.60546875 57.0546875 C-20.95333583 55.07932005 -20.95333583 55.07932005 -21.60546875 53.0546875 C-22.26546875 52.7246875 -22.92546875 52.3946875 -23.60546875 52.0546875 C-23.60546875 51.3946875 -23.60546875 50.7346875 -23.60546875 50.0546875 C-24.21003906 49.81492188 -24.81460938 49.57515625 -25.4375 49.328125 C-28.0802842 47.7757869 -28.87484364 46.37278313 -30.29296875 43.6796875 C-30.70933594 42.90882812 -31.12570313 42.13796875 -31.5546875 41.34375 C-35.0703443 33.68510731 -34.95726173 23.53406055 -32.546875 15.546875 C-29.06044682 8.00711976 -24.69787888 3.44670339 -17.21875 -0.06640625 C-11.68922853 -1.92611078 -5.49782846 -1.99471437 0 0 Z " fill="#FEFEFE" transform="translate(68.60546875,33.9453125)"/>
                    </svg>

                  </div>
                  <div>
                    <h5 class="mb-0 fw-semibold">Валентина</h5>
                    <small class="text-muted">18.03.2025</small>
                  </div>
                </div>
                <div class="stars">★★★★★</div>
              </div>

              <!-- Text -->
              <p class="review-text mb-4">
                Використовую Пеловіт-Р уже другий тиждень після видалення зуба. Дуже сподобалося, що знімає неприємний біль і набряк буквально після кількох полоскань. Ясна загоїлися швидше, ніж очікувала, і без дискомфорту. Приємно, що засіб натуральний і без різкого смаку. Тепер застосовую й для профілактики — помітила, що кровоточивість ясен майже зникла.
              </p>

              <!-- Images -->
              <div class="review-images row g-3">
                <div class="comment_image">
                  <img src="{{ asset('images/smile_big.png') }}" alt="Зуби після лікування" class="img-fluid">
                </div>
                <div class="comment_image">
                  <img src="{{ asset('images/smile_big.png') }}" alt="Усмішка з дзеркалом" class="img-fluid">
                </div>
              </div>
            </div>
        </section>

        <a href="#" class="view-all">Показати більше</a>

        <section class="promotion_ad">
          <h4 class="heading">При покупці від 3-х одиниць ПОДАРУНОК на вибір:</h4>
          <div class="cards_promos">
            <div class="card_promo">
              <img src="{{ asset('images/promo_image.png') }}" alt="" class="image_promo img-fluid">
              <div class="title_product">Спрей від нежиті Доктор Лоріс+</div>
            </div>
            <div class="card_promo">
              <img src="{{ asset('images/promo_image.png') }}" alt="" class="image_promo img-fluid">
              <div class="title_product">Масло для тіла Липолитик</div>
            </div>
            <div class="card_promo">
              <img src="{{ asset('images/promo_image.png') }}" alt="" class="image_promo img-fluid">
              <div class="title_product">Скраб-бустер для тiла</div>
            </div>
            <div class="card_promo">
              <img src="{{ asset('images/promo_image.png') }}" alt="" class="image_promo img-fluid">
              <div class="title_product">Лікувальний ополіскувач</div>
            </div>
          </div>
        </section>

  <!--      Faq-->
        <div class="container faq-container">
          <h2 class="mb-4">Відповіді на запитання</h2>

          <div class="accordion" id="faqAccordion">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="true">
                  Що таке PELOVIT-R і в чому його особливість?
                </button>
              </h2>
              <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Асортимент включає лікувальні препарати (для шкіри, суглобів, ЛОР-області), доглядову косметику (маски, скраби, тоніки), а також можливість виготовлення косметики під вашим брендом (контрактне виробництво).
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">
                  З якого матеріалу виготовлені продукти бренду?
                </button>
              </h2>
              <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Відповідь на друге питання...
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q3">
                  Чи підходить косметика PELOVIT-R для чутливої шкіри?
                </button>
              </h2>
              <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Відповідь на третє питання...
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q4">
                  Чим відрізняються серії продукції?
                </button>
              </h2>
              <div id="q4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Асортимент включає лікувальні препарати (для шкіри, суглобів, ЛОР-області), доглядову косметику (маски, скраби, тоніки), а також можливість виготовлення косметики під вашим брендом (контрактне виробництво)
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q5">
                  Яка доставка доступна і чи працюєте по Україні?
                </button>
              </h2>
              <div id="q5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Асортимент включає лікувальні препарати (для шкіри, суглобів, ЛОР-області), доглядову косметику (маски, скраби, тоніки), а також можливість виготовлення косметики під вашим брендом (контрактне виробництво)
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q6">
                  Як оформити косметику під власним брендом?
                </button>
              </h2>
              <div id="q6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Асортимент включає лікувальні препарати (для шкіри, суглобів, ЛОР-області), доглядову косметику (маски, скраби, тоніки), а також можливість виготовлення косметики під вашим брендом (контрактне виробництво)
                </div>
              </div>
            </div>
          </div>
        </div>


        <section class="consultation_form">
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

            <div class="social-links">
              <p>Ви можете написати нам самі:</p>
              <div class="social-icons">
                <a href="#"><x-icons.instagram /></a>
                <a href="#"><x-icons.telegram /></a>
                <a href="#"><x-icons.viber /></a>
              </div>
            </div>
          </div>
        </section>




      </div>


      <!-- Similar Products -->
      <section class="py-5 all_categories often_bought">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">З цим товаром часто купують</h2>
            <a href="#" class="view-all">Переглянути більше</a>
          </div>
          <div class="row g-4">
            <div class="col-md-3 col-6">
              <div class="product-card card border-0 shadow-sm rad-16">
                <div class="tag_brown">Обличчя</div>
                <div class="like">
                  <x-icons.heart-like />
                </div>
                <img src="{{ asset('images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
                <div class="card-body">
                  <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
                  <div class="wrapper__price_buy">
                    <div class="disc_price_wrapper">
                      <h4 class="price">6908₴</h4>
                    </div>
                    <button class="btn buy rad-12 ">
                      <span>Купити</span>
                      <x-icons.cart color="#FAF7F3" />
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="product-card card border-0 shadow-sm rad-16">
                <div class="tag_brown">Обличчя</div>
                <div class="like">
                  <x-icons.heart-like />
                </div>
                <img src="{{ asset('images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
                <div class="card-body">
                  <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
                  <div class="wrapper__price_buy">
                    <div class="disc_price_wrapper">
                      <h4 class="price">6908₴</h4>
                    </div>
                    <button class="btn buy rad-12 ">
                      <span>Купити</span>
                      <x-icons.cart color="#FAF7F3" />
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="product-card card border-0 shadow-sm rad-16">
                <div class="tag_brown">Обличчя</div>
                <div class="like">
                  <x-icons.heart-like />
                </div>
                <img src="{{ asset('images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
                <div class="card-body">
                  <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
                  <div class="wrapper__price_buy">
                    <div class="disc_price_wrapper">
                      <h4 class="price">6908₴</h4>
                    </div>
                    <button class="btn buy rad-12 ">
                      <span>Купити</span>
                      <x-icons.cart color="#FAF7F3" />
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="product-card card border-0 shadow-sm rad-16">
                <div class="tag_brown">Обличчя</div>
                <div class="like">
                  <x-icons.heart-like />
                </div>
                <img src="{{ asset('images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
                <div class="card-body">
                  <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
                  <div class="wrapper__price_buy">
                    <div class="disc_price_wrapper">
                      <h4 class="price">6908₴</h4>
                    </div>
                    <button class="btn buy rad-12 ">
                      <span>Купити</span>
                      <x-icons.cart color="#FAF7F3" />
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Product cards same as above -->
          </div>
        </div>
      </section>
    </div>
  </section>





</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
