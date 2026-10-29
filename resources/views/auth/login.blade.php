<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in | {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; padding: 0; background: #f2f6fc; color: #17365f; }
        .login-card { width: min(calc(100% - 32px), 440px); margin: clamp(48px, 10vh, 110px) auto 24px; border: 0; border-radius: 18px; box-shadow: 0 16px 50px rgba(21, 56, 105, .12); }
        .brand-mark { width: 48px; height: 48px; display: grid; place-items: center; border-radius: 14px; color: #fff; background: #1769e8; font-size: 23px; }
    </style>
</head>
<body>
    @include('partials.app-navbar')
    <main class="card login-card p-4 p-md-5">
        <div class="brand-mark mb-3" aria-hidden="true">▤</div>
        <h1 class="h3 fw-bold mb-1">Sign in</h1>
        <p class="text-secondary mb-4">Use your account to access the invoice workspace.</p>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">Email address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-check mb-4">
                <input id="remember" name="remember" type="checkbox" value="1" class="form-check-input">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
        @if ($canRegister)
            <div class="text-center mt-4 pt-3 border-top">
                <p class="text-secondary mb-2">No account has been created yet?</p>
                <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">Create the first account</a>
            </div>
        @endif
    </main>
</body>
</html>
