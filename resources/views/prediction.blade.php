@extends('layouts.app')
@section('content')
<div class="my-prediction">
        <div class="container">
            <div class="col-12 col-lg-8 offset-lg-2">
                <h3 class="text-center">World Cup Predicting</h3>
                <hr>
                <div class="card p-3">
                    <img src="./images/fans.jpg" class="img-fluid mb-4" alt="">
                    <h4>Why would you play predict fantasy football?</h4>
                    <p>
                        Watching football is always fun but it’s always better with people. Playing predict fantasy
                        football
                        along with the World Cup will get those around you to love football just as much as you.
                    </p>
                    <h4>How to get involved</h4>
                    <p>Create a profile, invite friends and get predicting. It’s that simple. Anyone can join in so
                        invite
                        your nieces and nephews or your great granny, the more the better as you could actually lose.
                    </p>
                    <h4>Why not take it into work?</h4>
                    <p>
                        Click the "Office Fantasy" button to see how we could tailor a package that would get your
                        workplace
                        bonding in no time.
                    </p>

                    {{-- <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <a href="{{route('register')}}" class="btn btn-primary form-control">Sign Up</a>
                            <div class="text-center">
                                <p class="pt-3">OR</p>
                            </div>
                            <a href="{{route('login')}}" class="btn btn-primary form-control">Sign In</a>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3 mt-3">
                            <a href="{{url('point-table/3')}}" class="btn btn-primary form-control">Prediction</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection