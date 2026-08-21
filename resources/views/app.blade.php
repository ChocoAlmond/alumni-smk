<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi Alumni SMK</title>
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
		rel="stylesheet"
	>
</head>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
		<div class="container">
			<a class="navbar-brand fw-bold" href="{{ route('alumni.index') }}">
				ALUMNI SMK
			</a>

			<div class="collapse navbar-collapse">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link active" href="{{ route('alumni.index') }}">
							Data Alumni
						</a>
					</li>
				</ul>

				@auth
					<ul class="navbar-nav ms-auto align-items-lg-center">
						<li class="nav-item me-3">
							<span class="nav-link text-white">
								Halo, {{ Auth::user()->name }}
							</span>
						</li>
						<li class="nav-item">
							<form action="{{ route('logout') }}" method="POST" class="d-inline">
								@csrf
								<button type="submit" class="btn btn-danger btn-sm">
									Logout
								</button>
							</form>
						</li>
					</ul>
				@endauth
			</div>
		</div>
	</nav>

	<div class="container mt-4">
		@yield('content')
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>