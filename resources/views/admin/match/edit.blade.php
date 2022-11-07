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
        <form method="POST" action="{{ route("admin.match.update",$match->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tournament_id" value="{{$match->tournament_id??''}}">
            <input type="hidden" name="group" value="{{$match->group??''}}">
            <div class="form-group">
                <label class="required" for="team1">{{$match->team1_name->name??''}}</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="goal1" value="{{$match->goal1??''}}" class="form-control" placeholder="Enter Goals" required>
                        {!!$errors->first("goal1", "<span class='text-danger'>:message</span>")!!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="team1">{{$match->team2_name->name}}</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="goal2" class="form-control" value="{{$match->goal2??''}}" placeholder="Enter Goals" required>
                        {!!$errors->first("goal2", "<span class='text-danger'>:message</span>")!!}
                    </div>
                </div>
            </div>
            @if($match->type!="league"||$match->type!="Group Match")
            <div class="form-group">
                <input type="checkbox" name="penalty" id="">
                <label  for="team1">Match win by penalty kicks?</label>
            </div>
            @endif
            <div class="form-group" style="margin-top: 5px;">
                <button class="btn btn-danger" type="submit">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
</div>



@endsection