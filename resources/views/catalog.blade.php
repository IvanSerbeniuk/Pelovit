@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')

    <!--Categories-->
<section class="category-section py-5 restrict--card-heigh">
  <div class="container">
    <div class="row cards">
      <div class="cat_card">
        <div class="category-card ">
          <img src="{{ Vite::asset('resources/images/tranc.png') }}" class="rounded-4 w-100" alt="">
          <p class="mt-3 fw-medium cat_name">Лікувальні препарати</p>
        </div>
      </div>
      <div class="cat_card">
        <div class="category-card ">
          <img src="{{ Vite::asset('resources/images/face_washing.png') }}" class="rounded-4 w-100" alt="">
          <p class="mt-3 fw-medium cat_name">Доглядова косметика</p>
        </div>
      </div>
      <div class="cat_card">
        <div class="category-card ">
          <img src="{{ Vite::asset('resources/images/catname3.png') }}" class="rounded-4 w-100" alt="">
          <p class="mt-3 fw-medium cat_name">Комплекси</p>
        </div>
      </div>
      <div class="cat_card">
        <div class="category-card ">
          <img src="{{ Vite::asset('resources/images/catname4.png') }}" class="rounded-4 w-100" alt="">
          <p class="mt-3 fw-medium cat_name">PRO серія Майстер</p>
        </div>
      </div>
      <div class="cat_card">
        <div class="category-card ">
          <img src="{{ Vite::asset('resources/images/catname5.png') }}" class="rounded-4 w-100" alt="">
          <p class="mt-3 fw-medium cat_name">Парфумована лінійка ART17</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ====================== SIDE FILTERS OFFCANVAS ====================== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="filterOffcanvasLabel">Фільтри</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">

<!--    <div class="mb-4">-->
<!--      <h6>Ціна</h6>-->
<!--      <div class="d-flex gap-2">-->
<!--        <input type="number" class="form-control" placeholder="від">-->
<!--        <input type="number" class="form-control" placeholder="до">-->
<!--      </div>-->
<!--    </div>-->

    <div class="mb-4">
      <h6>Зони догляду</h6>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="face">
        <label class="form-check-label" for="face">Обличчя</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="skin_around_eyes">
        <label class="form-check-label" for="skin_around_eyes">Шкіра навколо очей</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="body">
        <label class="form-check-label" for="body">Тіло</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="nails_feet">
        <label class="form-check-label" for="nails_feet">Нігті та стопи</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="joins_muscles">
        <label class="form-check-label" for="joins_muscles">Сустави та м’язи</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="hair_headskin">
        <label class="form-check-label" for="hair_headskin">Волосся та шкіра голови</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="throat_lor">
        <label class="form-check-label" for="throat_lor">Горло та ЛОР-зона</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="digest_system">
        <label class="form-check-label" for="digest_system">Травна система</label>
      </div>
    </div>

