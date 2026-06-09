@extends('layouts.app')

@section('title', 'Замовлення прийнято — PELOVIT-R')

@section('content')
<section class="container py-5 text-center" style="min-height: 60vh; display:flex; flex-direction:column; justify-content:center; align-items:center;">
    <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-4">
        <circle cx="36" cy="36" r="36" fill="#E8F5E9"/>
        <path d="M22 37L31 46L50 27" stroke="#4CAF50" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <h1 class="fw-bold mb-3">Дякуємо за замовлення!</h1>
    <p class="text-muted mb-4">Ваше замовлення прийнято. Наш консультант зв'яжеться з вами найближчим часом.</p>
    <a href="{{ url('/catalog') }}" class="btn btn-dark px-5 py-3 rad-16">Продовжити покупки</a>
</section>

<script>localStorage.removeItem('pelovit_cart');</script>
@endsection
