<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <span style="color:#422928;">PELOVIT</span><span style="color:#9c6b55;">-R</span>
        </a>

        {{-- Mobile toggler --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Меню">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item cat-blue radius">
                    <div class="wrapper">
                        <x-icons.grid />
                        <a class="nav-link" href="{{ route('catalog') }}">Каталог</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">Про нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kontractne-vyrobnyctvo') ? 'active' : '' }}" href="{{ url('/kontractne-vyrobnyctvo') }}">Контрактне виробництво</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('masters') ? 'active' : '' }}" href="{{ url('/masters') }}">Майстри</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contacts') ? 'active' : '' }}" href="{{ url('/contacts') }}">Контакти</a>
                </li>
            </ul>

            {{-- Right icons --}}
            <div class="d-flex align-items-center gap-2">

                {{-- Search --}}
                <a href="{{ route('catalog') }}" class="nav-icon text-dark" title="Пошук">
                    <x-icons.search />
                </a>

                {{-- Phone --}}
                @php $phone = $settings['phone'] ?? '+38 (063) 309-03-03'; @endphp
                <a href="tel:{{ preg_replace('/\D/', '', $phone) }}" class="nav-icon text-dark" title="{{ $phone }}">
                    <x-icons.phone />
                </a>

                {{-- Wishlist --}}
                <a href="#" class="nav-icon text-dark" title="Обране">
                    <x-icons.heart />
                </a>

                {{-- Profile --}}
                <a href="#" class="nav-icon text-dark" title="Профіль">
                    <x-icons.user />
                </a>

                {{-- Cart --}}
                <a href="{{ route('cart') }}" class="nav-cart position-relative text-decoration-none" title="Кошик">
                    <span id="cart-count" class="cart-badge d-none">0</span>
                    <x-icons.cart />
                    <span class="cart-label">Кошик</span>
                </a>

            </div>
        </div>
    </div>
</nav>
