<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title>
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
		rel="stylesheet"
	>
</head>
<body class="login-shell">
	<div class="login-visual"><a href="{{ url('/') }}" class="admin-brand"><span class="admin-brand-mark">R</span><span>ruang<br>alumni</span></a><div><p class="section-kicker">Portal pengelola · {{ date('Y') }}</p><h1>Yang pernah<br>bertemu, <em>tetap</em><br>terhubung.</h1></div><span class="login-stamp">SMK / 001</span></div>
	<div class="login-panel">
		<a href="{{ url('/') }}" class="login-back">← Kembali ke beranda</a>
		<div class="login-form-wrap"><p class="section-kicker">Selamat datang kembali</p><h2>Masuk ke<br><em>ruangmu.</em></h2>
						@if ($errors->any())
							<div class="alert alert-danger">
								{{ $errors->first() }}
							</div>
						@endif

						<form action="{{ route('login.post') }}" method="POST" class="login-form">
							@csrf

							<div class="mb-3">
								<label for="email" class="form-label">Email Address</label>
								<input
									type="email"
									id="email"
									name="email"
									class="form-control"
									required
									autofocus
								>
							</div>

							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input
									type="password"
									id="password"
									name="password"
									class="form-control"
									required
								>
							</div>

							<button type="submit" class="admin-button w-100">
								Masuk ke dashboard ↗
							</button>
						</form>
		</form></div><p class="login-footnote">Akses khusus pengelola data alumni.<br>Pastikan kredensialmu tetap privat.</p>
	</div>
</body>
</html>