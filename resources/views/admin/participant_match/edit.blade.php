@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Participant Match
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.participant-match.update", [$match->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label class="required" for="tournament_id">Tournament</label>
                    <select name="tournament_id" class="form-control" id="" required>
                        @foreach ($tournament as $item)
                            <option value="{{ $item->id ?? '' }}" {{($match->tournament_id==$item->id)?'selected':''}}>{{ $item->name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('tournament_id', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="team1_id">Team 1</label>
                    <select name="team1_id" class="form-control" id="" required>
                        @foreach ($team as $item)
                            <option value="{{ $item->id ?? '' }}" {{($match->team1_id==$item->id)?'selected':''}}>{{ $item->name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('team1_id', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="team2_id">Team 2</label>
                    <select name="team2_id" class="form-control" id="" required>
                        @foreach ($team as $item)
                            <option value="{{ $item->id ?? '' }}" {{($match->team2_id==$item->id)?'selected':''}}>{{ $item->name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('team2_id', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group col-6">
                    <label class="required" for="participant_id">Participant</label>
                    <select name="participant_id" class="form-control" id="" required>
                        @foreach ($participant as $item)
                            <option value="{{ $item->id ?? '' }}" {{($match->participant_id==$item->id)?'selected':''}}>{{ $item->first_name ?? '' }} {{ $item->last_name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('participant_id', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="group">Match Type</label>
                    <select name="type" class="form-control" id="">
                        {{-- <option value="Group Match">Group Match</option>
                        <option value="Round of 16">Round of 16</option> --}}
                        <option value="Quater Final">Quater Final</option>
                        <option value="Semifinal">Semifinal</option>
                        <option value="Third Place">3rd place Match</option>
                        <option value="Final">Final</option>
                    </select>
                    {!! $errors->first('type', "<span class='text-danger'>:message</span>") !!}
                </div>
            </div>
            
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        
        </form>
    </div>
</div>



@endsection