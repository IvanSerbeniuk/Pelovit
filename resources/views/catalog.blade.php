@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')

<!--Categories-->
<section class="category-section py-5 restrict--card-heigh">
  <div class="container">
    <div class="row cards">
      @foreach ($categories as $cat)
      <div class="cat_card">
        <a href="{{ route('catalog') }}?category={{ $cat->slug }}" class="text-decoration-none d-block">
          <div class="category-card rounded-4 overflow-hidden">
            <img src="{{ asset('images/tranc.png') }}" class="rounded-4 w-100" alt="{{ $cat->name }}">
            <p class="mt-3 fw-medium cat_name">{{ $cat->name }}</p>
          </div>
        </a>
      </div>
      @endforeach
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
        <label class="form-check-label" for="joins_muscles">Сустави та м'язи</label>
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
        <input class="form-check-input" type="checkbox" id="18-24">
        <label class="form-check-label" for="18-24">18–24</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="25-34">
        <label class="form-check-label" for="25-34">25–34</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="45-54">
        <label class="form-check-label" for="45-54">45–54</label>
      </div>
      <div class="form-check ">
        <input class="form-check-input" type="checkbox" id="55">
        <label class="form-check-label" for="55">55+</label>
      </div>
    </div>

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
          <x-icons.grid color="#1A1A1A" size="24" />
        </i>
      </div>
    </div>

    @if ($products->isEmpty())
      <p class="text-muted py-4">Товарів не знайдено.</p>
    @else
    <div class="row g-4">
      @foreach ($products as $product)
      <div class="col-md-3 col-6">
        <div class="product-card card border-0 shadow-sm rad-16">
          @if ($product->category)
          <div class="tag_brown">{{ $product->category->name }}</div>
          @endif
          <div class="like">
            <x-icons.heart color="#422928" size="23" />
          </div>
          <a href="{{ route('product', $product->slug) }}">
            <img src="{{ asset($product->image ?: 'images/image.png') }}" class="card-img-top" alt="{{ $product->name }}">
          </a>
          <div class="card-body">
            <h6 class="card-title">
              <a href="{{ route('product', $product->slug) }}" class="text-decoration-none text-dark">{{ $product->name }}</a>
            </h6>
            <div class="wrapper__price_buy">
              <div class="disc_price_wrapper">
                @if ($product->old_price)
                  <h4 class="price">{{ number_format($product->old_price, 0, '.', '') }}₴</h4>
                  <div class="disc_price">{{ number_format($product->price, 0, '.', '') }}₴</div>
                @else
                  <h4 class="price">{{ number_format($product->price, 0, '.', '') }}₴</h4>
                @endif
              </div>
              <button class="btn buy rad-12 catalog-add-btn"
                data-id="{{ $product->id }}"
                data-name="{{ e($product->name) }}"
                data-price="{{ $product->price }}"
                data-image="{{ $product->image }}"
                data-slug="{{ $product->slug }}">
                <span>Купити</span>
                <x-icons.cart color="#FAF7F3" size="24" />
              </button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $products->links() }}
    </div>
    @endif

  </div>
</section>

@endsection
