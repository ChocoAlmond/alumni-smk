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
<body class="bg-light">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card shadow-sm">
					<div class="card-header text-center bg-primary text-white">
						<h4 class="mb-0">Login Admin</h4>
					</div>

					<div class="card-body">
						@if ($errors->any())
							<div class="alert alert-danger">
								{{ $errors->first() }}
							</div>
						@endif

						<form action="{{ route('login.post') }}" method="POST">
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

							<button type="submit" class="btn btn-primary w-100">
								Login
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>