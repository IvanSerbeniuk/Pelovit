@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')

<!--Categories-->
<section class="category-section py-5 restrict--card-heigh">
  <div class="container">
    <div class="row cards">
      @foreach ($categories as $cat)
      <div class="cat_card">
        <a href="{{ route('catalog', ['category' => $cat->slug]) }}" class="text-decoration-none d-block">
          <div class="category-card rounded-4 overflow-hidden {{ request('category') === $cat->slug ? 'active' : '' }}">
            <img src="{{ $cat->image ? asset($cat->image) : asset('images/image.png') }}" class="rounded-4 w-100" alt="{{ $cat->name }}">
            <p class="mt-3 fw-medium cat_name">{{ $cat->name }}</p>
          </div>
        </a>
        @if ($cat->children->isNotEmpty() && request('category') === $cat->slug)
          <div class="subcategories mt-2 ps-2">
            @foreach ($cat->children as $child)
              <a href="{{ route('catalog', ['category' => $child->slug]) }}"
                 class="badge text-decoration-none me-1 mb-1 {{ request('category') === $child->slug ? 'bg-dark' : 'bg-secondary' }}">
                {{ $child->name }}
              </a>
            @endforeach
          </div>
        @endif
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
      <h6 class="fw-semibold mb-3">Категорії</h6>
      @foreach ($categories as $cat)
        <div class="mb-2">
          <a href="{{ route('catalog', ['category' => $cat->slug]) }}"
             class="d-block text-decoration-none fw-medium {{ request('category') === $cat->slug ? 'text-dark' : 'text-secondary' }}">
            {{ $cat->name }}
          </a>
          @if ($cat->children->isNotEmpty())
            <div class="ps-3 mt-1">
              @foreach ($cat->children as $child)
                <a href="{{ route('catalog', ['category' => $child->slug]) }}"
                   class="d-block text-decoration-none small py-1 {{ request('category') === $child->slug ? 'text-dark fw-semibold' : 'text-secondary' }}">
                  — {{ $child->name }}
                </a>
              @endforeach
            </div>
          @endif
        </div>
      @endforeach
    </div>

  </div>

  <div class="offcanvas-footer p-3 border-top">
    <a href="{{ route('catalog') }}" class="btn btn-outline-secondary w-100">Скинути фільтри</a>
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
