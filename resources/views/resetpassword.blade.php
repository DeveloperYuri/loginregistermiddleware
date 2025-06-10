{{-- <h1>Login</h1> --}}

@extends('layouts.main')

@section('content')
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Reset Password</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <p class="text-center small">Enter your new password to login</p>
                                    </div>

                                    <form action="{{ route('password.update') }}" method="POST"
                                        class="row g-3 needs-validation" novalidate>
                                        @csrf

                                        {{-- Token hidden --}}
                                        <input type="hidden" name="token" value="{{ $token }}">

                                        {{-- Email --}}
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                required value="{{ old('email') }}">
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>

                                        {{-- Password --}}
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">New Password</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword"
                                                required>
                                            <div class="invalid-feedback">Please enter your new password.</div>
                                        </div>

                                        {{-- Password Confirmation --}}
                                        <div class="col-12">
                                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="confirmPassword" required>
                                            <div class="invalid-feedback">Please confirm your password.</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
