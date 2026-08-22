<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="site-shell auth-shell">
        <div class="grain" aria-hidden="true"></div>

        <header class="site-header auth-header">
            <a href="{{ url('/') }}" class="wordmark" aria-label="Ruang Alumni beranda">
                <span class="wordmark-mark">R</span>
                <span>ruang<br>alumni</span>
            </a>
            <a href="{{ url('/') }}" class="auth-back-link">Kembali ke beranda <span>↗</span></a>
        </header>

        <main class="auth-main">
            <section class="auth-intro">
                <p class="eyebrow"><span class="eyebrow-dot"></span> ruang alumni · 2026</p>
                @if (request()->routeIs('register'))
                    <h1>Mulai<br><em>terhubung.</em></h1>
                    <p>Tambahkan namamu ke dalam arsip yang terus hidup.</p>
                @else
                    <h1>Selamat<br><em>datang lagi.</em></h1>
                    <p>Temukan kembali cerita, kabar, dan orang-orangmu.</p>
                @endif
            </section>

            <section class="auth-panel">
                <div class="auth-panel-heading">
                    <span>{{ request()->routeIs('register') ? 'Daftar anggota' : 'Masuk ke ruang' }}</span>
                    <span class="auth-panel-index">/ {{ request()->routeIs('register') ? '02' : '01' }}</span>
                </div>
                {{ $slot }}
            </section>
        </main>

        <footer class="auth-footer">
            <span>sebuah arsip kecil untuk langkah yang panjang.</span>
            <span>SMK / alumni</span>
        </footer>
    </body>
</html>
