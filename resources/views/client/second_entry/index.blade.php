@extends('layouts.admin')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Matches Round of 16
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                #
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
                        @foreach ($match->where('type', 'Round of 16') as $index => $item)
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
                                    {{ $item->team1_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team1_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team2_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $point->win_name->name ?? '' }}
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
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    Prediction
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('client.secondPredition.store') }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <input type="hidden" name="tournament_id"
                                                                            value="{{ $item->tournament_id ?? '' }}">
                                                                        <input type="hidden" name="match_id"
                                                                            value="{{ $item->id ?? '' }}">
                                                                        <input type="hidden" name="type"
                                                                            value="Round of 16">
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
                                                                                <input type="number" required name="goal1"
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
                                                                                <input type="number" required name="goal2"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">if penalty?</label>
                                                                                <input type="checkbox" name="penalty">
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
                                    @can('match_delete')
                                        <form action="{{ route('admin.match.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Matches Quarter Final
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                #
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
                        @foreach ($quarter as $index => $item)
                            @php
                                $point = $predition
                                    ->where('participant_id', Auth()->user()->id)
                                    ->where('sr', $item->sr)
                                    ->where('type', 'Quater Final')
                                    ->first();
                            @endphp
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->team1_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team1_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team2_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $point->win_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->point ?? '0' }}
                                </td>
                                <td>
                                    @if ($item->win_id == null)
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
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                Prediction
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('client.secondPredition.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <input type="hidden" name="tournament_id"
                                                                        value="{{ $item->tournament_id ?? '' }}">
                                                                    <input type="hidden" name="sr"
                                                                        value="{{ $item->sr ?? '' }}">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id ?? '' }}">
                                                                    <input type="hidden" name="type"
                                                                        value="Quater Final">
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
                                                                            <input type="number" required name="goal1"
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
                                                                            <input type="number" required name="goal2"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">if penalty?</label>
                                                                            <input type="checkbox" name="penalty">
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
                                    @can('match_delete')
                                        <form action="{{ route('admin.match.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Matches Semifinal
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                #
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
                        @foreach ($semi as $index => $item)
                            @php
                                $point = $predition
                                    ->where('participant_id', Auth()->user()->id)
                                    ->where('sr', $item->sr)
                                    ->where('type', 'Semifinal')
                                    ->first();
                            @endphp
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->team1_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team1_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team2_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $point->win_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->point ?? '0' }}
                                </td>
                                <td>
                                    @if ($item->win_id == null)
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
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                Prediction
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('client.secondPredition.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <input type="hidden" name="tournament_id"
                                                                        value="{{ $item->tournament_id ?? '' }}">
                                                                    <input type="hidden" name="sr"
                                                                        value="{{ $item->sr ?? '' }}">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id ?? '' }}">
                                                                    <input type="hidden" name="type" value="Semifinal">
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
                                                                            <input type="number" required name="goal1"
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
                                                                            <input type="number" required name="goal2"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">if penalty?</label>
                                                                            <input type="checkbox" name="penalty">
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
                                    @can('match_delete')
                                        <form action="{{ route('admin.match.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Matches Third Place
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                #
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
                        @foreach ($third as $index => $item)
                            @php
                                $point = $predition
                                    ->where('participant_id', Auth()->user()->id)
                                    ->where('sr', $item->sr)
                                    ->where('type', 'Third Place')
                                    ->first();
                            @endphp
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->team1_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team1_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team2_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $point->win_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->point ?? '0' }}
                                </td>
                                <td>
                                    @if ($item->win_id == null)
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
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                Prediction
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('client.secondPredition.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <input type="hidden" name="tournament_id"
                                                                        value="{{ $item->tournament_id ?? '' }}">
                                                                    <input type="hidden" name="sr" value="1">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id ?? '' }}">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="type"
                                                                            value="Third Place">
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
                                                                            <input type="number" required name="goal1"
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
                                                                            <input type="number" required name="goal2"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">if penalty?</label>
                                                                            <input type="checkbox" name="penalty">
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
                                    @can('match_delete')
                                        <form action="{{ route('admin.match.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Matches Final
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                #
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
                        @foreach ($final as $index => $item)
                            @php
                                $point = $predition
                                    ->where('participant_id', Auth()->user()->id)
                                    ->where('sr', $item->sr)
                                    ->where('type', 'Final')
                                    ->first();
                            @endphp
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->team1_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team1_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $point->team2_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $point->win_name->name ?? '' }}
                                </td>
                                <td>

                                    {{ $point->point ?? '0' }}
                                </td>
                                <td>
                                    @if ($item->win_id == null)
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
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                Prediction
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('client.secondPredition.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <input type="hidden" name="tournament_id"
                                                                        value="{{ $item->tournament_id ?? '' }}">
                                                                    <input type="hidden" name="sr"
                                                                        value="{{ $item->sr ?? '' }}">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id ?? '' }}">
                                                                    <input type="hidden" name="type" value="Final">
                                                                    <div class="col-md-12">
                                                                        <b>Select Your Win Team</b>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input type="radio" name="team_id"
                                                                                value="{{ $item->team1_name->id ?? '' }}"
                                                                                id="" required>
                                                                            <label
                                                                                for="">{{ $item->team1_name->name ?? '' }}</label>
                                                                            <img src="{{ asset($item->team1_name->flag ?? '') }}"
                                                                                style="height:50px; width:70px;"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Goals</label>
                                                                            <input type="number" required name="goal1"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <input type="radio" name="team_id"
                                                                                value="{{ $item->team2_name->id ?? '' }}"
                                                                                id="" required>
                                                                            <label
                                                                                for="">{{ $item->team2_name->name ?? '' }}</label>
                                                                            <img src="{{ asset($item->team2_name->flag ?? '') }}"
                                                                                style="height:50px; width:70px;"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Goals</label>
                                                                            <input type="number" required name="goal2"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">if penalty?</label>
                                                                            <input type="checkbox" name="penalty">
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
                                    @can('match_delete')
                                        <form action="{{ route('admin.match.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
