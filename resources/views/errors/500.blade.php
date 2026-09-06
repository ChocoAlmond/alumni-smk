<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Terjadi kendala pada Ruang Alumni.">
    <title>Terjadi kendala · Ruang Alumni</title>

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
            <span class="error-header-label">arsip alumni · 500</span>
        </header>

        <section class="error-content" aria-labelledby="error-title">
            <div class="error-index">05 <span>/</span> gangguan sementara</div>
            <div class="error-copy">
                <p class="section-kicker">Kami sedang merapikan ruang ini</p>
                <h1>Jeda<br><em>sejenak.</em></h1>
                <p class="error-description">Ada kendala di sisi kami. Coba muat ulang halaman atau kembali ke beranda untuk melanjutkan perjalanan.</p>
                <div class="error-actions">
                    <a href="{{ url('/') }}" class="pill-button">Kembali ke beranda <span>↗</span></a>
                    <a href="javascript:location.reload()" class="underline-link">Muat ulang halaman <span>↻</span></a>
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
