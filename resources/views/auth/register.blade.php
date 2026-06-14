<x-guest-layout>
    @section('title', 'Реєстрація — PELOVIT-R')

    <h4 class="fw-bold mb-4 text-center">Створити акаунт</h4>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-medium">Ім'я</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   class="form-control rounded-3 @error('name') is-invalid @enderror"
                   required autofocus autocomplete="name">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-medium">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control rounded-3 @error('email') is-invalid @enderror"
                   required autocomplete="username">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-medium">Пароль</label>
            <input id="password" type="password" name="password"
                   class="form-control rounded-3 @error('password') is-invalid @enderror"
                   required autocomplete="new-password">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-medium">Підтвердити пароль</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   class="form-control rounded-3 @error('password_confirmation') is-invalid @enderror"
                   required autocomplete="new-password">
            @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-brown w-100 py-2 rounded-3">Зареєструватись</button>

        <p class="text-center mt-3 text-muted small">
            Вже є акаунт? <a href="{{ route('login') }}" class="text-decoration-none fw-medium" style="color:#9c6b55;">Увійти</a>
        </p>
    </form>
</x-guest-layout>
