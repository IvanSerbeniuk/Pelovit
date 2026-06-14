<x-guest-layout>
    @section('title', 'Вхід — PELOVIT-R')

    <h4 class="fw-bold mb-4 text-center">Вхід в акаунт</h4>

    @if (session('status'))
        <div class="alert alert-success mb-3">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label fw-medium">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control rounded-3 @error('email') is-invalid @enderror"
                   required autofocus autocomplete="username">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-medium">Пароль</label>
            <input id="password" type="password" name="password"
                   class="form-control rounded-3 @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                <label class="form-check-label text-muted" for="remember_me">Запам'ятати мене</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none small" style="color:#9c6b55;">Забули пароль?</a>
            @endif
        </div>

        <button type="submit" class="btn btn-brown w-100 py-2 rounded-3">Увійти</button>

        <p class="text-center mt-3 text-muted small">
            Немає акаунту? <a href="{{ route('register') }}" class="text-decoration-none fw-medium" style="color:#9c6b55;">Зареєструватись</a>
        </p>
    </form>
</x-guest-layout>