<!--    <div class="mb-4">-->
<!--      <h6>Бренд</h6>-->
<!--      <div class="form-check">-->
<!--        <input class="form-check-input" type="checkbox" id="brand1">-->
<!--        <label class="form-check-label" for="brand1">FELORIT-4</label>-->
<!--      </div>-->
<!--      <div class="form-check">-->
<!--        <input class="form-check-input" type="checkbox" id="brand2">-->
<!--        <label class="form-check-label" for="brand2">ART17</label>-->
<!--      </div>-->
<!--    </div>-->

    <div class="mb-4">
      <h6>Проблематики</h6>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="dry_skin">
        <label class="form-check-label" for="dry_skin">Сухість шкіри</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="youth_restore">
        <label class="form-check-label" for="youth_restore">Омолодження та ліфтинг</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="pigment">
        <label class="form-check-label" for="pigment">Пігментація шкіри</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="cellulite">
        <label class="form-check-label" for="cellulite">Целюліт</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="problems_joints">
        <label class="form-check-label" for="problems_joints">Проблеми з суглобами</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="lor_decease">
        <label class="form-check-label" for="lor_decease">ЛОР-захворювання</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="problems_hails_feet">
        <label class="form-check-label" for="problems_hails_feet">Проблеми з нігтями та стопами</label>
      </div>
    </div>

    <div class="mb-4">
      <h6>Тип шкіри</h6>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="dry">
        <label class="form-check-label" for="dry">Суха</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="normal">
        <label class="form-check-label" for="normal">Нормальна</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="fat">
        <label class="form-check-label" for="fat">Жирна</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="combined">
        <label class="form-check-label" for="combined">Комбінована</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="sensitive">
        <label class="form-check-label" for="sensitive">Чутлива</label>
      </div>
    </div>
    <div class="mb-4">
      <h6>Вік</h6>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="18–24">
        <label class="form-check-label" for="18–24">18–24</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="25–34">
        <label class="form-check-label" for="25–34">25–34</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="45–54">
        <label class="form-check-label" for="45–54">45–54</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="55">
        <label class="form-check-label" for="55">55+
          10</label>
      </div>
    </div>

<!--    <div class="mb-4">-->
<!--      <h6>Категорія</h6>-->
<!--      <select class="form-select">-->
<!--        <option>all</option>-->
<!--        <option>Доглядова косметика</option>-->
<!--        <option>Лікувальні препарати</option>-->
<!--        <option>PRO серія</option>-->
<!--      </select>-->
<!--    </div>-->

  </div>

  <div class="offcanvas-footer p-3 border-top">
    <button class="btn btn-dark w-100 mb-2">Застосувати фільтри</button>
    <button class="btn btn-outline-secondary w-100">Скинути</button>
  </div>
</div>
<!-- ====================== SIDE FILTERS OFFCANVAS ====================== -->
<!-- Всі товари -->
<section class="py-5 bg-light all_categories">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Каталог</h2>
      <div class="filters"
           data-bs-toggle="offcanvas"
           data-bs-target="#filterOffcanvas">
        <div class="content">
          Фільтри
        </div>
        <i class="icon_filter">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_615_16510)">
              <path d="M4 4H10V10H4V4Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14 4H20V10H14V4Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M4 14H10V20H4V14Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14 17C14 17.7956 14.3161 18.5587 14.8787 19.1213C15.4413 19.6839 16.2044 20 17 20C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17C20 16.2044 19.6839 15.4413 19.1213 14.8787C18.5587 14.3161 17.7956 14 17 14C16.2044 14 15.4413 14.3161 14.8787 14.8787C14.3161 15.4413 14 16.2044 14 17Z" stroke="#1A1A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
              <clipPath id="clip0_615_16510">
                <rect width="24" height="24" fill="white"/>
              </clipPath>
            </defs>
          </svg>

        </i>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Product cards same as above -->
    </div>
  </div>
</section>

<!-- Нещодавно переглянуті/Рекомендації -->
<section class="py-5 bg-light all_categories">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4" style="width: 100%; justify-content: center !important;">
      <div class="tabs">
        <button class="tab ">Нещодавно переглянуті</button>
        <button class="tab active">Рекомендації</button>
      </div>
      <!--      <a href="#" class="view-all">Переглянути більше</a>-->
    </div>
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          <div class="tag_brown">Обличчя</div>
          <div class="like">
            <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <img src="{{ Vite::asset('resources/images/e3f68f8396e0adf377793609b6f0d28b9c9a4d04.png') }}" class="card-img-top" alt="Product">
          <div class="card-body">
            <h6 class="card-title">Pelovit-R Класичний 500ml</h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                <h4 class="price">6908₴</h4>
                <div class="disc_price">400₴</div>
              </div>
              <button class="btn buy rad-12 ">
                <span>Купити</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_472_16570)">
                    <path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_472_16570">
                      <rect width="24" height="24" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Product cards same as above -->
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
