@extends('layouts.clientLayout')
@section('title', 'Login')
@section('content')

    <div class="container container-mt">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 col-lg-4">

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success mb-3">{{ session('success') }}</div>
                        @endif
                        <h4 class="card-title mb-4">Login</h4>

                        <form method="POST" action="{{ route("login.login") }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="mail@example.com" required autofocus/>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label mb-0">Password</label>
                                    <a href="#" class="small">Forgot password?</a>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"/>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Login</button>

                            @if(session("error"))
                                <div class="alert alert-danger mt-3"> {{ session("error") }} </div>
                            @endif
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-3 small">
                    Don't have an account? <a href="{{ route('register.index') }}">Sign up</a>
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0"> @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
