@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="text-center mb-4">

    <h2 class="auth-title">Welcome Back</h2>

    <p class="auth-subtitle">
        Login to continue shopping
    </p>

</div>

{{-- Session Status --}}
@if (session('status'))

    <div class="alert alert-success">
        {{ session('status') }}
    </div>

@endif

<form method="POST" action="{{ route('login') }}">

    @csrf

    {{-- Email --}}
    <div class="mb-3">

        <label class="form-label">
            Email Address
        </label>

        <div class="input-group">

            <span class="input-group-text">

                <i class="fas fa-envelope"></i>

            </span>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Enter your email"
                required
                autofocus>

        </div>

        @error('email')

            <div class="invalid-feedback d-block">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Password --}}
    <div class="mb-3">

        <label class="form-label">
            Password
        </label>

        <div class="input-group">

            <span class="input-group-text">

                <i class="fas fa-lock"></i>

            </span>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Enter your password"
                required>

            <span class="input-group-text toggle-password">

                <i class="fas fa-eye"></i>

            </span>

        </div>

        @error('password')

            <div class="invalid-feedback d-block">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Remember & Forgot --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                id="remember"
                name="remember">

            <label
                class="form-check-label"
                for="remember">

                Remember Me

            </label>

        </div>

        @if (Route::has('password.request'))

            <a
                href="{{ route('password.request') }}"
                class="auth-link">

                Forgot Password?

            </a>

        @endif

    </div>

    {{-- Login Button --}}
    <button
        type="submit"
        class="btn btn-auth">

        <i class="fas fa-sign-in-alt me-2"></i>

        Login

    </button>

</form>

<div class="divider">

    <span>OR</span>

</div>

{{-- Optional Google Login --}}
{{--
<button class="social-btn">

    <i class="fab fa-google text-danger me-2"></i>

    Continue with Google

</button>
--}}

<div class="text-center mt-4">

    <p class="mb-0">

        Don't have an account?

        <a
            href="{{ route('register') }}"
            class="auth-link">

            Register Now

        </a>

    </p>

</div>

@endsection

@push('scripts')

<script>

$(function () {

    $(".toggle-password").click(function () {

        let input = $("#password");

        let icon = $(this).find("i");

        if (input.attr("type") === "password") {

            input.attr("type", "text");

            icon.removeClass("fa-eye");

            icon.addClass("fa-eye-slash");

        } else {

            input.attr("type", "password");

            icon.removeClass("fa-eye-slash");

            icon.addClass("fa-eye");

        }

    });

});

</script>

@endpush