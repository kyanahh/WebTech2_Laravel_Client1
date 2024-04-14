@extends('layout.app')

@section('main')
    <div class="container-fluid">
        <div class="col-sm-4 mx-auto">
        <div class="card bg-light mt-5 p-4">
            <form action="{{ route('user') }}" method="POST">
                @csrf
                @if($errors->has('email') || $errors->has('password'))
                    <div class="alert alert-danger alert-block">
                        <strong>Invalid credentials</strong>
                    </div>
                @endif
                <h1 class="h4 mb-4 text-center">Create Account</h1>
                <div class="form-group mb-3">
                    <label for="name" class="mb-2">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus/>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="mb-2">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus/>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" name="password" class="form-control" required/>

                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="d-grid">
                <button type="submit" class="btn btn-secondary mt-3 mb-3">Create Account</button>
                </div>

                <hr>

                <div class="text-center">
                    <p>Already have an account?
                        <a class="text-decoration-none text-primary mt-3" href="{{ route('log') }}">Login here.</a>
                    </p>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection