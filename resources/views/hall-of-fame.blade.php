@extends('layouts.app')
@section('content')
<div class="hall-of-fame mb-5">
        <div class="container">
            <h1 class="main-heading light-green-color py-4">Hall of Fame</h1>
            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">World Cup 2014</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">World Cup
                            2018</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Alex Demiral</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        Alex Pallchisaca</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Brian Gilika</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        Daniel Weber</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>
                                        Daniel Weber</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Alex Demiral</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        Alex Pallchisaca</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Brian Gilika</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        Daniel Weber</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>
                                        Daniel Weber</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
 @endsection   