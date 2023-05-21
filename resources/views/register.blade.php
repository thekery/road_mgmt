@extends('template')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input 
                                type="text" 
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : (old('name') ? 'is-valid' : '') }}" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input 
                                type="email" 
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : (old('email') ? 'is-valid' : '') }}" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Password</label>
                            <input 
                                type="password" 
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" 
                                name="password" 
                                required
                            >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input 
                                type="password" 
                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" 
                                name="password_confirmation" 
                                required
                            >
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection