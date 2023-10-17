@extends('base')

@section('content')
<div class="container p-5" style="max-width: 750px;">
    <div class="card shadow futuristic-card" style="margin-top: 150px;">
        <div class="card-header">
            <h1 class="text-left futuristic-text">Register</h1>
        </div>
        <div class="card-body">
            <form action="{{ '/register' }}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="futuristic-label">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control futuristic-input" placeholder="Full Name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
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
                <div class="mb-3">
                    <label for="password_confirmation" class="futuristic-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control futuristic-input" placeholder="Password">
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex mt-5">
                    <div class="flex-grow-1">
                        <a href="{{ '/' }}" class="futuristic-link">Already have an account</a>
                    </div>
                    <button class="btn btn-primary futuristic-button">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
