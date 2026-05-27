@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')

    <section class="cart-section">
  <div class="container">

    <h1 class="mb-4">Кошик</h1>

    <!-- Progress -->
      <div class="d-flex align-items-center gap-3 flex-grow-1">
<!--        <div class="step-circle active">1</div>-->
<!--        <div class="step-circle " >2</div>-->
<!--        <div class="step-circle">3</div>-->
<!--      </div>-->
      </div>

    <div class="row g-5">

      <!-- Left - Cart Items -->
      <div class="col-lg-7">
        <!-- Progress -->
        <div class="d-flex align-items-center flex-grow-1 progress_bar_box">
          <div class="step-circle active">1</div>
          <div class="progress_bar"></div>
          <div class="step-circle " >2</div>
          <div class="progress_bar"></div>
          <div class="step-circle">3</div>
        </div>

        <div class="reg_inloyal d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
          <p class="mb-3">
            Додайте ще один товар та зареєструйтесь в нашій програмі лояльності, щоб обрати подарунок
          </p>
          <button class="btn btn-brown px-4 mb-4 rad-16"  data-bs-toggle="modal" data-bs-target="#loyaltyGiftModal">Зареєструватись</button>
        </div>


        <!-- Cart Items -->
        <div class="cart_wrapper gap-2 d-flex flex-column">
          <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
            <img src="{{ Vite::asset('resources/images/image.png') }}" alt="Пеловіт" class="product-img">
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

          <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
            <img src="{{ Vite::asset('resources/images/image.png') }}" alt="Пеловіт" class="product-img">
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

        <!-- Акційні товари -->
        <h5 class="mt-5 mb-3">Акційні товари</h5>

        <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
          <img src="{{ Vite::asset('resources/images/image.png') }}" alt="Пеловіт" class="product-img">
          <div class="flex-grow-1">
            <h6>Пеловіт-Р Класичний 500мл</h6>
            <div class="fw-medium">690₴</div>
          </div>

          <div class="btn like_box rad-8 ">
            <i class="like">
              <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="path-1-inside-1_2297_4519" fill="white">
                  <path d="M16.513 8.58341L9.013 16.0114L1.513 8.58341C1.0183 8.10202 0.628639 7.52342 0.368544 6.88404C0.10845 6.24466 -0.016442 5.55836 0.00173387 4.86834C0.0199097 4.17832 0.180759 3.49954 0.474154 2.87474C0.767548 2.24994 1.18713 1.69266 1.70648 1.23799C2.22583 0.783313 2.8337 0.441096 3.49181 0.232888C4.14991 0.0246802 4.844 -0.0450088 5.53036 0.0282087C6.21673 0.101426 6.8805 0.315964 7.47987 0.658314C8.07925 1.00066 8.60124 1.46341 9.013 2.01741C9.42653 1.46743 9.94913 1.00873 10.5481 0.670012C11.1471 0.331296 11.8095 0.119857 12.4939 0.0489273C13.1784 -0.0220022 13.8701 0.0491053 14.5258 0.257799C15.1815 0.466493 15.787 0.80828 16.3045 1.26177C16.8221 1.71526 17.2404 2.27069 17.5334 2.8933C17.8264 3.51591 17.9877 4.19229 18.0073 4.88012C18.0269 5.56794 17.9043 6.2524 17.6471 6.89066C17.39 7.52891 17.0039 8.10723 16.513 8.58941"/>
                </mask>
                <path d="M17.5685 9.64917C18.1571 9.06622 18.1617 8.11648 17.5788 7.52787C16.9958 6.93927 16.0461 6.93469 15.4575 7.51764L16.513 8.58341L17.5685 9.64917ZM9.013 16.0114L7.95746 17.0772C8.54206 17.6562 9.48393 17.6562 10.0685 17.0772L9.013 16.0114ZM1.513 8.58341L2.56857 7.5176L2.5591 7.50838L1.513 8.58341ZM9.013 2.01741L7.8091 2.91218C8.09123 3.29178 8.53586 3.51608 9.00882 3.5174C9.48178 3.51872 9.92766 3.29689 10.2119 2.91887L9.013 2.01741ZM15.4619 7.51927C14.8709 8.09978 14.8624 9.04949 15.4429 9.64051C16.0234 10.2315 16.9731 10.24 17.5641 9.65954L16.513 8.58941L15.4619 7.51927ZM16.513 8.58341L15.4575 7.51764L7.95746 14.9456L9.013 16.0114L10.0685 17.0772L17.5685 9.64917L16.513 8.58341ZM9.013 16.0114L10.0685 14.9456L2.56853 7.51764L1.513 8.58341L0.457464 9.64917L7.95746 17.0772L9.013 16.0114ZM1.513 8.58341L2.5591 7.50838C2.21281 7.17141 1.94005 6.76639 1.75798 6.31883L0.368544 6.88404L-1.02089 7.44926C-0.682769 8.28045 -0.176207 9.03263 0.466895 9.65843L1.513 8.58341ZM0.368544 6.88404L1.75798 6.31883C1.57591 5.87126 1.48849 5.39085 1.50121 4.90784L0.00173387 4.86834L-1.49775 4.82884C-1.52137 5.72586 -1.35902 6.61806 -1.02089 7.44926L0.368544 6.88404ZM0.00173387 4.86834L1.50121 4.90784C1.51394 4.42483 1.62653 3.94968 1.83191 3.51232L0.474154 2.87474L-0.8836 2.23717C-1.26501 3.04941 -1.47412 3.93182 -1.49775 4.82884L0.00173387 4.86834ZM0.474154 2.87474L1.83191 3.51232C2.03728 3.07496 2.33099 2.68486 2.69454 2.36659L1.70648 1.23799L0.718428 0.109383C0.0432712 0.70046 -0.502187 1.42493 -0.8836 2.23717L0.474154 2.87474ZM1.70648 1.23799L2.69454 2.36659C3.05808 2.04832 3.48359 1.80877 3.94427 1.66302L3.49181 0.232888L3.03935 -1.19725C2.18381 -0.926575 1.39358 -0.481694 0.718428 0.109383L1.70648 1.23799ZM3.49181 0.232888L3.94427 1.66302C4.40494 1.51728 4.8908 1.46849 5.37126 1.51975L5.53036 0.0282087L5.68947 -1.46333C4.7972 -1.55851 3.89489 -1.46792 3.03935 -1.19725L3.49181 0.232888ZM5.53036 0.0282087L5.37126 1.51975C5.85171 1.571 6.31635 1.72118 6.73591 1.96082L7.47987 0.658314L8.22383 -0.644192C7.44464 -1.08925 6.58174 -1.36815 5.68947 -1.46333L5.53036 0.0282087ZM7.47987 0.658314L6.73591 1.96082C7.15547 2.20046 7.52087 2.52438 7.8091 2.91218L9.013 2.01741L10.2169 1.12263C9.68162 0.402431 9.00302 -0.199137 8.22383 -0.644192L7.47987 0.658314ZM9.013 2.01741L10.2119 2.91887C10.5014 2.53389 10.8672 2.2128 11.2865 1.9757L10.5481 0.670012L9.80973 -0.635672C9.03107 -0.195341 8.35169 0.400971 7.8141 1.11594L9.013 2.01741ZM10.5481 0.670012L11.2865 1.9757C11.7057 1.7386 12.1694 1.59059 12.6485 1.54094L12.4939 0.0489273L12.3393 -1.44308C11.4495 -1.35087 10.5884 -1.076 9.80973 -0.635672L10.5481 0.670012ZM12.4939 0.0489273L12.6485 1.54094C13.1277 1.49129 13.6119 1.54106 14.0708 1.68715L14.5258 0.257799L14.9807 -1.17155C14.1283 -1.44285 13.2291 -1.53529 12.3393 -1.44308L12.4939 0.0489273ZM14.5258 0.257799L14.0708 1.68715C14.5298 1.83323 14.9537 2.07249 15.316 2.38993L16.3045 1.26177L17.2931 0.133614C16.6203 -0.455924 15.8331 -0.900248 14.9807 -1.17155L14.5258 0.257799ZM16.3045 1.26177L15.316 2.38993C15.6782 2.70737 15.9711 3.09617 16.1762 3.532L17.5334 2.8933L18.8906 2.2546C18.5098 1.44521 17.9659 0.723152 17.2931 0.133614L16.3045 1.26177ZM17.5334 2.8933L16.1762 3.532C16.3813 3.96782 16.4942 4.44129 16.5079 4.92277L18.0073 4.88012L19.5067 4.83746C19.4813 3.94329 19.2715 3.06399 18.8906 2.2546L17.5334 2.8933ZM18.0073 4.88012L16.5079 4.92277C16.5216 5.40425 16.4358 5.88337 16.2558 6.33015L17.6471 6.89066L19.0385 7.45117C19.3727 6.62143 19.5321 5.73163 19.5067 4.83746L18.0073 4.88012ZM17.6471 6.89066L16.2558 6.33015C16.0758 6.77693 15.8055 7.18175 15.4619 7.51927L16.513 8.58941L17.5641 9.65954C18.2023 9.03271 18.7042 8.2809 19.0385 7.45117L17.6471 6.89066Z" fill="#765655" mask="url(#path-1-inside-1_2297_4519)"/>
              </svg>

            </i>
          </div>
