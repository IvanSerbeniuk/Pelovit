@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')

    <section class="container order_section">
  <h1 class="fw-bold mt-4 mb-3">
    Оформлення замовлення
  </h1>
  <form id="order-form" method="POST" action="{{ route('order.store') }}">
  @csrf
  <input type="hidden" name="items" id="order-items-input">
  <input type="hidden" name="total" id="order-total-input">
  <div class="row g-4">
    <!-- Ліва колонка: контакти, доставка, оплата, коментар -->
    <div class="col-lg-7">
      <div class="card checkout-card mb-4">
        <div class="card-header-custom">
           Контактні дані
        </div>
        <div class="card-body p-4 pt-0">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label fw-medium">Ваше ім'я <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="first_name" placeholder="Введіть імʼя" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-medium">Ваше прізвище <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="last_name" placeholder="Введіть прізвище" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-medium">Мобільний телефон</label>
              <input type="tel" class="form-control" name="phone" placeholder="Введіть телефон" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-medium">Електронна пошта</label>
              <input type="email" class="form-control" name="email" placeholder="Введіть електронну пошту">
            </div>
          </div>
        </div>
      </div>

      <!-- Спосіб доставки -->
      <div class="card checkout-card mb-4">
        <div class="card-header-custom">
          Спосіб доставки
        </div>
        <div class="card-body p-4 pt-0">
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="">Нова пошта</span>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Місто / Населений пункт</label>
              <input type="text" class="form-control" name="city" placeholder="Оберіть місто">
            </div>
            <div class="col-md-6">
              <label class="form-label">Номер відділення / поштомату</label>
              <input type="text" class="form-control" name="branch" placeholder="Відділення №">
            </div>
          </div>
        </div>
      </div>

      <!-- Спосіб оплати -->
      <div class="card checkout-card mb-4">
        <div class="card-header-custom">
          Спосіб оплати
        </div>
        <div class="card-body p-4 pt-0">
          <div class="form-check mb-3 p-3">
            <div class="wrapper_payment">
              <div class="payment_content">
                <input class="form-check-input" type="radio" name="payment_method" value="card" id="cardPayment" checked>
                <label class="form-check-label" for="cardPayment">
                   Оплата на карту
                </label>
              </div>

              <div class="payment_icons">

                <i class="master_card">
                  <svg width="53" height="36" viewBox="0 0 53 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path d="M33.1865 7.83594C38.8394 7.83611 43.4219 12.4719 43.4219 18.1904C43.4219 23.9089 38.8394 28.5448 33.1865 28.5449C30.6521 28.5449 28.3345 27.6108 26.5469 26.0674C24.7593 27.6108 22.4416 28.5449 19.9072 28.5449C14.2544 28.5448 9.67188 23.9089 9.67188 18.1904C9.67188 12.4719 14.2544 7.8361 19.9072 7.83594C22.4414 7.83594 24.7593 8.76931 26.5469 10.3125C28.3344 8.76931 30.6523 7.83594 33.1865 7.83594Z" fill="#ED0006"/>
                    <path d="M33.1865 7.83594C38.8394 7.83611 43.4219 12.4719 43.4219 18.1904C43.4219 23.9089 38.8394 28.5448 33.1865 28.5449C30.6521 28.5449 28.3345 27.6108 26.5469 26.0674C28.7465 24.1682 30.1436 21.3452 30.1436 18.1904C30.1436 15.0354 28.7468 12.2117 26.5469 10.3125C28.3344 8.76931 30.6523 7.83594 33.1865 7.83594Z" fill="#F9A000"/>
                    <path d="M26.5449 10.3124C28.745 12.2116 30.1416 15.0352 30.1416 18.1904C30.1416 21.3453 28.7447 24.1681 26.5449 26.0673C24.3455 24.1681 22.9492 21.345 22.9492 18.1904C22.9492 15.0355 24.3452 12.2116 26.5449 10.3124Z" fill="#FF5E00"/>
                  </svg>
                </i>
                <i class="visa">
                  <svg width="53" height="36" viewBox="0 0 53 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9379 24.3874H12.7574L10.3724 15.2886C10.2592 14.87 10.0189 14.5 9.66531 14.3256C8.78297 13.8873 7.81068 13.5386 6.75 13.3626V13.0123H11.8735C12.5806 13.0123 13.111 13.5386 13.1994 14.1497L14.4368 20.713L17.6157 13.0123H20.7078L15.9379 24.3874ZM22.4756 24.3874H19.4719L21.9453 13.0123H24.949L22.4756 24.3874ZM28.835 16.1636C28.9234 15.5509 29.4538 15.2006 30.0725 15.2006C31.0448 15.1127 32.1039 15.2886 32.9878 15.7253L33.5182 13.2762C32.6343 12.9259 31.662 12.75 30.7796 12.75C27.8643 12.75 25.743 14.3256 25.743 16.5124C25.743 18.1759 27.2456 19.0494 28.3063 19.5756C29.4538 20.1003 29.8957 20.4506 29.8073 20.9753C29.8073 21.7624 28.9234 22.1127 28.0411 22.1127C26.9804 22.1127 25.9197 21.8503 24.949 21.4121L24.4187 23.8627C25.4793 24.2994 26.6268 24.4753 27.6875 24.4753C30.9564 24.5618 32.9878 22.9877 32.9878 20.625C32.9878 17.6497 28.835 17.4753 28.835 16.1636V16.1636ZM43.5 24.3874L41.115 13.0123H38.5533C38.0229 13.0123 37.4926 13.3626 37.3158 13.8873L32.8994 24.3874H35.9915L36.6087 22.7253H40.4079L40.7615 24.3874H43.5ZM38.9952 16.0756L39.8776 20.3627H37.4042L38.9952 16.0756Z" fill="#172B85"/>
                  </svg>
                </i>
                <i class="apple_pay">
                  <svg width="53" height="36" viewBox="0 0 53 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.3701 12.5147C13.9294 13.0426 13.2244 13.4589 12.5193 13.3994C12.4312 12.6857 12.7764 11.9274 13.1803 11.459C13.621 10.9163 14.3921 10.5297 15.0164 10.5C15.0899 11.2434 14.8034 11.972 14.3701 12.5147ZM15.009 13.5407C14.3879 13.5045 13.8211 13.7298 13.3633 13.9117C13.0687 14.0288 12.8192 14.128 12.6294 14.128C12.4164 14.128 12.1567 14.0235 11.865 13.9063C11.4828 13.7526 11.0459 13.5769 10.5877 13.5853C9.53743 13.6002 8.56063 14.2024 8.02449 15.1614C6.92283 17.0795 7.73806 19.9194 8.80299 21.4807C9.32445 22.2539 9.94872 23.1014 10.7713 23.0716C11.1332 23.0578 11.3935 22.946 11.6629 22.8303C11.973 22.6971 12.2952 22.5587 12.7983 22.5587C13.284 22.5587 13.5921 22.6935 13.8879 22.8229C14.1691 22.9459 14.4392 23.064 14.8401 23.0568C15.692 23.0419 16.2282 22.2836 16.7496 21.5104C17.3123 20.6806 17.5596 19.8707 17.5972 19.7478L17.6016 19.7336C17.6007 19.7327 17.5937 19.7295 17.5815 19.7238L17.5815 19.7238C17.3933 19.6366 15.9555 18.9703 15.9417 17.1836C15.9279 15.6839 17.0822 14.924 17.2639 14.8044L17.2639 14.8044L17.2639 14.8044C17.275 14.7971 17.2824 14.7922 17.2858 14.7897C16.5513 13.6894 15.4056 13.5704 15.009 13.5407ZM20.9066 22.975V11.3847H25.2031C27.4211 11.3847 28.9708 12.9311 28.9708 15.1911C28.9708 17.4512 27.3917 19.0124 25.1443 19.0124H22.684V22.975H20.9066ZM22.6838 12.9013H24.7329C26.2752 12.9013 27.1565 13.734 27.1565 15.1986C27.1565 16.6632 26.2752 17.5032 24.7255 17.5032H22.6838V12.9013ZM34.839 21.5848C34.369 22.4918 33.3334 23.0642 32.217 23.0642C30.5646 23.0642 29.4115 22.068 29.4115 20.5662C29.4115 19.0794 30.5278 18.2244 32.5916 18.098L34.8096 17.9642V17.3248C34.8096 16.3806 34.2 15.8677 33.1131 15.8677C32.217 15.8677 31.5634 16.336 31.4312 17.0497H29.8301C29.8815 15.548 31.277 14.4551 33.1645 14.4551C35.1989 14.4551 36.5209 15.5331 36.5209 17.2059V22.975H34.8757V21.5848H34.839ZM32.6943 21.6888C31.7469 21.6888 31.1447 21.2279 31.1447 20.5216C31.1447 19.7931 31.7249 19.3693 32.8339 19.3024L34.8095 19.176V19.8302C34.8095 20.9157 33.8988 21.6888 32.6943 21.6888ZM41.9777 23.4285C41.2653 25.4581 40.45 26.1272 38.7168 26.1272C38.5846 26.1272 38.1439 26.1123 38.0411 26.0826V24.6924C38.1512 24.7072 38.423 24.7221 38.5625 24.7221C39.3484 24.7221 39.789 24.3876 40.0608 23.5177L40.2224 23.0047L37.2112 14.5667H39.0693L41.1624 21.4138H41.1992L43.2923 14.5667H45.099L41.9777 23.4285Z" fill="#1E1E1E"/>
                  </svg>
                </i>
                <i class="google_pay">
                  <svg width="53" height="36" viewBox="0 0 53 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path d="M41.2451 21.4789H41.2715L43.4609 15.9838H44.999L40.2695 27.0004H38.8096L40.5684 23.1469L37.4639 15.9838H39.0029L41.2451 21.4789ZM33.8418 15.7338C34.8881 15.7338 35.7146 16.0195 36.3213 16.5815C36.9279 17.1434 37.2266 17.9283 37.2266 18.9184V23.6371H35.873V22.5756H35.8115C35.2225 23.4497 34.4486 23.8871 33.4727 23.8871C32.6462 23.8871 31.9426 23.6367 31.3887 23.1371C30.8437 22.6733 30.5361 21.9865 30.5537 21.2641C30.5538 20.4704 30.8525 19.8462 31.4414 19.3735C32.0305 18.9007 32.8219 18.6684 33.8066 18.6684C34.6507 18.6684 35.3367 18.829 35.8818 19.1322V18.8022C35.8818 18.3117 35.6708 17.8478 35.3018 17.5268C34.9237 17.1878 34.4396 17.0004 33.9385 17.0004C33.1472 17.0004 32.5226 17.3392 32.0654 18.017L30.8174 17.2231C31.4856 16.2332 32.4968 15.7338 33.8418 15.7338ZM27.1328 12.4516C28.0383 12.4337 28.9178 12.7812 29.5596 13.4233C30.8433 14.6364 30.9223 16.6794 29.7178 17.9906L29.5596 18.1508C28.9001 18.7841 28.0912 19.1059 27.1328 19.1059H24.7949V23.6371H23.3789V12.4516H27.1328ZM34.0273 19.8285C33.4558 19.8285 32.9719 19.971 32.585 20.2475C32.2068 20.524 32.0137 20.8722 32.0137 21.2914C32.0138 21.666 32.1894 22.0139 32.4795 22.2279C32.7959 22.4775 33.1826 22.6108 33.5781 22.602C34.1761 22.602 34.7478 22.3612 35.1699 21.933C35.6358 21.4871 35.8739 20.9613 35.874 20.3549C35.4344 19.9982 34.8186 19.8197 34.0273 19.8285ZM24.7949 17.7319H27.1689C27.6966 17.7497 28.2068 17.5353 28.5674 17.1518C29.3057 16.3758 29.2881 15.1276 28.5234 14.3783C28.1629 14.0215 27.679 13.8246 27.1689 13.8246H24.7949V17.7319Z" fill="#3C4043"/>
                    <path d="M19.9075 18.1245C19.9075 17.6874 19.8724 17.2503 19.802 16.8221H13.832V19.293H17.2522C17.1116 20.0869 16.6544 20.8005 15.9862 21.2465V22.8522H18.026C19.2217 21.7371 19.9075 20.0869 19.9075 18.1245Z" fill="#4285F4"/>
                    <path d="M13.8332 24.4042C15.5389 24.4042 16.9808 23.8333 18.0271 22.8521L15.9873 21.2465C15.4158 21.639 14.686 21.862 13.8332 21.862C12.1802 21.862 10.7822 20.7291 10.2811 19.2127H8.17969V20.8719C9.25235 23.0394 11.4416 24.4042 13.8332 24.4042Z" fill="#34A853"/>
                    <path d="M10.281 19.2127C10.0172 18.4188 10.0172 17.5536 10.281 16.7508V15.1005H8.17932C7.27356 16.9113 7.27356 19.0521 8.17932 20.8629L10.281 19.2127Z" fill="#FBBC04"/>
                    <path d="M13.8332 14.1015C14.7388 14.0836 15.6092 14.4315 16.2598 15.0648L18.0711 13.2273C16.9193 12.139 15.407 11.5414 13.8332 11.5592C11.4416 11.5592 9.25235 12.9329 8.17969 15.1005L10.2811 16.7597C10.7822 15.2343 12.1802 14.1015 13.8332 14.1015Z" fill="#EA4335"/>
                  </svg>
                </i>
                <i class="privat_bank">
                  <svg width="53" height="36" viewBox="0 0 53 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 0.5H34.5C44.165 0.5 52 8.33502 52 18C52 27.665 44.165 35.5 34.5 35.5H18C8.33502 35.5 0.5 27.665 0.5 18C0.5 8.33502 8.33502 0.5 18 0.5Z" stroke="#F3F2F2"/>
                    <path d="M15.5 28.9975H24.098V20.3955H15.5V28.9975Z" fill="#373435"/>
                    <path d="M32.9534 11.5475C32.9534 14.4725 32.9534 21.527 32.9534 24.452C32.1368 24.452 31.9929 24.452 31.1994 24.452C30.442 18.07 26.4338 14.0611 20.0537 13.3034C20.0537 12.5095 20.0537 12.3661 20.0537 11.5475C22.9777 11.5475 30.0295 11.5475 32.9534 11.5475ZM15.5078 7V17.7067H17.7815C23.7646 17.7067 26.7984 20.7413 26.7984 26.7253V29H37.4993V7H15.5078Z" fill="#60B238"/>
                  </svg>
                </i>
              </div>
            </div>


            <div class="text-muted small mt-1">
               Проведіть платіж безпосередньо на наш банківський рахунок. Будь ласка, вкажіть номер Вашого замовлення в описі переказу. Ваше замовлення не буде виконано, доки кошти не будуть зараховані на наш рахунок.
            </div>
          </div>
          <div class="form-check p-3 rounded-3">
            <input class="form-check-input" type="radio" name="payment_method" value="cod" id="cashOnDelivery">
            <label class="form-check-label" for="cashOnDelivery">
               Оплата при отриманні
            </label>
            <div class="text-muted small mt-1">Накладений платіж + 20₴ (згідно з тарифами перевізника)</div>
          </div>
          <div class="form-text mt-3">
            Ваші особисті дані будуть використані для обробки вашого замовлення, підтримки вашого досвіду на цьому веб-сайті та інших цілях, описаних у нашому privacy policy.
          </div>
        </div>
      </div>

      <!-- Коментар до замовлення -->
      <div class="card checkout-card mb-4">
        <div class="card-header-custom">
           Коментар до замовлення
        </div>
        <div class="leve_comment">
          Залишити коментар
        </div>
        <div class="card-body p-4 pt-0">
          <textarea class="form-control" name="comment" rows="3" placeholder="Залишити коментар (додаткові побажання, зручний час доставки тощо)"></textarea>
        </div>
      </div>
    </div>

    <!-- Права колонка: Деталі замовлення, подарунки, підсумки -->
    <div class="col-lg-5">
      <div class="card checkout-card mb-4 sticky-lg-top" style="top: 20px;">
        <div class="card-header-custom pb-0">
           Деталі замовлення
        </div>
        <div class="card-body p-4">
          <!-- Список товарів (динамічні quantity) -->
          <div id="order-items-container" class="cartItemsList">
            <!-- Товар 1 -->
            <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
              <img src="{{ asset('images/image.png') }}" alt="Пеловіт" class="product-img">
              <div class="flex-grow-1">
                <h6>Пеловіт-Р Класичний 500мл</h6>
                <div class="d-flex align-items-center gap-2 mt-2 rad-12 count_rates">
                  <button class="btn btn-sm ">-</button>
                  <span class="mx-2">1</span>
                  <button class="btn btn-sm ">+</button>
                </div>
              </div>
              <div class="text-end d-flex flex-column">
                <button class="btn btn-link text-danger">
                  <i class="cross" data-bs-toggle="modal" data-bs-target="#infoModal">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </i>
                </button>
                <div class="fw-medium">690₴</div>
              </div>
            </div>
            <!-- Товар 2 (аналогічний) -->
            <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
              <img src="{{ asset('images/image.png') }}" alt="Пеловіт" class="product-img">
              <div class="flex-grow-1">
                <h6>Пеловіт-Р Класичний 500мл</h6>
                <div class="d-flex align-items-center gap-2 mt-2 rad-12 count_rates">
                  <button class="btn btn-sm ">-</button>
                  <span class="mx-2">1</span>
                  <button class="btn btn-sm ">+</button>
                </div>
              </div>
              <div class="text-end d-flex flex-column">
                <button class="btn btn-link text-danger">
                  <i class="cross" data-bs-toggle="modal" data-bs-target="#infoModal">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </i>
                </button>
                <div class="fw-medium">690₴</div>
              </div>
            </div>
            <!-- Товар 3 (ціна 600₴) -->
            <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
              <img src="{{ asset('images/image.png') }}" alt="Пеловіт" class="product-img">
              <div class="flex-grow-1">
                <h6>Пеловіт-Р Класичний 500мл</h6>
                <div class="d-flex align-items-center gap-2 mt-2 rad-12 count_rates">
                  <button class="btn btn-sm ">-</button>
                  <span class="mx-2">1</span>
                  <button class="btn btn-sm ">+</button>
                </div>
              </div>
              <div class="text-end d-flex flex-column">
                <button class="btn btn-link text-danger">
                  <i class="cross" data-bs-toggle="modal" data-bs-target="#infoModal">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </i>
                </button>
                <div class="fw-medium">690₴</div>
              </div>
            </div>
          </div>

          <!-- Ваші подарунки -->
          <div class="mt-4 pt-2">
            <div class="d-flex justify-content-between align-items-center pb-2">
              <div>
                <span class="fw-semibold">Ваші подарунки</span>
              </div>
            </div>
            <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
              <img src="{{ asset('images/image.png') }}" alt="Пеловіт" class="product-img">
              <div class="flex-grow-1">
                <h6>Пеловіт-Р Класичний 500мл</h6>
              </div>
              <div class="text-end d-flex flex-column">
                <button class="btn btn-link text-danger">
                  <i class="cross" data-bs-toggle="modal" data-bs-target="#infoModal">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </i>
                </button>
                <div class="fw-medium">690₴</div>
              </div>
            </div>

          <!-- Промокод + знижка -->
          <div class="mt-4 promocode_block pb-3">
            <label class="form-label"> Промокод</label>
            <div class="input-group">
              <input type="text" class="form-control" id="promoInput" placeholder="Введіть промокод">
              <button class="btn actualize" type="button" id="applyPromoBtn">Застосувати</button>
            </div>
            <div class="mt-3 text-gr">
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Знижка</span>
                  <span>0₴</span>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-semibold">Сума</span>
                <span id="order-subtotal-display">0₴</span>
              </div>
            </div>
          </div>

          <!-- Підсумок суми -->
            <div class="d-flex justify-content-between align-items-center bottom_sum  pt-3">
              <span class="fw-semibold">Сума замовлення</span>
              <span id="order-total-display">0₴</span>
            </div>
          </div>

          <!-- Згода + підтвердження -->
          <div class="form-check mt-3 mb-3">
            <input class="form-check-input" type="checkbox" id="agreeCheckbox">
            <label class="form-check-label small" for="agreeCheckbox">
              Погоджуюсь на обробку персональних данних
            </label>
          </div>
          <button type="submit" class="btn btn-checkout-primary w-100 text-white" id="confirmOrderBtn">
            Підтвердити замовлення
          </button>
          <div class="text-center mt-3">
            <span class="bonus-note">Після оформлення замовлення на ваш аккаунт буде нараховано 30 бонусів</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</section>
@endsection
