<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account | {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; padding: 0; background: #f2f6fc; color: #17365f; }
        .register-card { width: min(calc(100% - 32px), 480px); margin: clamp(40px, 8vh, 88px) auto 24px; border: 0; border-radius: 18px; box-shadow: 0 16px 50px rgba(21, 56, 105, .12); }
        .brand-mark { width: 48px; height: 48px; display: grid; place-items: center; border-radius: 14px; color: #fff; background: #1769e8; font-size: 23px; }
    </style>
</head>
<body>
    @include('partials.app-navbar')
    <main class="card register-card p-4 p-md-5">
        <div class="brand-mark mb-3" aria-hidden="true">▤</div>
        <h1 class="h3 fw-bold mb-1">Create your account</h1>
        <p class="text-secondary mb-4">Set up the first account to open the invoice workspace.</p>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Full name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input id="password" name="password" type="password" required minlength="8" autocomplete="new-password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-4">
                <label class="form-label" for="password_confirmation">Confirm password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password"
                       class="form-control">
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Create account</button>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="link-secondary">Back to sign in</a>
            </div>
        </form>
    </main>
</body>
</html>
