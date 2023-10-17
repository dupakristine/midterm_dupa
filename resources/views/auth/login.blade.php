@extends('base')

@section('content')
<div class="container p-5" style="max-width: 750px;">
    <div class="card shadow futuristic-card" style="margin-top: 150px;">
        <div class="card-header">
            <h1 class="text-left futuristic-text">Welcome</h1>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard') }}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="email" class="futuristic-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control futuristic-input" placeholder="Email">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="futuristic-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control futuristic-input" placeholder="Password">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex mt-5">
                    <div class="flex-grow-1">
                        <a href="{{ route('registerForm') }}" class="futuristic-link">Create Account</a>
                    </div>
                    <button type="submit" class="btn btn-primary futuristic-button">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
