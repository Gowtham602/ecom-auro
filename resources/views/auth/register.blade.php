@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<div class="text-center mb-4">

    <h2 class="auth-title">Create Account</h2>

    <p class="auth-subtitle">
        Join us and start shopping today
    </p>

</div>

<form method="POST" action="{{ route('register') }}">

    @csrf

    {{-- Name --}}
    <div class="mb-3">

        <label class="form-label">Full Name</label>

        <div class="input-group">

            <span class="input-group-text">
                <i class="fas fa-user"></i>
            </span>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Enter your full name"
                required
                autofocus>

        </div>

        @error('name')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Email --}}
    <div class="mb-3">

        <label class="form-label">Email Address</label>

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
                required>

        </div>

        @error('email')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Password --}}
    <div class="mb-3">

        <label class="form-label">Password</label>

        <div class="input-group">

            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>

            <input
                id="password"
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Create password"
                required>

            <span class="input-group-text toggle-password" data-target="#password">
                <i class="fas fa-eye"></i>
            </span>

        </div>

        @error('password')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Confirm Password --}}
    <div class="mb-4">

        <label class="form-label">Confirm Password</label>

        <div class="input-group">

            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Confirm password"
                required>

            <span class="input-group-text toggle-password" data-target="#password_confirmation">
                <i class="fas fa-eye"></i>
            </span>

        </div>

    </div>

    {{-- Register Button --}}
    <button type="submit" class="btn btn-auth">

        <i class="fas fa-user-plus me-2"></i>

        Create Account

    </button>

</form>

<div class="divider">

    <span>OR</span>

</div>

{{--
<button class="social-btn">

    <i class="fab fa-google text-danger me-2"></i>

    Continue with Google

</button>
--}}

<div class="text-center mt-4">

    <p class="mb-0">

        Already have an account?

        <a href="{{ route('login') }}" class="auth-link">

            Login Here

        </a>

    </p>

</div>

@endsection

@push('scripts')

<script>

$(function () {

    $(".toggle-password").click(function () {

        let target = $($(this).data("target"));

        let icon = $(this).find("i");

        if (target.attr("type") === "password") {

            target.attr("type", "text");

            icon.removeClass("fa-eye");

            icon.addClass("fa-eye-slash");

        } else {

            target.attr("type", "password");

            icon.removeClass("fa-eye-slash");

            icon.addClass("fa-eye");

        }

    });

});

</script>

@endpush