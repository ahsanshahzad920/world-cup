@extends('layouts.app')
@section('content')
    <div class="matches-sec my-5">
        <div class="container">
            <h1 class="main-heading light-green-color">Matches</h1>
            <br>
            <table class="table table-striped my-4">
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
                            <td>{{ date('d M Y', strtotime($item->date)) ?? '' }} {{ $item->time ?? '' }}</td>
                            <td>{{$item->ground??''}}</td>
                            <td><img src="{{ asset($item->team1_name->flag ?? '') }}" alt="">
                                {{ $item->team1_name->name ?? '' }}</td>
                            <td> <img src="{{ asset($item->team2_name->flag ?? '') }}" alt="">
                                {{ $item->team2_name->name ?? '' }}</td>
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
        </div>
    </div>
@endsection
