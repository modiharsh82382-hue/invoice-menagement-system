@extends('layouts.app')

@section('title', 'Settings | Invoice Management System')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-1">Settings</h1>
            <p class="text-secondary mb-0">Manage your profile and sign-in credentials.</p>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-12 col-xl-7">
            <section class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 p-lg-5">
                    <h2 class="h5 fw-bold mb-1">Profile</h2>
                    <p class="text-secondary mb-4">Update the name and email used for your account.</p>

                    <form method="POST" action="{{ route('settings.profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="name">Full name</label>
                            <input id="name" name="name" value="{{ old('name', $user->name) }}" required
                                   class="form-control @error('name') is-invalid @enderror">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Save profile</button>
                    </form>
                </div>
            </section>
        </div>

        <div class="col-12 col-xl-5">
            <section class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4 p-lg-5">
                    <h2 class="h5 fw-bold mb-1">Change password</h2>
                    <p class="text-secondary mb-4">Confirm your current password before setting a new one.</p>

                    <form method="POST" action="{{ route('settings.password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="current_password">Current password</label>
                            <input id="current_password" name="current_password" type="password" required autocomplete="current-password"
                                   class="form-control @error('current_password') is-invalid @enderror">
                            @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">New password</label>
                            <input id="password" name="password" type="password" required minlength="8" autocomplete="new-password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="password_confirmation">Confirm new password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password"
                                   class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Update password</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
