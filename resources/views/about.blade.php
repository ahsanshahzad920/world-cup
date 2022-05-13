@php
    $data = content();
@endphp
@extends('layouts.app')
@section('content')

<div class="about-sec" style="background-image: url({{asset($data['#about_us']['image']??'../images/about-us-banner.jpg')}});">
        <div class="overlay"></div>
        <div class="text-center text-sec">
            <h1 class="text-center main-heading text-white py-4">{{$data['#about_us']['heading']??''}}</h1>
            <hr>
            <p class="text-white">
                {!!$data['#about_us']['description']??''!!}
            </p>
        </div>
    </div>


    <div class="our-story-sec py-5 mt-0 mt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <img src="{{asset($data['#story']['image']??'images/about.jpg')}}" class="img-fluid rounded" alt="">
                </div>
                <div class="col-sm-12 col-md-6">
                    <h1 class="main-heading">{{$data['#story']['heading']??''}}</h1>
                    <p>
                        {!!$data['#story']['description']??''!!}
                        
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="work-with-us mt-0 mt-md-5">
        <h1 class="main-heading text-center">{{$data['#about_why']['heading']??''}}</h1>
        <div class="green-bg">
            <div class="container text-center mt-5">
                <div class="row">
                    <div class="col-12 col-md-4 py-5">
                        <h1 class="main-heading">{{$data['#fun_experience']['heading']??''}}</h1>
                        <p>
                            {!!$data['#fun_experience']['description']??''!!}
                        </p>
                    </div>
                    <div class="col-12 col-md-4 py-5">
                        <h1 class="main-heading">{{$data['#catch_up']['heading']??''}}</h1>
                        <p>
                            {!!$data['#catch_up']['description']??''!!}
                        </p>
                    </div>
                    <div class="col-12 col-md-4 py-5">
                        <h1 class="main-heading">{{$data['#cost_effective']['heading']??''}}</h1>
                        <p>
                            {!!$data['#cost_effective']['description']??''!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lets-work-togather py-5" style="background-image: url({{asset($data['#become']['image']??'../images/futebol-fanatic.jpg')}});">
        <div class="overlay"></div>
        <div class="position-absolute">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-around">
                <div class="text-center">
                    <h1 class="main-heading">{{$data['#become']['heading']??''}}</h1>
                    <p>{!!$data['#become']['description']??''!!}</p>
                </div>
                <div>
                    <a href="{{route('register')}}" class="btn btn-success">Sign Up Now</a>
                </div>
            </div>
        </div>
    </div>


    @endsection