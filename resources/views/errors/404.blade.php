<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman yang kamu cari tidak ditemukan.">
    <title>Halaman tidak ditemukan · Ruang Alumni</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-shell error-shell">
    <div class="grain" aria-hidden="true"></div>

    <main class="error-page">
        <header class="error-header">
            <a href="{{ url('/') }}" class="wordmark" aria-label="Kembali ke Ruang Alumni">
                <span class="wordmark-mark">R</span>
                <span>ruang alumni<br><b>smkn 1 pedan</b></span>
            </a>
            <span class="error-header-label">arsip alumni · 404</span>
        </header>

        <section class="error-content" aria-labelledby="error-title">
            <div class="error-index">04 <span>/</span> halaman tidak ditemukan</div>
            <div class="error-copy">
                <p class="section-kicker">Sepertinya kita mengambil jalan yang berbeda</p>
                <h1 id="error-title">Cerita ini<br><em>belum sampai.</em></h1>
                <p class="error-description">Halaman yang kamu cari mungkin sudah berpindah, atau alamatnya belum pernah menjadi bagian dari arsip kami.</p>
                <div class="error-actions">
                    <a href="{{ url('/') }}" class="pill-button">Kembali ke beranda <span>↗</span></a>
                    <a href="javascript:history.back()" class="underline-link">Kembali sebelumnya <span>←</span></a>
                </div>
            </div>
        </section>

        <footer class="error-footer">
            <span>© {{ date('Y') }} Ruang Alumni SMKN 1 Pedan</span>
            <span>Klaten · Indonesia</span>
        </footer>
    </main>
</body>
</html>
