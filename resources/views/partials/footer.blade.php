
<!-- Loyalty + Footer -->
<section class="loyalty-footer py-5">
    <div class="container">

        <!-- Loyalty Program Block -->
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <h2 class="fw-bold display-5 mb-3">Приєднуйтесь до нашої програми лояльності!</h2>
                <p class="lead text-muted">
                    Реєструйтеся на сайті та отримуйте бонуси за покупки,<br>
                    спеціальні пропозиції та персональні знижки.
                </p>
            </div>

            <div class="col-lg-5">
                <form class="loyalty-form">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Ім’я" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Номер телефону" required>
                    </div>
                    <div class="mb-4">
                        <input type="email" class="form-control" placeholder="Електронна пошта" required>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-3 fw-medium rounded-3">
                        Підписатись
                    </button>

                    <p class="text-center text-muted mt-3 small">
                        By clicking the button, I agree to the personal data processing policy.
                    </p>
                </form>
            </div>
        </div>

        <hr class="my-5 border-light">

        <!-- Main Footer -->
        <div class="row g-5">
            <!-- Logo + Brand -->
            <div class="col-lg-3">
                <h3 class="fw-bold mb-4">PELOVIT-R</h3>
            </div>

            <!-- Навігація -->
            <div class="col-lg-3">
                <h6 class="fw-semibold mb-3">Навігація</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Про нас</a></li>
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Препарати</a></li>
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Контрактне виробництво</a></li>
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Опт закупівлі</a></li>
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Майстрам</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">Адреси магазинів</a></li>
                </ul>
            </div>

            <!-- Категорії товарів -->
            <div class="col-lg-3">
                <h6 class="fw-semibold mb-3">Категорія товарів</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Парфумована лінійка ART17</a></li>
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Лікувальні препарати</a></li>
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">Доглядова косметика</a></li>
                    <li class="mb-2"><a href="#" class="text-dark text-decoration-none">PRO серія Майстер</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">Комплекси</a></li>
                </ul>
            </div>

            <!-- Контакти -->
            <div class="col-lg-3">
                <h6 class="fw-semibold mb-3">Контакти</h6>
                <ul class="list-unstyled">
                    @if (!empty($settings['email']))
                    <li class="mb-3">
                        <a href="mailto:{{ $settings['email'] }}" class="text-dark text-decoration-none">
                            ✉ {{ $settings['email'] }}
                        </a>
                    </li>
                    @endif
                    @foreach (['phone', 'phone_2', 'phone_3'] as $key)
                        @if (!empty($settings[$key]))
                        <li class="mb-2">
                            <a href="tel:{{ preg_replace('/\D/', '', $settings[$key]) }}" class="text-dark text-decoration-none">
                                ☎ {{ $settings[$key] }}
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>

                <!-- Social -->
                <div class="d-flex gap-3 mt-3">
                    @if (!empty($settings['instagram_url']))
                    <a href="{{ $settings['instagram_url'] }}" target="_blank" rel="noopener" class="text-dark fs-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    @if (!empty($settings['facebook_url']))
                    <a href="{{ $settings['facebook_url'] }}" target="_blank" rel="noopener" class="text-dark fs-4">
                        <i class="fab fa-facebook"></i>
                    </a>
                    @endif
                    @if (!empty($settings['youtube_url']))
                    <a href="{{ $settings['youtube_url'] }}" target="_blank" rel="noopener" class="text-dark fs-4">
                        <i class="fab fa-youtube"></i>
                    </a>
                    @endif
                    @if (!empty($settings['telegram_url']))
                    <a href="{{ $settings['telegram_url'] }}" target="_blank" rel="noopener" class="text-dark fs-4">
                        <i class="fab fa-telegram"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center text-muted mt-5 pt-4 border-top">
            © Pelovit 2025. Політика конфіденційності. Умови використання. Політика cookie.
        </div>

    </div>
</section>

