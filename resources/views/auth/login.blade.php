@extends('layouts.app')

@section('content')

    {{-- <form action="{{ route('login') }}" method="POST">
    @csrf
    <a href="/" class="ad-auth-logo">
        <h4 class="text-center">TRAMEC</h4>
      <!--   <img src="dash-assets/images/logo2.png" alt="" /> -->
    </a>
    <h2><span class="primary">Hello,</span>Welcome!</h2>
    <p>Please Enter Your Details Below to Continue</p>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="ad-auth-form">
        <div class="ad-auth-feilds mb-30">
            <input type="text" placeholder="Email Address" class="ad-input" name="email"  value="{{ old('email') }}" />
            <div class="ad-auth-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 483.3 483.3"><path d="M424.3,57.75H59.1c-32.6,0-59.1,26.5-59.1,59.1v249.6c0,32.6,26.5,59.1,59.1,59.1h365.1c32.6,0,59.1-26.5,59.1-59.1    v-249.5C483.4,84.35,456.9,57.75,424.3,57.75z M456.4,366.45c0,17.7-14.4,32.1-32.1,32.1H59.1c-17.7,0-32.1-14.4-32.1-32.1v-249.5    c0-17.7,14.4-32.1,32.1-32.1h365.1c17.7,0,32.1,14.4,32.1,32.1v249.5H456.4z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path><path d="M304.8,238.55l118.2-106c5.5-5,6-13.5,1-19.1c-5-5.5-13.5-6-19.1-1l-163,146.3l-31.8-28.4c-0.1-0.1-0.2-0.2-0.2-0.3    c-0.7-0.7-1.4-1.3-2.2-1.9L78.3,112.35c-5.6-5-14.1-4.5-19.1,1.1c-5,5.6-4.5,14.1,1.1,19.1l119.6,106.9L60.8,350.95    c-5.4,5.1-5.7,13.6-0.6,19.1c2.7,2.8,6.3,4.3,9.9,4.3c3.3,0,6.6-1.2,9.2-3.6l120.9-113.1l32.8,29.3c2.6,2.3,5.8,3.4,9,3.4    c3.2,0,6.5-1.2,9-3.5l33.7-30.2l120.2,114.2c2.6,2.5,6,3.7,9.3,3.7c3.6,0,7.1-1.4,9.8-4.2c5.1-5.4,4.9-14-0.5-19.1L304.8,238.55z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path></svg>
            </div>
        </div>
        <div class="ad-auth-feilds">
            <input type="password" placeholder="Password" class="ad-input" name="password" />
            <div class="ad-auth-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 482.8 482.8"><path d="M395.95,210.4h-7.1v-62.9c0-81.3-66.1-147.5-147.5-147.5c-81.3,0-147.5,66.1-147.5,147.5c0,7.5,6,13.5,13.5,13.5    s13.5-6,13.5-13.5c0-66.4,54-120.5,120.5-120.5c66.4,0,120.5,54,120.5,120.5v62.9h-275c-14.4,0-26.1,11.7-26.1,26.1v168.1    c0,43.1,35.1,78.2,78.2,78.2h204.9c43.1,0,78.2-35.1,78.2-78.2V236.5C422.05,222.1,410.35,210.4,395.95,210.4z M395.05,404.6    c0,28.2-22.9,51.2-51.2,51.2h-204.8c-28.2,0-51.2-22.9-51.2-51.2V237.4h307.2L395.05,404.6L395.05,404.6z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path><path d="M241.45,399.1c27.9,0,50.5-22.7,50.5-50.5c0-27.9-22.7-50.5-50.5-50.5c-27.9,0-50.5,22.7-50.5,50.5    S213.55,399.1,241.45,399.1z M241.45,325c13,0,23.5,10.6,23.5,23.5s-10.5,23.6-23.5,23.6s-23.5-10.6-23.5-23.5    S228.45,325,241.45,325z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#9abeed"></path></svg>
            </div>
        </div>
    </div>
    <div class="ad-auth-form">
    {!! NoCaptcha::renderJs() !!}
    {!! NoCaptcha::display() !!}
    </div>
    <div class="ad-other-feilds">
        <div class="ad-checkbox">
            <label>
            <input type="checkbox" name="remeber" class="ad-checkbox">
            <span>Remember Me</span>
            </label>
        </div>
        <a class="forgot-pws-btn" href="{{ route('password.request') }}">Forgot Password?</a>
    </div>
    
    <div class="ad-auth-btn">
        <input type="submit" class="btn btn-primary" value="Login" />
    </div>
    <p class="ad-register-text">Don't have an account? <a href="{{ route('register') }}">Click Here</a></p>
</form> --}}

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
                        if you new? <a href="{{ route('register') }}">Create</a>
                    </div>
                    <div class="mb-3">
                        Rules of game <a href="#">click</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
