@extends('layouts.app')

@section('title', 'Обране — PELOVIT-R')

@section('content')
<section class="py-5">
  <div class="container">
    <h1 class="mb-4">Обране</h1>

    <p id="wishlist-empty-msg" class="text-muted d-none">У вас ще немає збережених товарів.</p>

    <div id="wishlist-items" class="row g-4"></div>
  </div>
</section>
@endsection
