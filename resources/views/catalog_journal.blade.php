@extends('layouts.app')

@section('title', 'PELOVIT-R — Косметика для здорової шкіри')

@section('content')


    <header class="">
  <div class="container py-3">
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center gap-2">
        <h1 class="text-decoration-none fw-bold">Меджурнал</h1>
      </div>

      <div class="d-flex" style="max-width: 420px; width: 100%;">
        <div class="input-group" style="border-radius: 16px;border: 1px solid #DEDEDE;overflow: hidden !important;">
          <span class="input-group-text " ><i class="bi bi-search"></i></span>
          <input type="text" class="form-control"  placeholder="Пошук по блогу">
        </div>
      </div>
    </div>
  </div>
</header>

<section class="container publications_box py-5">
  <h5 class="mb-4">Останні публікації</h5>

  <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="position-relative">
          <div class="card-img-top_wrapper">
            <img src="https://picsum.photos/id/1011/800/600" class="card-img-top" alt="Жіноче обличчя">
          </div>
          <span class="badge position-absolute  px-3 py-2">Клінічні дослідження</span>
        </div>
        <div class="card-body d-flex flex-column">
          <p class="text-muted small data">12 вересня 2025</p>
          <h5 class="card-title">Висновок одеського інституту здоров’я сім’ї</h5>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-lg-6">
      <div class="card h-100">
        <div class="position-relative">
          <div class="card-img-top_wrapper">
            <img src="https://picsum.photos/id/106/800/600" class="card-img-top" alt="Флакон">
          </div>
          <span class="badge position-absolute  px-3 py-2">Клінічні дослідження</span>
        </div>
        <div class="card-body d-flex flex-column">
          <p class="text-muted small data">12 вересня 2025</p>
          <h5 class="card-title">Висновок одеського інституту здоров’я сім’ї</h5>
        </div>
      </div>
    </div>
</div>
</section>

<section class="catalog_journal">
  <div class="container py-5">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-lg-3 mb-5">
        <h5 class="mb-3 ">Категорії</h5>
        <div class="sidebar">
          <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link active">Всі</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Без категорії</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Відновлення та лікування</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Інструкції</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Історія та події</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Клінічні дослідження</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Лікувальні процедури</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Лікування та профілактика</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Профілактика та реабілітація</a></li>
          </ul>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-lg-9">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="articles">
          <div class="col">
            <div class="card h-100">
              <div class="position-relative">
                <div class="card-img-top_wrapper">
                  <img src="https://picsum.photos/id/1011/600/400" class="card-img-top" alt="">
                </div>
                <span class="badge position-absolute top-3 start-3">Клінічні дослідження</span>
              </div>
              <div class="card-body">
                <p class="text-muted small">12 вересня 2025</p>
                <h6 class="card-title">Висновок одеського інституту здоров’я сім’ї</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="position-relative">
                <div class="card-img-top_wrapper">
                  <img src="https://picsum.photos/id/1011/600/400" class="card-img-top" alt="">
                </div>
                <span class="badge position-absolute top-3 start-3">Клінічні дослідження</span>
              </div>
              <div class="card-body">
                <p class="text-muted small">12 вересня 2025</p>
                <h6 class="card-title">Висновок одеського інституту здоров’я сім’ї</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="position-relative">
                <div class="card-img-top_wrapper">
                  <img src="https://picsum.photos/id/1011/600/400" class="card-img-top" alt="">
                </div>
                <span class="badge position-absolute top-3 start-3">Клінічні дослідження</span>
              </div>
              <div class="card-body">
                <p class="text-muted small">12 вересня 2025</p>
                <h6 class="card-title">Висновок одеського інституту здоров’я сім’ї</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="position-relative">
                <div class="card-img-top_wrapper">
                  <img src="https://picsum.photos/id/1011/600/400" class="card-img-top" alt="">
                </div>
                <span class="badge position-absolute top-3 start-3">Клінічні дослідження</span>
              </div>
              <div class="card-body">
                <p class="text-muted small">12 вересня 2025</p>
                <h6 class="card-title">Висновок одеського інституту здоров’я сім’ї</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="position-relative">
                <div class="card-img-top_wrapper">
                  <img src="https://picsum.photos/id/1011/600/400" class="card-img-top" alt="">
                </div>
                <span class="badge position-absolute top-3 start-3">Клінічні дослідження</span>
              </div>
              <div class="card-body">
                <p class="text-muted small">12 вересня 2025</p>
                <h6 class="card-title">Висновок одеського інституту здоров’я сім’ї</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <div class="position-relative">
                <div class="card-img-top_wrapper">
                  <img src="https://picsum.photos/id/1011/600/400" class="card-img-top" alt="">
                </div>
                <span class="badge position-absolute top-3 start-3">Клінічні дослідження</span>
              </div>
              <div class="card-body">
                <p class="text-muted small">12 вересня 2025</p>
                <h6 class="card-title">Висновок одеського інституту здоров’я сім’ї</h6>
              </div>
            </div>
          </div>
          <!-- Cards will be generated by JS or you can duplicate them -->
        </div>

        <!-- Pagination -->
        <nav class="mt-5">
          <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link border-0" href="#"><</a></li>
            <li class="page-item active"><a class="page-link  border-0" href="#">1</a></li>
            <li class="page-item"><a class="page-link border-0" href="#">2</a></li>
            <li class="page-item"><a class="page-link border-0" href="#">3</a></li>
            <li class="page-item"><a class="page-link border-0" href="#">...</a></li>
            <li class="page-item"><a class="page-link border-0" href="#">38</a></li>
            <li class="page-item"><a class="page-link border-0" href="#">></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
