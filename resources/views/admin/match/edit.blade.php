@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Match Points
        </div>

        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('admin.match.update', $match->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tournament_id" value="{{ $match->tournament_id ?? '' }}">
                <input type="hidden" name="group" value="{{ $match->group ?? '' }}">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <b>Select Your Win Team</b>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="radio" name="team_id" value="{{ $match->team1_name->id }}" id=""
                                required>
                            <label for="">{{ $match->team1_name->name }}</label>
                            <img src="{{ asset($match->team1_name->flag ?? '') }}" style="height:50px; width:70px;"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="radio" name="team_id" value="{{ $match->team2_name->id }}" id=""
                                required>
                            <label for="">{{ $match->team2_name->name }}</label>
                            <img src="{{ asset($match->team2_name->flag ?? '') }}" style="height:50px; width:70px;"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="team1">{{ $match->team1_name->name ?? '' }}</label>
                            <div class="row">
                                <input type="number" name="goal1" value="{{ $match->goal1 ?? '' }}" class="form-control"
                                    placeholder="Enter Goals" required>
                                {!! $errors->first('goal1', "<span class='text-danger'>:message</span>") !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="team1">{{ $match->team2_name->name }}</label>
                            <div class="row">
                                <input type="number" name="goal2" class="form-control" value="{{ $match->goal2 ?? '' }}"
                                    placeholder="Enter Goals" required>
                                {!! $errors->first('goal2', "<span class='text-danger'>:message</span>") !!}
                            </div>
                        </div>
                    </div>
                    @if ($match->type != 'league' || $match->type != 'Group Match')
                        <div class="form-group">
                            <input type="checkbox" name="penalty" id="">
                            <label for="team1">Match win by penalty kicks?</label>
                        </div>
                    @endif
                </div>
                <div class="form-group" style="margin-top: 5px;">
                    <button class="btn btn-danger" type="submit">
                        UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
