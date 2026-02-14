<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-5">

            <div class="card shadow-lg border-0">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Login</h3>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   class="form-control @error('email') is-invalid @enderror"
                                   required autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   class="form-control @error('password') is-invalid @enderror"
                                   required>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" 
                                   name="remember" 
                                   class="form-check-input" 
                                   id="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <!-- Forgot Password -->
                        @if (Route::has('password.request'))
                            <div class="mb-3 text-end">
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot your password?
                                </a>
                            </div>
                        @endif

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>