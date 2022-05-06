@extends('layouts.app')
@section('content')
<div class="time-counter-sec text-white">
        <div class="container py-5">
            <h1 class="text-center main-heading ">Get Ready for FIFA World Cup Qatar 2022</h1>
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
                <div class="carousel-item active">
                    <img src="./images/banner-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Become a Futebol Fanatic!</h3>
                        <p>Take your World Cup experience to the next level, and participate in our digital and
                            fun-filled competition.</p>
                        <a href="./signin.html" class="btn btn-success px-4 mb-4">Join Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/banner-2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>What is Futebol Fanatics Platform (FFP)?</h3>
                        <p>Get to know us, our rules and how to play – and be ready to be amazed!</p>
                        <a href="./how-to-play-and-guidlines.html" class="btn btn-success px-4 mb-4">Learn More</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/banner-3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Contact Us</h3>
                        <p>Reach out for of any questions you have, or if you simply want to share your amazing idea to
                            make this platform even better. </p>
                        <a href="./contact.html" class="btn btn-success px-4 mb-4">Get In Touch </a>
                    </div>
                </div>
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
            <h3>Fantasy Soccer World Cup 2022</h3>
            <hr>
            <div class="row bg-gray">
                <div class="col-12 col-lg-4 px-3 px-lg-4 py-4">
                    <i class="fa fa-soccer-ball-o fa-2x text-success mb-3"></i>
                    <h5>Fantasy Soccer</h5>
                    <p>
                        Organising a fantasy football league for World Cup 2022 is easy
                    </p>
                    <a href="./signin.html" class="btn btn-success">Login »</a>
                </div>
                <div class="col-12 col-lg-4 px-3 px-lg-4 py-4">
                    <i class="fa fa-group fa-2x text-success mb-3"></i>
                    <h5>Play with friends</h5>
                    <p>
                        Play individually against the rest of USA, or invite your friends to your league and play
                        against each other
                    </p>
                    <a href="./signin.html" class="btn btn-success">Organise Leaguage »</a>
                </div>
                <div class="col-12 col-lg-4 px-3 px-lg-4 py-4">
                    <i class="fa fa-server fa-2x text-success mb-3"></i>
                    <h5>Predict matches</h5>
                    <p>
                        You predict the match results, we keep track of the scores and rankings for you!
                    </p>
                    <a href="./my-prediction.html" class="btn btn-success">My Prediction »</a>
                </div>
            </div>
        </div>
    </div>

    <div class="my-prediction mt-5">
        <div class="container">
            <h3>Fantasy Soccer World Cup 2022</h3>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                    <a href="#" class="gray-color" style="color: #6c757d;text-decoration: none;">
                        <div class="card p-3">
                            <div class="position-relative">
                                <img src="./images/fans.jpg" class="img-fluid mb-4" alt="">
                            </div>
                            <h4>A Fantasy Soccer for your office?</h4>
                            <p>
                                Do you want an exclusive Fantasy Soccer for your company? That's possible! With a office
                                fantasy you can make your pool as exclusive as you want. Add the colors and logo of your
                                company, invite your colleagues and let them predict. To make things more fun, let teams
                                and
                                departments compete against each other for great prizes!
                            </p>
                            <a href="#" class="btn btn-success">Get Football Fantasy »</a>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                    <h3>Ranking / Individual</h3>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bekithemba</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Black Mamba</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>BOBO</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Cyl</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="btn btn-success">All rankings »</a>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                    <h3>Matches</h3>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>21-11 15h</td>
                                <td><img src="./images/flag.jpg" alt=""> QAT</td>
                                <td> <img src="./images/flag.jpg" alt=""> A2</td>
                                <td><a href="./matche-number.html">NS</a></td>
                            </tr>
                            <tr>
                                <td>21-11 15h</td>
                                <td><img src="./images/flag.jpg" alt=""> QAT</td>
                                <td> <img src="./images/flag.jpg" alt=""> A2</td>
                                <td><a href="./matche-number.html">NS</a></td>
                            </tr>
                            <tr>
                                <td>21-11 15h</td>
                                <td><img src="./images/flag.jpg" alt=""> QAT</td>
                                <td> <img src="./images/flag.jpg" alt=""> A2</td>
                                <td><a href="./matche-number.html">NS</a></td>
                            </tr>
                            <tr>
                                <td>21-11 15h</td>
                                <td><img src="./images/flag.jpg" alt=""> QAT</td>
                                <td> <img src="./images/flag.jpg" alt=""> A2</td>
                                <td><a href="./matche-number.html">NS</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="btn btn-success">All rankings »</a>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                    <h3>Ranking / Best league</h3>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Pitch, betta recognize!</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>test</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="btn btn-success">All rankings »</a>
                </div>
            </div>
        </div>
    </div>

    

    <div class="ussoccer-sec mt-5">
        <div class="container">
            <h3><i class="fa fa-twitter"></i> @ussoccer</h3>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card p-2">
                        <div class="d-flex">
                            <div>
                                <img src="./images/ussoccer.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <a href="#"><b>@ussoccer</b></a>
                                <p>01-04-2022, 23:05</p>
                            </div>
                        </div>
                        <p>
                            #RamadanMubarak to everyone celebrating in our soccer community and around the world!
                            <br>
                            Wishing you a blessed month.
                        </p>
                    </div>

                    <div class="card mt-3 p-2">
                        <div class="card-img">
                            <img src="./images/ussoccer-1.png" class="img-fluid" alt="">
                            <div class="d-flex mt-3">
                                <div>
                                    <img src="./images/ussoccer.jpg" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <a href="#"><b>@ussoccer</b></a>
                                    <p>01-04-2022, 23:05</p>
                                </div>
                            </div>
                            <p>
                                #RamadanMubarak to everyone celebrating in our soccer community and around the world!
                                <br>
                                Wishing you a blessed month.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card p-2">
                        <div class="d-flex">
                            <div>
                                <img src="./images/ussoccer.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <a href="#"><b>@ussoccer</b></a>
                                <p>01-04-2022, 23:05</p>
                            </div>
                        </div>
                        <p>
                            #RamadanMubarak to everyone celebrating in our soccer community and around the world!
                            <br>
                            Wishing you a blessed month.
                        </p>
                    </div>

                    <div class="card mt-3 p-2">
                        <div class="card-img">
                            <img src="./images/ussoccer-2.png" class="img-fluid" alt="">
                            <div class="d-flex mt-3">
                                <div>
                                    <img src="./images/ussoccer.jpg" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <a href="#"><b>@ussoccer</b></a>
                                    <p>01-04-2022, 23:05</p>
                                </div>
                            </div>
                            <p>
                                #RamadanMubarak to everyone celebrating in our soccer community and around the world!
                                <br>
                                Wishing you a blessed month.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card p-2">
                        <div class="d-flex">
                            <div>
                                <img src="./images/ussoccer.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <a href="#"><b>@ussoccer</b></a>
                                <p>01-04-2022, 23:05</p>
                            </div>
                        </div>
                        <p>
                            #RamadanMubarak to everyone celebrating in our soccer community and around the world!
                            <br>
                            Wishing you a blessed month.
                        </p>
                    </div>

                    <div class="card mt-3 p-2">
                        <div class="card-img">
                            <img src="./images/ussoccer-3.png" class="img-fluid" alt="">
                            <div class="d-flex mt-3">
                                <div>
                                    <img src="./images/ussoccer.jpg" class="img-fluid" alt="">
                                </div>
                                <div>
                                    <a href="#"><b>@ussoccer</b></a>
                                    <p>01-04-2022, 23:05</p>
                                </div>
                            </div>
                            <p>
                                #RamadanMubarak to everyone celebrating in our soccer community and around the world!
                                <br>
                                Wishing you a blessed month.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
