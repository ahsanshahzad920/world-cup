@extends('layouts.app')

@section('content')

<div class="sign-up-form my-5">
        <div class="container">
            <h1 class="text-center main-heading light-green-color py-4">Sign Up</h1>
            <div class="col-sm-12 col-md-10-off-set-1 col-lg-8 offset-lg-2">
            <form action="{{ route('register') }}" method="POST" class="p-4" enctype="multipart/form-data">
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
                    <label for="firstName" class="form-label">Username<span class="text-danger">*</span> </label>
                    <input type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') }}" />
                    
                </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name<span class="text-danger">*</span> </label>
                        <input type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}" />
                        
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name<span class="text-danger">*</span> </label>
                        <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number<span class="text-danger">*</span>
                        </label>
                        <input type="text" placeholder="Phone Number" class="form-control" name="phone" value="{{ old('phone') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address<span
                                class="text-danger">*</span></label>
                                <input type="email" placeholder="Email Address" class="form-control" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Password<span
                                class="text-danger">*</span></label>
                                <input type="password" placeholder="" class="form-control" name="password" value="{{ old('password') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="nickName" class="form-label">Nick Name<span class="text-danger">*</span> </label>
                        <input type="text" placeholder="Nick Name" class="form-control" name="nickname" value="{{ old('nickname') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload an image (optional) – default image will be
                            displayed otherwise</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="whatsAppDiscussion" class="form-label">Do you want to participate in the WhatsApp
                            Discussion throughout the tournament? (Please note that carrier fees may apply dependent on
                            your plan).<span class="text-danger">*</span></label>
                        <input type="radio" name="whatsAppDiscussion" value="yes"> Yes
                        <input type="radio" name="whatsAppDiscussion" value="no" class="ms-3"> No
                    </div>
                    <div class="mb-3">
                        <label for="termsAndConditions" class="form-label">Agree to <a href="/term-condition">Terms & Conditions</a>
                            (if “no” submission is cancelled.)<span class="text-danger">*</span></label><br>
                        <input type="radio" name="termsAndConditions" value="yes" > Yes
                        <input type="radio" name="termsAndConditions" value="no" class="ms-3"> No
                    </div>
                    <button type="submit" class="btn btn-success">Create Account</button>
                    <div class="mb-3">
                        Already Register? <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection