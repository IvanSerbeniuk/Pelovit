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
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <path d="M4 4H10V10H4V4Z" stroke="#FFFEFC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 4H20V10H14V4Z" stroke="#FFFEFC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4 14H10V20H4V14Z" stroke="#FFFEFC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 17C14 17.7956 14.3161 18.5587 14.8787 19.1213C15.4413 19.6839 16.2044 20 17 20C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17C20 16.2044 19.6839 15.4413 19.1213 14.8787C18.5587 14.3161 17.7956 14 17 14C16.2044 14 15.4413 14.3161 14.8787 14.8787C14.3161 15.4413 14 16.2044 14 17Z" stroke="#FFFEFC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
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
                    <svg width="22" height="22" viewBox="0 0 26 26" fill="none">
                        <circle cx="11" cy="11" r="7.75" stroke="#1A1A1A" stroke-width="1.4"/>
                        <path d="M22.75 22.75L17.25 17.25" stroke="#1A1A1A" stroke-width="1.4" stroke-linecap="round"/>
                    </svg>
                </a>

                {{-- Phone --}}
                <a href="tel:+380633090303" class="nav-icon text-dark" title="+38 (063) 309-03-03">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M2.81657 0.649994H7.1499L9.31657 6.06666L6.60824 7.69166C7.76844 10.0442 9.67241 11.9481 12.0249 13.1083L13.6499 10.4L19.0666 12.5667V16.9C19.0666 17.4746 18.8383 18.0257 18.432 18.4321C18.0256 18.8384 17.4745 19.0667 16.8999 19.0667C12.6741 18.8099 8.6884 17.0154 5.6948 14.0218C2.7012 11.0282 0.906706 7.04246 0.649902 2.81666C0.649902 2.24202 0.878175 1.69092 1.2845 1.2846C1.69083 0.878267 2.24193 0.649994 2.81657 0.649994Z" stroke="#1A1A1A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                {{-- Wishlist --}}
                <a href="#" class="nav-icon text-dark" title="Обране">
                    <svg width="22" height="20" viewBox="0 0 21 19" fill="none">
                        <path d="M18.539 9.94868L10.414 17.9957L2.28898 9.94868C1.75306 9.42718 1.33093 8.80037 1.04916 8.10771C0.767389 7.41505 0.63209 6.67155 0.651781 5.92403C0.671471 5.17651 0.845725 4.44117 1.16357 3.7643C1.48141 3.08743 1.93596 2.48371 2.49859 1.99115C3.06122 1.49858 3.71975 1.12785 4.43269 0.902289C5.14564 0.676731 5.89757 0.601234 6.64113 0.680553C7.38469 0.759872 8.10377 0.992289 8.7531 1.36317C9.40242 1.73405 9.96792 2.23535 10.414 2.83552C10.862 2.23971 11.4281 1.74278 12.077 1.37584C12.7259 1.0089 13.4435 0.779839 14.185 0.702998C14.9265 0.626158 15.6758 0.703191 16.3862 0.929276C17.0965 1.15536 17.7525 1.52563 18.3132 2.01691C18.8738 2.50819 19.327 3.10991 19.6444 3.7844C19.9618 4.45889 20.1366 5.19164 20.1578 5.93679C20.179 6.68193 20.0462 7.42343 19.7676 8.11487C19.4891 8.80632 19.0708 9.43283 18.539 9.95519" stroke="#1A1A1A" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                {{-- Profile --}}
                <a href="#" class="nav-icon text-dark" title="Профіль">
                    <svg width="24" height="24" viewBox="0 0 26 26" fill="none">
                        <circle cx="13" cy="8" r="4.25" stroke="#1A1A1A" stroke-width="1.3"/>
                        <path d="M6.5 22.75V20.5833C6.5 18.1901 8.44 16.25 10.8333 16.25H15.1667C17.56 16.25 19.5 18.1901 19.5 20.5833V22.75" stroke="#1A1A1A" stroke-width="1.3" stroke-linecap="round"/>
                    </svg>
                </a>

                {{-- Cart --}}
                <a href="{{ route('cart') }}" class="nav-cart position-relative text-decoration-none" title="Кошик">
                    <span id="cart-count" class="cart-badge d-none">0</span>
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M6.33105 8H17.67C18.2754 8 18.8286 8.35062 19.0877 8.89443L20.9877 12.8944C21.196 13.3313 21.0082 13.8582 20.5713 14.0664L6.33105 8ZM6.33105 8L4.35405 10.304L5.60905 18.456C5.71797 19.1643 6.07683 19.8102 6.62068 20.2768C7.16453 20.7434 7.85745 21 8.57405 21H15.426C16.1428 21.0002 16.836 20.7438 17.38 20.2771C17.9241 19.8105 18.2831 19.1644 18.392 18.456L19.647 10.304C19.6909 10.019 19.6726 9.72786 19.5933 9.45059C19.5141 9.17331 19.3759 8.91645 19.1881 8.6976C19.0003 8.47876 18.7674 8.30311 18.5054 8.1827C18.2434 8.06229 17.9584 7.99997 17.67 8" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V11" stroke="#1A1A1A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="cart-label">Кошик</span>
                </a>

            </div>
        </div>
    </div>
</nav>
