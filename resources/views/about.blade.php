
@extends('layouts.app')
@section('content')

<div class="about-sec">
        <div class="overlay"></div>
        <div class="text-center text-sec">
            <h1 class="text-center main-heading text-white py-4">About Us</h1>
            <hr>
            <p class="text-white">
                Our passion for the web mixed with our practical approach is the <br> perfect combination for
                results-driven
                solutions.
            </p>
        </div>
    </div>


    <div class="our-story-sec py-5 mt-0 mt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <img src="./images/about.jpg" class="img-fluid rounded" alt="">
                </div>
                <div class="col-sm-12 col-md-6">
                    <h1 class="main-heading">Our Story</h1>
                    <p>
                        It all started as a hobby, helping others on the weekend, and then side jobs after work. And the
                        rest is history. Starting our business was natural and easy – it comes from our love for the web
                        and
                        assisting others launch or renovate their online presence.
                        <br><br>
                        At our core, we truly enjoy helping others – whether you’re a small business or a digital
                        influencer
                        – because at the end of the day we know that there’ll be a benefit to someone, a group of
                        individual, or even an entire community.
                        <br><br>
                        And let’s be honest, we’re still learning and growing…and any successful business will continue
                        to
                        do so. Our journey is ongoing, and we hope to have the privilege to work with on your digital
                        journey.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="work-with-us mt-0 mt-md-5">
        <h1 class="main-heading text-center">Why Join Futebol Fanatics Platform?</h1>
        <div class="green-bg">
            <div class="container text-center mt-5">
                <div class="row">
                    <div class="col-12 col-md-4 py-5">
                        <h1 class="main-heading">Fun Experience</h1>
                        <p>
                            With your goals in mind" and add instead "An innovative and digital way to keep up with futebol!
                        </p>
                    </div>
                    <div class="col-12 col-md-4 py-5">
                        <h1 class="main-heading">Catch Up</h1>
                        <p>
                            A nice excuse to catch up with friends and have fun at the same time.
                        </p>
                    </div>
                    <div class="col-12 col-md-4 py-5">
                        <h1 class="main-heading">Cost Effective</h1>
                        <p>
                            It's cheap to enter the competion and have fun.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lets-work-togather py-5">
        <div class="overlay"></div>
        <div class="position-absolute">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-around">
                <div class="text-center">
                    <h1 class="main-heading">Become a Futebol Fanatic</h1>
                    <p>Become a futebol fanatic and let's have fun. Signing up is easy!</p>
                </div>
                <div>
                    <a href="/register" class="btn btn-success">Sign Up Now</a>
                </div>
            </div>
        </div>
    </div>


    @endsection