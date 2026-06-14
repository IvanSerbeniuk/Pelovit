@extends('layouts.app')

@section('title', 'Профіль — PELOVIT-R')

@section('content')
<section class="py-5">
  <div class="container" style="max-width: 760px;">
    <h1 class="mb-4">Мій профіль</h1>

    @if (session('status') === 'profile-updated')
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Профіль оновлено.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    {{-- Update profile --}}
    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
      <h5 class="fw-bold mb-3">Особисті дані</h5>
      <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
          <label for="name" class="form-label fw-medium">Ім'я</label>
          <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                 class="form-control rounded-3 @error('name') is-invalid @enderror"
                 required autocomplete="name">
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
          <label for="email" class="form-label fw-medium">Email</label>
          <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                 class="form-control rounded-3 @error('email') is-invalid @enderror"
                 required autocomplete="username">
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-brown px-4 rounded-3">Зберегти</button>
      </form>
    </div>

    {{-- Change password --}}
    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
      <h5 class="fw-bold mb-3">Змінити пароль</h5>

      @if (session('status') === 'password-updated')
        <div class="alert alert-success">Пароль оновлено.</div>
      @endif

      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
          <label for="current_password" class="form-label fw-medium">Поточний пароль</label>
          <input id="current_password" type="password" name="current_password"
                 class="form-control rounded-3 @error('current_password', 'updatePassword') is-invalid @enderror"
                 autocomplete="current-password">
          @error('current_password', 'updatePassword')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label fw-medium">Новий пароль</label>
          <input id="password" type="password" name="password"
                 class="form-control rounded-3 @error('password', 'updatePassword') is-invalid @enderror"
                 autocomplete="new-password">
          @error('password', 'updatePassword')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="form-label fw-medium">Підтвердити пароль</label>
          <input id="password_confirmation" type="password" name="password_confirmation"
                 class="form-control rounded-3" autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-brown px-4 rounded-3">Оновити пароль</button>
      </form>
    </div>

    {{-- Logout & delete --}}
    <div class="bg-white rounded-4 shadow-sm p-4">
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-outline-secondary rounded-3">Вийти</button>
        </form>

        <button type="button" class="btn btn-outline-danger rounded-3" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
          Видалити акаунт
        </button>
      </div>
    </div>
  </div>
</section>

{{-- Delete account modal --}}
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Видалення акаунту</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted">Ця дія незворотна. Введіть пароль для підтвердження.</p>
        <form id="delete-account-form" method="POST" action="{{ route('profile.destroy') }}">
          @csrf
          @method('delete')
          <div class="mb-3">
            <label for="del_password" class="form-label fw-medium">Пароль</label>
            <input id="del_password" type="password" name="password"
                   class="form-control rounded-3 @error('password', 'userDeletion') is-invalid @enderror">
            @error('password', 'userDeletion')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Скасувати</button>
        <button type="submit" form="delete-account-form" class="btn btn-danger rounded-3">Видалити</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endsection
