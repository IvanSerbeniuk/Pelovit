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
        <div id="dynamic-cart-items" class="cart_wrapper gap-2 d-flex flex-column"></div>
        <p id="cart-empty-msg" class="text-muted d-none">Ваш кошик порожній.</p>

        <!-- Акційні товари -->
        @if($featured->isNotEmpty())
        <h5 class="mt-5 mb-3">Акційні товари</h5>

        <div class="d-flex flex-column gap-2">
          @foreach($featured as $product)
          <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
            <a href="{{ route('product', $product->slug) }}">
              <img src="{{ $product->image ? asset($product->image) : asset('images/image.png') }}"
                   alt="{{ e($product->name) }}" class="product-img">
            </a>
            <div class="flex-grow-1">
              <h6><a href="{{ route('product', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a></h6>
              <div class="fw-medium">{{ number_format($product->price, 0, '.', '') }}₴</div>
            </div>

            <button class="btn buy rad-16 catalog-add-btn"
              data-id="{{ $product->id }}"
              data-name="{{ e($product->name) }}"
              data-price="{{ $product->price }}"
              data-image="{{ $product->image }}"
              data-slug="{{ $product->slug }}">
              <span>Купити</span>
              <x-icons.cart color="#FAF7F3" />
            </button>
          </div>
          @endforeach
        </div>
        @endif

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
            <span id="cart-subtotal">0₴</span>
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
            <span><strong id="cart-total">0₴</strong></span>
          </div>

          <a href="{{ url('/order') }}" class="btn btn-brown w-100 py-3 fs-5 mb-3 rad-16" style="display:flex;align-items:center;justify-content:center;gap:.5rem;">Зробити замовлення</a>
          <button class="btn btn-brown w-100 py-3 fs-5 mb-3 rad-16" style="display:none!important;">
            Зробити замовлення
            <i><x-icons.cart color="#FFFEFC" /></i>
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
              <img src="{{ asset('images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Спрей від нежиті<br>Доктор Лоріс+</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <x-icons.cart-search />
              </button>
            </div>
          </div>
          <!-- Подарунок 2 -->
          <div class="col-md-6 col-lg-3  rad-16 card_mod">
            <div class="gift-option text-center h-100" data-gift-id="2">
              <img src="{{ asset('images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Масло для тіла<br>Липолитик</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <x-icons.cart-search />
              </button>
            </div>
          </div>
          <!-- Подарунок 3 -->
          <div class="col-md-6 col-lg-3  rad-16 card_mod">
            <div class="gift-option text-center h-100" data-gift-id="3">
              <img src="{{ asset('images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Скраб-бустер<br>для тіла</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <x-icons.cart-search />
              </button>
            </div>
          </div>
          <!-- Подарунок 4 -->
          <div class="col-md-6 col-lg-3  rad-16 card_mod">
            <div class="gift-option text-center h-100" data-gift-id="4">
              <img src="{{ asset('images/image.png') }}" alt="" class="img-fluid card_img">
              <div class="gift-name">15 мл<br>Лікувальний<br>ополіскувач</div>
              <button class="btn buy rad-12 ">
                <span>Дедальніше</span>
                <x-icons.cart-search />
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

      <img src="{{ asset('images/image.png') }}" alt="Скраб-бустер для тіла" class="img-fluid mb-2 rad-16">

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
    document.addEventListener('DOMContentLoaded', function() {
        let selectedGiftId = null;

        document.querySelectorAll('.gift-option').forEach(function(el) {
            el.addEventListener('click', function(e) {
                document.querySelectorAll('.gift-option').forEach(o => o.classList.remove('selected'));
                el.classList.add('selected');
                selectedGiftId = el.dataset.giftId;
            });
        });

        const loyaltyModal = document.getElementById('loyaltyGiftModal');
        if (loyaltyModal) {
            loyaltyModal.addEventListener('hidden.bs.modal', function() {
                document.querySelectorAll('.gift-option').forEach(o => o.classList.remove('selected'));
                selectedGiftId = null;
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
