<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PELOVIT-R')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/main.scss'])
</head>
<body class="bg-light">
<div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="w-100" style="max-width: 440px; padding: 0 1rem;">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="text-decoration-none fs-3 fw-bold">
                <span style="color:#422928;">PELOVIT</span><span style="color:#9c6b55;">-R</span>
            </a>
        </div>
        <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
            {{ $slot }}
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
