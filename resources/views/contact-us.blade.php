@php
    $data = content();
@endphp
@extends('layouts.app')
@section('content')
<div class="about-sec" style="background-image: url({{asset($data['#contact_us']['image']??'../images/about-us-banner.jpg')}});">
        <div class="overlay"></div>
        <div class="text-center text-sec">
            <h1 class="text-center main-heading text-white py-4">{{$data['#contact_us']['heading']??''}}</h1>
            <hr>
            <p class="text-white">
                {!!$data['#contact_us']['description']??''!!}
            </p>
        </div>
    </div>

    <div class="chat-with-us mt-5">
        <div class="container">
            <h1 class="main-heading light-green-color">{{$data['#online']['heading']??''}}</h1>
            <p>
                {!!$data['#online']['description']??''!!}
            </p>

            <div class="row">
                <div class="col-12 col-md-6 pt-5">
                    <div class="d-flex">
                        <div class="pe-3">
                            <img src="{{asset($data['#email']['image']??'images/Email.png')}}" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5>{{$data['#email']['heading']??''}}</h5>
                            <a href="mail:{!!$data['#email']['description']??'#'!!}">{!!$data['#email']['description']??''!!}</a>
                        </div>
                    </div>
                    <br><br>
                    <div class="d-flex">
                        <div class="pe-3">
                            <img src="{{asset($data['#whatsapp']['image']??'images/Customer-Service.png')}}" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5>{{$data['#whatsapp']['heading']??''}}</h5>
                            <a href="tel:{!!$data['#whatsapp']['description']??'#'!!}">{!!$data['#whatsapp']['description']??'#'!!}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="{{asset($data['#online']['image']??'images/contact.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form py-5">
        <div class="container">
            <div class="text-center">
                <h1 class="main-heading pt-4">{{$data['#dropup']['heading']??''}}</h1>
                <p>{!!$data['#dropup']['description']??''!!}</p>
            </div>
            <div class="col-sm-12 col-md-10-off-set-1 col-lg-8 offset-lg-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                 @endif
                <form action="{{url('message_send')}}" method="POST" class="p-4" id="contactForm" data-toggle="validator">
                    @csrf    
        
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" placeholder="Entyer your Name" aria-describedby="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address<span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter your E-Mial" name="email" required aria-describedby="emailAddress" required>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Select from the following options<span class="text-danger">*</span> </label>
                        <select name="options" class="form-control" required id="">
                            <option value="General Questions">General Questions</option>
                            <option value="Interested in being a Sponsor">Interested in being a Sponsor</option>
                            <option value="Technical Issues">Technical Issues</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Your Comments</label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="6"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success px-5">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection    