<x-guest-layout>
    @section('title', 'Відновлення паролю — PELOVIT-R')

    <h4 class="fw-bold mb-3 text-center">Відновлення паролю</h4>
    <p class="text-muted small mb-4 text-center">Введіть email і ми надішлемо посилання для скидання паролю.</p>

    @if (session('status'))
        <div class="alert alert-success mb-3">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label fw-medium">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control rounded-3 @error('email') is-invalid @enderror"
                   required autofocus>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-brown w-100 py-2 rounded-3">Надіслати посилання</button>

        <p class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none small" style="color:#9c6b55;">Повернутись до входу</a>
        </p>
    </form>
</x-guest-layout>
