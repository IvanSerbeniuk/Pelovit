@extends('layouts.app')

@section('title', 'Меджурнал — PELOVIT-R')

@section('content')

<header class="">
  <div class="container py-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="fw-bold">Меджурнал</h1>
      <form method="GET" action="{{ route('journal') }}" class="d-flex" style="max-width: 420px; width: 100%;">
        <div class="input-group" style="border-radius: 16px;border: 1px solid #DEDEDE;overflow: hidden !important;">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input type="text" name="search" class="form-control" placeholder="Пошук по блогу"
                 value="{{ request('search') }}">
        </div>
      </form>
    </div>
  </div>
</header>

{{-- Останні публікації --}}
@if($featured->isNotEmpty())
<section class="container publications_box py-5">
  <h5 class="mb-4">Останні публікації</h5>
  <div class="row g-4">
    @foreach($featured as $post)
    <div class="col-lg-6">
      <a href="{{ route('journal.show', $post->slug) }}" class="text-decoration-none text-dark">
        <div class="card h-100">
          <div class="position-relative">
            <div class="card-img-top_wrapper">
              <img src="{{ $post->image ? asset($post->image) : 'https://picsum.photos/id/' . ($loop->index + 10) . '11/800/600' }}"
                   class="card-img-top" alt="{{ $post->title }}">
            </div>
            @if($post->category)
            <span class="badge position-absolute px-3 py-2">{{ $post->category }}</span>
            @endif
          </div>
          <div class="card-body d-flex flex-column">
            <p class="text-muted small data">{{ $post->formattedDate }}</p>
            <h5 class="card-title">{{ $post->title }}</h5>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</section>
@endif

<section class="catalog_journal">
  <div class="container py-5">
    <div class="row">

      {{-- Sidebar --}}
      <div class="col-lg-3 mb-5">
        <h5 class="mb-3">Категорії</h5>
        <div class="sidebar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="{{ route('journal') }}" class="nav-link {{ !request('category') ? 'active' : '' }}">Всі</a>
            </li>
            @foreach($categories as $cat)
            <li class="nav-item">
              <a href="{{ route('journal', ['category' => $cat]) }}"
                 class="nav-link {{ request('category') === $cat ? 'active' : '' }}">{{ $cat }}</a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>

      {{-- Posts grid --}}
      <div class="col-lg-9">
        @if($posts->isEmpty())
          <p class="text-muted py-4">Публікацій не знайдено.</p>
        @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="articles">
          @foreach($posts as $post)
          <div class="col">
            <a href="{{ route('journal.show', $post->slug) }}" class="text-decoration-none text-dark">
              <div class="card h-100">
                <div class="position-relative">
                  <div class="card-img-top_wrapper">
                    <img src="{{ $post->image ? asset($post->image) : 'https://picsum.photos/id/' . (100 + $post->id) . '/600/400' }}"
                         class="card-img-top" alt="{{ $post->title }}">
                  </div>
                  @if($post->category)
                  <span class="badge position-absolute top-3 start-3">{{ $post->category }}</span>
                  @endif
                </div>
                <div class="card-body">
                  <p class="text-muted small">{{ $post->formattedDate }}</p>
                  <h6 class="card-title">{{ $post->title }}</h6>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
          {{ $posts->links() }}
        </div>
        @endif
      </div>

    </div>
  </div>
</section>

@endsection
