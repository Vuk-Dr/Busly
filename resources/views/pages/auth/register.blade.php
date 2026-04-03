@extends('layouts.clientLayout')
@section('title', 'Login')
@section('content')
    <div class="container container-mt">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-5">

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Sign up</h4>

                        <form method="POST" action="{{ route("register.store") }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"  id="first_name" name="first_name"
                                           value="{{ old('first_name') }}" required autofocus/>
                                    @error('first_name')
                                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"
                                           value="{{ old('last_name') }}" required/>
                                    @error('last_name')
                                    <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                       placeholder="mail@example.com" value="{{ old('email') }}" required/>
                                @error('email')
                                <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                       required autocomplete="new-password"/>
                                @error('password')
                                <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                       required/>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-3 small">
                    Already have an account? <a href="/login">Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection
