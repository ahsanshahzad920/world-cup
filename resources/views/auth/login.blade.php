@extends('layouts.app')

@section('content')

    <!--  -->
    <div class="sign-up-form my-5">
        <div class="container">
            <h1 class="text-center main-heading light-green-color py-4">Sign In</h1>
            <div class="col-sm-12 col-md-10-off-set-1 col-lg-8 offset-lg-2">
                <form action="{{ route('login') }}" method="POST" class="p-4">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email or Username<span
                                class="text-danger">*</span></label>
                        <input type="text" placeholder="Email Address or Username" class="form-control" name="email"
                            value="{{ old('email') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password<span class="text-danger">*</span> </label>
                        <input type="password" placeholder="Password" class="form-control" name="password" />

                    </div>
                    
                    <div class="mb-3">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                    <br>
                    <div class="mb-3">
                        Want to join the fun? <a href="{{ route('register') }}">Create an Account</a>
                    </div>
                    {{-- <div class="mb-3">
                        Rules of game <a href="#">click</a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
