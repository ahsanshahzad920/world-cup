@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Group Matches
            @if ($match->count() == $predition->where('participant_id', Auth()->user()->id)->count())
                <button class="btn btn-primary" data-toggle="modal" data-target="#winner">World Cup Winner</button>
            @endif
        </div>

        <div class="card-body">
            @php
                                $winner = $predition
                                    ->where('participant_id', Auth()->user()->id)
                                    ->where('match_id', null)
                                    ->first();
                            @endphp
            @if($winner!=null)
            <h4>Your World Cup Winner Team is <img src="{{asset($winner->win_name->flag??'')}}" style="width: 40px;" alt=""> {{$winner->win_name->name??''}}.</h4>
            @endif
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Tournament
                            </th>
                            <th>
                                Team 1
                            </th>
                            <th>
                                Goals
                            </th>
                            <th>
                                Team 2
                            </th>
                            <th>
                                Goals
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Win
                            </th>
                            <th>
                                Points
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($match as $index => $item)
                            @php
                                $point = $predition
                                    ->where('participant_id', Auth()->user()->id)
                                    ->where('match_id', $item->id)
                                    ->first();
                            @endphp
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->tournament_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team1_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->goal1 ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->goal2 ?? '' }}
                                </td>
                                <td>
                                    {{ $item->date ?? '' }}
                                </td>
                                <td>
                                    {{ $item->win_name->name ?? '' }}
                                </td>
                                <td>

                                    {{ $point->point ?? '0' }}
                                </td>
                                <td>
                                    @if ($item->win == null)
                                        @if ($predition->where('participant_id', Auth()->user()->id)->where('match_id', $item->id)->count() < 1)
                                            @can('participant_prediction_create')
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#model{{ $item->id ?? '' }}">
                                                    Prediction
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="model{{ $item->id ?? '' }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Prediction
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('client.Predition.store') }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <input type="hidden" name="tournament_id"
                                                                            value="{{ $item->tournament_id ?? '' }}">
                                                                        <input type="hidden" name="match_id"
                                                                            value="{{ $item->id ?? '' }}">
                                                                        <div class="col-md-12">
                                                                            <b>Select Your Win Team</b>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input type="radio" name="team_id"
                                                                                    value="{{ $item->team1_name->id }}"
                                                                                    id="" required>
                                                                                <label
                                                                                    for="">{{ $item->team1_name->name }}</label>
                                                                                <img src="{{ asset($item->team1_name->flag ?? '') }}"
                                                                                    style="height:50px; width:70px;"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Goals</label>
                                                                                <input type="number" required name="team1_goal"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <input type="radio" name="team_id"
                                                                                    value="{{ $item->team2_name->id }}"
                                                                                    id="" required>
                                                                                <label
                                                                                    for="">{{ $item->team2_name->name }}</label>
                                                                                <img src="{{ asset($item->team2_name->flag ?? '') }}"
                                                                                    style="height:50px; width:70px;"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Goals</label>
                                                                                <input type="number" required name="team2_goal"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                        @endif
                                    @endif

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="winner" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">World Cup Winner Predition
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('world-cup-winner') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Winner Team</label>
                                        <select name="team" class="form-control" id="">
                                            @foreach ($team as $item)
                                                <option value="{{ $item->id }}">{{ $item->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