<!--          <button class="btn btn-sm btn-outline-light me-2">♡</button>-->


          <button class="btn buy rad-16 ">
            <span>Купити</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_472_16570)">
                <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
              <defs>
                <clipPath id="clip0_472_16570">
                  <rect width="24" height="24" fill="white"></rect>
                </clipPath>
              </defs>
            </svg>
          </button>
        </div>

        <!-- Repeat 3 more promotional items if needed -->
        <!-- You can duplicate the block above -->

      </div>

      <!-- Right - Summary -->
      <div class="col-lg-5">
        <div class="summary-box">
          <div class="d-flex justify-content-between mb-2 gray_cl">
            <span>Знижка</span>
            <span>0₴</span>
          </div>
          <div class="d-flex justify-content-between mb-3 gray_cl">
            <span>Сума</span>
            <span>300₴</span>
          </div>

          <div class="loyalty-box mb-4  box-gift">
            <div class="d-flex align-items-start gap-3">
              <span style="font-size: 2rem;">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 28V44H14C12.4087 44 10.8826 43.3679 9.75736 42.2427C8.63214 41.1174 8 39.5913 8 38V30C8 29.4696 8.21071 28.9609 8.58579 28.5858C8.96086 28.2107 9.46957 28 10 28H22ZM38 28C38.5304 28 39.0391 28.2107 39.4142 28.5858C39.7893 28.9609 40 29.4696 40 30V38C40 39.5913 39.3679 41.1174 38.2426 42.2427C37.1174 43.3679 35.5913 44 34 44H26V28H38ZM33 4.00001C34.181 3.99977 35.3429 4.29835 36.3775 4.86795C37.4121 5.43755 38.2858 6.25966 38.9171 7.25775C39.5485 8.25583 39.9171 9.39744 39.9886 10.5763C40.0601 11.7552 39.8322 12.9329 39.326 14H40C41.0609 14 42.0783 14.4214 42.8284 15.1716C43.5786 15.9217 44 16.9391 44 18V20C44 21.0609 43.5786 22.0783 42.8284 22.8284C42.0783 23.5786 41.0609 24 40 24H26V14H22V24H8C6.93913 24 5.92172 23.5786 5.17157 22.8284C4.42143 22.0783 4 21.0609 4 20V18C4 16.9391 4.42143 15.9217 5.17157 15.1716C5.92172 14.4214 6.93913 14 8 14H8.674C8.22888 13.0626 7.99861 12.0377 8 11C8 7.13401 11.134 4.00001 14.966 4.00001C18.476 3.94001 21.59 6.18401 23.728 9.86801L24 10.354C26.066 6.52601 29.12 4.12601 32.582 4.00401L33 4.00001ZM15 8.00001C14.2044 8.00001 13.4413 8.31608 12.8787 8.87869C12.3161 9.4413 12 10.2044 12 11C12 11.7957 12.3161 12.5587 12.8787 13.1213C13.4413 13.6839 14.2044 14 15 14H21.286C19.804 10.19 17.388 7.96001 15 8.00001ZM32.966 8.00001C30.606 7.96001 28.196 10.192 26.714 14H33C33.7957 13.9955 34.5569 13.6751 35.1163 13.1093C35.6758 12.5435 35.9875 11.7787 35.983 10.983C35.9785 10.1874 35.6581 9.42609 35.0923 8.86667C34.5265 8.30725 33.7617 7.99551 32.966 8.00001Z" fill="#69BDDB"/>
                </svg>

              </span>
              <div class="flex-grow-1">
                Зареєструйтесь в програмі лояльності,<br>
                щоб отримати 60 бонусів на рахунок
              </div>
            </div>
            <button class="btn btn-brown w-100 mt-3 rad-16">Зареєструватись</button>
          </div>

          <div class="d-flex justify-content-between mb-3 ">
            <span>Сума замовлення</span>
            <span><strong>300₴</strong></span>
          </div>

          <button class="btn btn-brown w-100 py-3 fs-5 mb-3 rad-16">
            Зробити замовлення
            <i>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_2264_6627)">
                <path d="M6.33032 8H17.6693C17.9577 7.99997 18.2426 8.06229 18.5047 8.1827C18.7667 8.30311 18.9996 8.47876 19.1874 8.6976C19.3752 8.91645 19.5134 9.17331 19.5926 9.45059C19.6718 9.72786 19.6901 10.019 19.6463 10.304L18.3913 18.456C18.2824 19.1644 17.9234 19.8105 17.3793 20.2771C16.8352 20.7438 16.1421 21.0002 15.4253 21H8.57332C7.85672 21 7.1638 20.7434 6.61995 20.2768C6.0761 19.8102 5.71724 19.1643 5.60832 18.456L4.35332 10.304C4.30949 10.019 4.32781 9.72786 4.40702 9.45059C4.48624 9.17331 4.62448 8.91645 4.81226 8.6976C5.00005 8.47876 5.23293 8.30311 5.49496 8.1827C5.75698 8.06229 6.04195 7.99997 6.33032 8Z" stroke="#FFFEFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FFFEFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
                <clipPath id="clip0_2264_6627">
                  <rect width="24" height="24" fill="white"/>
                </clipPath>
              </defs>
            </svg>

          </i>
          </button>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="instagram">
            <label class="form-check-label small gray_dr_cl"  for="instagram">
              Хочу підписатися на Instagram та залишити відгук, щоб отримати тревел-версію продукту (15 мл) у подарунок
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- МОДАЛЬНЕ ВІКНО: реєстрація + вибір подарунка -->
<div class="modal fade loyalty_modal" id="loyaltyGiftModal" tabindex="-1" aria-labelledby="loyaltyGiftModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="wrapper_header">
          <h1 class="lead text-center">Зареєструйтесь в нашій програмі лояльності та оберіть 1 із цих подарунків</h1>
        </div>


        <!-- Список подарунків (4 варіанти) -->
        <div class="row mt-4" id="giftList">
          <!-- Подарунок 1 -->
          <div class="col-md-6 col-lg-3  rad-16 card_mod">
            <div class="gift-option text-center h-100" data-gift-id="1">
              <img src="{{ Vite::asset('resources/images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Спрей від нежиті<br>Доктор Лоріс+</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.58374 17.5H7.14541C6.54824 17.5 5.97081 17.2862 5.5176 16.8973C5.06439 16.5085 4.76534 15.9702 4.67457 15.38L3.62874 8.58669C3.59221 8.34917 3.60748 8.10657 3.6735 7.87551C3.73951 7.64445 3.85471 7.43039 4.0112 7.24802C4.16768 7.06565 4.36176 6.91928 4.58011 6.81894C4.79846 6.7186 5.03593 6.66666 5.27624 6.66669H14.7254C14.9657 6.66666 15.2032 6.7186 15.4215 6.81894C15.6399 6.91928 15.834 7.06565 15.9905 7.24802C16.1469 7.43039 16.2621 7.64445 16.3282 7.87551C16.3942 8.10657 16.4094 8.34917 16.3729 8.58669L16.2754 9.22085" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M7.5 9.16667V5C7.5 4.33696 7.76339 3.70107 8.23223 3.23223C8.70107 2.76339 9.33696 2.5 10 2.5C10.663 2.5 11.2989 2.76339 11.7678 3.23223C12.2366 3.70107 12.5 4.33696 12.5 5V9.16667" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12.5 15C12.5 15.663 12.7634 16.2989 13.2322 16.7678C13.7011 17.2366 14.337 17.5 15 17.5C15.663 17.5 16.2989 17.2366 16.7678 16.7678C17.2366 16.2989 17.5 15.663 17.5 15C17.5 14.337 17.2366 13.7011 16.7678 13.2322C16.2989 12.7634 15.663 12.5 15 12.5C14.337 12.5 13.7011 12.7634 13.2322 13.2322C12.7634 13.7011 12.5 14.337 12.5 15Z" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16.834 16.8333L18.334 18.3333" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>
          <!-- Подарунок 2 -->
          <div class="col-md-6 col-lg-3  rad-16 card_mod">
            <div class="gift-option text-center h-100" data-gift-id="2">
              <img src="{{ Vite::asset('resources/images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Масло для тіла<br>Липолитик</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.58374 17.5H7.14541C6.54824 17.5 5.97081 17.2862 5.5176 16.8973C5.06439 16.5085 4.76534 15.9702 4.67457 15.38L3.62874 8.58669C3.59221 8.34917 3.60748 8.10657 3.6735 7.87551C3.73951 7.64445 3.85471 7.43039 4.0112 7.24802C4.16768 7.06565 4.36176 6.91928 4.58011 6.81894C4.79846 6.7186 5.03593 6.66666 5.27624 6.66669H14.7254C14.9657 6.66666 15.2032 6.7186 15.4215 6.81894C15.6399 6.91928 15.834 7.06565 15.9905 7.24802C16.1469 7.43039 16.2621 7.64445 16.3282 7.87551C16.3942 8.10657 16.4094 8.34917 16.3729 8.58669L16.2754 9.22085" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M7.5 9.16667V5C7.5 4.33696 7.76339 3.70107 8.23223 3.23223C8.70107 2.76339 9.33696 2.5 10 2.5C10.663 2.5 11.2989 2.76339 11.7678 3.23223C12.2366 3.70107 12.5 4.33696 12.5 5V9.16667" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12.5 15C12.5 15.663 12.7634 16.2989 13.2322 16.7678C13.7011 17.2366 14.337 17.5 15 17.5C15.663 17.5 16.2989 17.2366 16.7678 16.7678C17.2366 16.2989 17.5 15.663 17.5 15C17.5 14.337 17.2366 13.7011 16.7678 13.2322C16.2989 12.7634 15.663 12.5 15 12.5C14.337 12.5 13.7011 12.7634 13.2322 13.2322C12.7634 13.7011 12.5 14.337 12.5 15Z" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16.834 16.8333L18.334 18.3333" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>
          <!-- Подарунок 3 -->
          <div class="col-md-6 col-lg-3  rad-16 card_mod">
            <div class="gift-option text-center h-100" data-gift-id="3">
              <img src="{{ Vite::asset('resources/images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Скраб-бустер<br>для тіла</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.58374 17.5H7.14541C6.54824 17.5 5.97081 17.2862 5.5176 16.8973C5.06439 16.5085 4.76534 15.9702 4.67457 15.38L3.62874 8.58669C3.59221 8.34917 3.60748 8.10657 3.6735 7.87551C3.73951 7.64445 3.85471 7.43039 4.0112 7.24802C4.16768 7.06565 4.36176 6.91928 4.58011 6.81894C4.79846 6.7186 5.03593 6.66666 5.27624 6.66669H14.7254C14.9657 6.66666 15.2032 6.7186 15.4215 6.81894C15.6399 6.91928 15.834 7.06565 15.9905 7.24802C16.1469 7.43039 16.2621 7.64445 16.3282 7.87551C16.3942 8.10657 16.4094 8.34917 16.3729 8.58669L16.2754 9.22085" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M7.5 9.16667V5C7.5 4.33696 7.76339 3.70107 8.23223 3.23223C8.70107 2.76339 9.33696 2.5 10 2.5C10.663 2.5 11.2989 2.76339 11.7678 3.23223C12.2366 3.70107 12.5 4.33696 12.5 5V9.16667" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12.5 15C12.5 15.663 12.7634 16.2989 13.2322 16.7678C13.7011 17.2366 14.337 17.5 15 17.5C15.663 17.5 16.2989 17.2366 16.7678 16.7678C17.2366 16.2989 17.5 15.663 17.5 15C17.5 14.337 17.2366 13.7011 16.7678 13.2322C16.2989 12.7634 15.663 12.5 15 12.5C14.337 12.5 13.7011 12.7634 13.2322 13.2322C12.7634 13.7011 12.5 14.337 12.5 15Z" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16.834 16.8333L18.334 18.3333" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>
          <!-- Подарунок 4 -->
          <div class="col-md-6 col-lg-3  rad-16 card_mod">
            <div class="gift-option text-center h-100" data-gift-id="4">
              <img src="{{ Vite::asset('resources/images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Лікувальний<br>ополіскувач</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.58374 17.5H7.14541C6.54824 17.5 5.97081 17.2862 5.5176 16.8973C5.06439 16.5085 4.76534 15.9702 4.67457 15.38L3.62874 8.58669C3.59221 8.34917 3.60748 8.10657 3.6735 7.87551C3.73951 7.64445 3.85471 7.43039 4.0112 7.24802C4.16768 7.06565 4.36176 6.91928 4.58011 6.81894C4.79846 6.7186 5.03593 6.66666 5.27624 6.66669H14.7254C14.9657 6.66666 15.2032 6.7186 15.4215 6.81894C15.6399 6.91928 15.834 7.06565 15.9905 7.24802C16.1469 7.43039 16.2621 7.64445 16.3282 7.87551C16.3942 8.10657 16.4094 8.34917 16.3729 8.58669L16.2754 9.22085" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M7.5 9.16667V5C7.5 4.33696 7.76339 3.70107 8.23223 3.23223C8.70107 2.76339 9.33696 2.5 10 2.5C10.663 2.5 11.2989 2.76339 11.7678 3.23223C12.2366 3.70107 12.5 4.33696 12.5 5V9.16667" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12.5 15C12.5 15.663 12.7634 16.2989 13.2322 16.7678C13.7011 17.2366 14.337 17.5 15 17.5C15.663 17.5 16.2989 17.2366 16.7678 16.7678C17.2366 16.2989 17.5 15.663 17.5 15C17.5 14.337 17.2366 13.7011 16.7678 13.2322C16.2989 12.7634 15.663 12.5 15 12.5C14.337 12.5 13.7011 12.7634 13.2322 13.2322C12.7634 13.7011 12.5 14.337 12.5 15Z" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16.834 16.8333L18.334 18.3333" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <button class="border-0 mt-3  w-100 text-center btn-register">
        Зареєструватись
      </button>
    </div>
  </div>
