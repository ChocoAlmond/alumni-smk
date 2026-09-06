<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ruang temu alumni SMK untuk menemukan cerita, karya, dan koneksi baru.">
    <title>Ruang Alumni SMKN 1 Pedan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-shell hld-home">
    <div class="grain" aria-hidden="true"></div>

    <header class="site-header hld-header">
        <a href="{{ url('/') }}" class="wordmark hld-wordmark" aria-label="Ruang Alumni beranda">
            <span class="wordmark-mark">R</span>
            <span>ruang alumni<br><b>smkn 1 pedan</b></span>
        </a>

        <nav class="main-nav" aria-label="Navigasi utama">
            <a href="#tentang">Tentang kami</a>
            <a href="#jelajah">Direktori alumni</a>
            <a href="#cerita">Kabar alumni</a>
        </nav>

        <div class="header-actions">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-link">Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="pill-button pill-button-small">Bergabung <span>↗</span></a>
                @endif
            @endauth
        </div>
    </header>

    <main>
        <section class="hld-hero">
            <div class="hld-hero-image" aria-hidden="true"></div>
            <div class="hld-hero-overlay"></div>
            <div class="hld-hero-content">
                <p class="eyebrow"><span class="eyebrow-dot"></span> arsip alumni · sejak 1965</p>
                <h1>Tumbuh<br><em>bersama.</em></h1>
                <p class="hero-intro">Ruang temu keluarga besar SMKN 1 Pedan untuk mengenang yang telah lewat, merayakan hari ini, dan membangun langkah berikutnya.</p>
                <a href="#tentang" class="hero-discover">Temukan cerita kami <span>↓</span></a>
            </div>
            <div class="hero-meta"><span>01</span><i></i><span>03</span></div>
            <div class="hero-location">Klaten, Jawa Tengah<br><span>Indonesia</span></div>
        </section>

        <section class="hld-intro" id="tentang">
            <div class="section-index">01 <span>/</span> tentang ruang ini</div>
            <div class="hld-intro-main">
                <p class="section-kicker">Masa lalu yang menghubungkan</p>
                <h2>Satu sekolah.<br><em>Ribuan perjalanan.</em></h2>
                <div class="hld-intro-detail">
                    <p>Alumni SMKN 1 Pedan bukan sekadar daftar nama. Kami adalah jaringan cerita, keahlian, dan kepedulian yang terus bergerak lintas angkatan.</p>
                    <a href="#jelajah" class="underline-link">Jelajahi komunitas <span>↗</span></a>
                </div>
            </div>
        </section>

        <section class="hld-stats" aria-label="Data komunitas alumni">
            <div><strong>40+</strong><span>tahun cerita</span></div>
            <div><strong>1.2K</strong><span>alumni terhubung</span></div>
            <div><strong>18</strong><span>jurusan & keahlian</span></div>
            <div><strong>∞</strong><span>kemungkinan baru</span></div>
        </section>

        <section class="hld-directory" id="jelajah">
            <div class="directory-heading">
                <div>
                    <p class="section-kicker">02 / direktori alumni</p>
                    <h2>Wajah di balik<br><em>perjalanan.</em></h2>
                </div>
                <a href="{{ route('login') }}" class="arrow-button" aria-label="Buka direktori alumni">↗</a>
            </div>
            <div class="directory-list">
                <div class="directory-row directory-row-head"><span>alumni</span><span>bidang</span><span>angkatan</span><span></span></div>
                <div class="directory-row"><strong>01</strong><span class="directory-name">Nadia Prameswari</span><span>Teknologi & Produk</span><span>2018</span><span>↗</span></div>
                <div class="directory-row"><strong>02</strong><span class="directory-name">Rizky Ramadhan</span><span>Otomotif</span><span>2019</span><span>↗</span></div>
                <div class="directory-row"><strong>03</strong><span class="directory-name">Salsa Maharani</span><span>Keuangan</span><span>2020</span><span>↗</span></div>
            </div>
            <p class="directory-footnote">* Masuk untuk mengakses direktori lengkap alumni.</p>
        </section>

        <section class="hld-story" id="cerita">
            <div class="hld-story-image" aria-hidden="true"></div>
            <div class="hld-story-copy">
                <p class="section-kicker">03 / kabar alumni</p>
                <h2>Yang baik<br><em>diteruskan.</em></h2>
                <p>Temukan kabar, kolaborasi, dan pencapaian dari orang-orang yang pernah berjalan di koridor yang sama.</p>
                <a href="{{ route('login') }}" class="underline-link">Lihat semua kabar <span>↗</span></a>
            </div>
        </section>
    </main>

    <footer class="site-footer hld-footer">
        <div class="footer-top">
            <a href="{{ url('/') }}" class="wordmark wordmark-footer"><span class="wordmark-mark">R</span><span>ruang alumni<br><b>smkn 1 pedan</b></span></a>
            <p>Terhubung oleh masa lalu.<br>Bergerak untuk masa depan.</p>
            <a href="{{ route('login') }}" class="pill-button">Masuk ke ruang <span>↗</span></a>
        </div>
        <div class="footer-bottom"><span>© {{ date('Y') }} Ruang Alumni SMKN 1 Pedan</span><span>Klaten · Indonesia</span></div>
    </footer>
</body>
</html>
