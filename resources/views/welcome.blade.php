<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ruang temu alumni SMK untuk menemukan cerita, karya, dan koneksi baru.">
    <title>Ruang Alumni SMKN 1 Pedan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-shell">
    <div class="grain" aria-hidden="true"></div>

    <header class="site-header">
        <a href="{{ url('/') }}" class="wordmark" aria-label="Ruang Alumni beranda">
            <span class="wordmark-mark">R</span>
            <span>ruang<br>alumni<br>smkn 1 pedan</span>
        </a>

        <nav class="main-nav" aria-label="Navigasi utama">
            <a href="#tentang">Tentang</a>
            <a href="#cerita">Cerita</a>
            <a href="#jelajah">Jelajah</a>
        </nav>

        <div class="header-actions">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-link">Masuk</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="pill-button pill-button-small">Daftar <span>↗</span></a>
                @endif
            @endauth
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="hero-copy">
                <p class="eyebrow"><span class="eyebrow-dot"></span> smkn 1 pedan · arsip yang terus hidup</p>
                <h1>Tempat<br>kita <em>bertemu</em><span class="scribble">lagi.</span></h1>
                <p class="hero-intro">Ruang untuk menyimpan langkah, menemukan kabar, dan membuka percakapan baru bersama keluarga besar SMKN 1 Pedan.</p>
                <div class="hero-actions">
                    <a href="#jelajah" class="pill-button">Jelajahi alumni <span>↗</span></a>
                    <a href="#tentang" class="circle-link" aria-label="Scroll ke bagian tentang">↓</a>
                </div>
            </div>

            <div class="hero-art" aria-label="Kolase foto alumni">
                <div class="hero-orbit orbit-one"></div>
                <div class="hero-orbit orbit-two"></div>
                <div class="photo-card photo-main">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=900&q=85" alt="Sekelompok teman tersenyum bersama">
                    <span class="photo-label">angkatan<br>yang sama</span>
                </div>
                <div class="photo-card photo-small">
                    <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=500&q=85" alt="Teman-teman duduk berbincang">
                </div>
                <div class="note note-star">✳</div>
                <div class="note note-caption">berangkat<br>dari sini <span>↘</span></div>
            </div>
        </section>

        <div class="ticker" aria-label="Kabar komunitas">
            <div class="ticker-track">
                <span>cerita baru</span><b>✳</b><span>koneksi lama</span><b>✳</b><span>langkah berikutnya</span><b>✳</b><span>cerita baru</span><b>✳</b><span>koneksi lama</span>
            </div>
        </div>

        <section class="manifesto-section" id="tentang">
            <div class="section-index">01 <span>/</span> ruang ini</div>
            <div class="manifesto-content">
                <p class="section-kicker">Lebih dari sekadar daftar nama</p>
                <h2>Karena setiap<br>nama punya <em>cerita.</em></h2>
                <div class="manifesto-detail">
                    <p>Di sini, masa lalu tidak berhenti sebagai kenangan. Ia menjadi titik temu untuk kolaborasi, kabar baik, dan ide-ide yang belum pernah kita bayangkan.</p>
                    <a href="#cerita" class="underline-link">Baca cerita mereka <span>↗</span></a>
                </div>
            </div>
        </section>

        <section class="directory-section" id="jelajah">
            <div class="directory-heading">
                <div>
                    <p class="section-kicker">Indeks / 001—∞</p>
                    <h2>Temukan<br><em>orang-orangmu.</em></h2>
                </div>
                <a href="{{ route('login') }}" class="arrow-button" aria-label="Buka direktori alumni">↗</a>
            </div>

            <div class="directory-list">
                <div class="directory-row directory-row-head"><span>nama</span><span>jurusan</span><span>angkatan</span><span></span></div>
                <div class="directory-row"><strong>01</strong><span class="directory-name">Nadia Prameswari</span><span>Rekayasa Perangkat Lunak</span><span>2018</span><span>↗</span></div>
                <div class="directory-row"><strong>02</strong><span class="directory-name">Rizky Ramadhan</span><span>Teknik Kendaraan Ringan</span><span>2019</span><span>↗</span></div>
                <div class="directory-row"><strong>03</strong><span class="directory-name">Salsa Maharani</span><span>Akuntansi & Keuangan</span><span>2020</span><span>↗</span></div>
                <div class="directory-row"><strong>04</strong><span class="directory-name">Bagas Aditya</span><span>Teknik Audio Video</span><span>2021</span><span>↗</span></div>
            </div>
            <p class="directory-footnote">* Data yang tampil adalah cuplikan. Masuk untuk melihat direktori lengkap.</p>
        </section>

        <section class="story-section" id="cerita">
            <div class="story-quote">“</div>
            <div>
                <p class="section-kicker">Catatan dari ruang ini</p>
                <blockquote>Yang membuat sekolah berarti bukan hanya tempatnya, tapi orang-orang yang kita bawa setelahnya.</blockquote>
                <p class="quote-author">— untuk semua yang pernah mengenakan seragam yang sama</p>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-top">
            <a href="{{ url('/') }}" class="wordmark wordmark-footer"><span class="wordmark-mark">R</span><span>ruang<br>alumni<br>smkn 1 pedan</span></a>
            <p>sebuah arsip kecil<br>untuk langkah yang panjang.</p>
            <a href="{{ route('login') }}" class="pill-button">Masuk ke ruang <span>↗</span></a>
        </div>
        <div class="footer-bottom"><span>© {{ date('Y') }} Ruang Alumni SMKN 1 Pedan</span><span>dibuat untuk tetap terhubung.</span></div>
    </footer>
</body>
</html>