</div>


<div class="modal fade delete_item_modal" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content p-4-0 align-items-center rad-16">
      <div class="modal-header border-0 pb-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <img src="{{ Vite::asset('resources/images/image.png') }}" alt="Скраб-бустер для тіла" class="img-fluid mb-2 rad-16">

      <p class="mb-2">Скраб-бустер для тіла</p>
      <h4 id="infoModalLabel" class="mb-4 text-center">Ви справді хочете видалити продукт з кошика?</h4>

      <div class="d-flex gap-2">
        <button type="button" class="btn btn_cancel" data-bs-dismiss="modal">
          Скасувати
        </button>
        <button type="button" class="btn btn_delete" id="confirmDeleteBtn">
          Видалити
        </button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#infoModal').modal('show');
        let selectedGiftId = null;

        // Вибір подарунка
        $('.gift-option').on('click', function(e) {
            if ($(e.target).closest('.gift-detail-link').length) {
                e.preventDefault();
                alert('Тут буде детальний опис подарунка. Ви можете обрати його, натиснувши на всю картку.');
                return;
            }

            $('.gift-option').removeClass('selected');
            $(this).addClass('selected');
            selectedGiftId = $(this).data('gift-id');
        });


        // Скидання при закритті
        $('#loyaltyGiftModal').on('hidden.bs.modal', function() {
            $('.gift-option').removeClass('selected');
            selectedGiftId = null;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
