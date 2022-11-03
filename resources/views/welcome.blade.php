@php
    $data = content();
@endphp
@extends('layouts.app')
@section('style')
<style>
    .timeline-TweetList {
            display:inline-flex;   
        }
        .customisable-border{
            float: left;
        }
</style>
@endsection
@section('content')
<div class="time-counter-sec text-white">
        <div class="container py-5">
            <h1 class="text-center main-heading ">{{$data['#top_counter']['heading']??''}}</h1>
            <h4 class="text-center" id="countDown"></h4>
        </div>
    </div>

    <div class="carousel-sec">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($slider as $loop=>$item)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img src="{{$item->image??''}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{$item->heading??''}}</h3>
                        <p>{!!$item->description??''!!}</p>
                        <a href="{{url($item->link??'')}}" class="btn btn-success px-4 mb-4">Join Now</a>
                    </div>
                </div>
                @endforeach
                {{-- <div class="carousel-item">
                    <img src="{{asset('images/banner-2.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>What is Futebol Fanatics Platform (FFP)?</h3>
                        <p>Get to know us, our rules and how to play – and be ready to be amazed!</p>
                        <a href="#" class="btn btn-success px-4 mb-4">Learn More</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/banner-3.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Contact Us</h3>
                        <p>Reach out for of any questions you have, or if you simply want to share your amazing idea to
                            make this platform even better. </p>
                        <a href="#" class="btn btn-success px-4 mb-4">Get In Touch </a>
                    </div>
                </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="fantasy-coccer-sec mt-5">
        <div class="container">
            <h3>{{$data['#home_service']['heading']??''}}</h3>
            <hr>
            <div class="row bg-gray">
                @foreach ($service->take(3) as $item)
                <div class="col-12 col-lg-4 px-3 px-lg-4 py-4">
                    <i class="{{$item->icon??''}} fa-2x text-success mb-3"></i>
                    <h5>{{$item->name??''}}</h5>
                    <p>
                        {!!$item->description??''!!}
                    </p>
                    <a href="{{route('login')}}" class="btn btn-success">Login »</a>
                </div>
                    
                @endforeach
                {{-- <div class="col-12 col-lg-4 px-3 px-lg-4 py-4">
                    <i class="fa fa-group fa-2x text-success mb-3"></i>
                    <h5>Play with friends</h5>
                    <p>
                        Play individually against the rest of USA, or invite your friends to your league and play
                        against each other
                    </p>
                    <a href="{{route('login')}}" class="btn btn-success">Organise Leaguage »</a>
                </div>
                <div class="col-12 col-lg-4 px-3 px-lg-4 py-4">
                    <i class="fa fa-server fa-2x text-success mb-3"></i>
                    <h5>Predict matches</h5>
                    <p>
                        You predict the match results, we keep track of the scores and rankings for you!
                    </p>
                    <a href="#" class="btn btn-success">My Prediction »</a>
                </div> --}}
            </div>
        </div>
    </div>
    @auth
    @if(Auth()->user()->permission==1)
    <div class="my-prediction mt-5">
        <div class="container">
            <h3>{{$data['#home_ranking']['heading']??''}}</h3>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                    <a href="#" class="gray-color" style="color: #6c757d;text-decoration: none;">
                        <div class="card p-3">
                            <div class="position-relative">
                                <img src="{{asset($data['#home_ranking_detail']['image']??'')}}" class="img-fluid mb-4" alt="">
                            </div>
                            <h4>{{$data['#home_ranking_detail']['heading']??''}}</h4>
                            <p>
                                {!!$data['#home_ranking_detail']['description']??''!!}
                            </p>
                            <a href="#" class="btn btn-success">Get Football Fantasy »</a>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                    <h3>Participant Ranking</h3>
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($point as $index=> $item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->touranament??''}}</td>
                                <td>{{$item->first_name??''}} {{$item->last_name??''}}</td>
                                <td>{{$item->points??''}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <a href="{{url('all-ranking')}}" class="btn btn-success">All rankings »</a>
                </div>
                <div class="col-12 col-lg-12 mb-5">
                    <h3>Matches</h3>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Stadium</th>
                            <th scope="col">Team 1</th>
                            <th scope="col">Team 2</th>
                            <th scope="col">Type</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($world_cup as $index=> $item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{date('d M Y', strtotime($item->date))??''}} {{$item->time??''}}</td>
                                <td>{{$item->ground??''}}</td>
                                <td><img src="{{asset($item->team1_name->flag??'')}}" alt=""> {{$item->team1_name->name??''}}</td>
                                <td> <img src="{{asset($item->team2_name->flag??'')}}" alt=""> {{$item->team2_name->name??''}}</td>
                                @if($item->type=='league')
                                <td>Group Match</td>
                                @else
                                <td>{{$item->type??''}}</td>
                                @endif

                                <td>
                                @if($item->goal1>0 ||$item->goal2>0 )
                                {{$item->goal1}}-{{$item->goal2}}
                                @else
                                TBD
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <a href="{{url('point-table/3')}}" class="btn btn-success">All Matches »</a> -->
                    <a href="{{url('matches')}}" class="btn btn-success">All Matches »</a> 
                </div>
                <!-- <div class="col-12 col-lg-6 mb-5">
                    <h3>Ranking / Best league</h3>
                    <table class="table table-striped">
                        <tbody>
                            @foreach ($point as $index=> $item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->participant_name->first_name??''}} {{$item->participant_name->last_name??''}}</td>
                                <td>{{$item->points??''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{url('point/3')}}" class="btn btn-success">All Rankings »</a>
                </div> -->
            </div>
        </div>
    </div>
    @endif
    @endauth
    

    <div class="ussoccer-sec mt-5">
        <div class="container" style="height: 600px; overflow-y: scroll;">
            <div class="row">
                <div class="col-md-12">
                    <a class="twitter-timeline" href="https://twitter.com/ussoccer?ref_src=twsrc%5Etfw">Tweets by ussoccer</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
            {{-- <h3><i class="fa fa-twitter"></i> @ussoccer</h3>
            <div class="row">
                @foreach ($blog as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    
                    <div class="card mt-3 p-2">
                        <div class="card-img">
                            @if ($item->image!=null)
                                
                            <img src="{{asset($item->image)}}" class="img-fluid" alt="">
                            @endif
                            <div class="d-flex mt-3">
                                <div>
                                    <img src="{{asset($item->author_image)}}" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <a href="#"><b>{{$item->author??''}}</b></a>
                                    <p>{{$item->created_at->diffForHumans()}}</p>
                                </div>
                            </div>
                            <p>
                                {!!$item->description??''!!}
                            </p>

                        </div>
                    </div>
                </div>
                @endforeach
                
            </div> --}}
        </div>
    </div>
@endsection
