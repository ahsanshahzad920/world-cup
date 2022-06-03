@extends('layouts.app')
@section('content')
    <div class="hall-of-fame mb-5">
        <div class="container">
            <h1 class="main-heading light-green-color py-4">Hall of Fame</h1>
            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($tournament as $item)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home{{$item->id}}"
                            type="button" role="tab" aria-controls="home" aria-selected="true">{{$item->name}}</button>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach ($tournament as $item)
                    <div class="tab-pane fade show active" id="home{{$item->id}}" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($point->where('tournament_id',$item->id) as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->participant_name->first_name ?? '' }}
                                            {{ $item->participant_name->last_name ?? '' }}</td>
                                        <td>{{ $item->points ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
