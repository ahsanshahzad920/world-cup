@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Match Points
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.match.update",$group->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$group->tournament_id??''}}">
            <div class="form-group">
                <label class="required" for="team1">{{$group->team1_name->name??''}}</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="goal1" value="{{$group->goal1??''}}" class="form-control" placeholder="Enter Goals" required>
                        {!!$errors->first("goal1", "<span class='text-danger'>:message</span>")!!}
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="point1" value="{{$group->point1??''}}" class="form-control" placeholder="Enter Points" required>
                        {!!$errors->first("point1", "<span class='text-danger'>:message</span>")!!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="team1">{{$group->team2_name->name}}</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="goal2" class="form-control" value="{{$group->goal2??''}}" placeholder="Enter Goals" required>
                        {!!$errors->first("goal2", "<span class='text-danger'>:message</span>")!!}
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="point2" class="form-control" value="{{$group->point2??''}}" placeholder="Enter Points" required>
                        {!!$errors->first("point2", "<span class='text-danger'>:message</span>")!!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
</div>



@endsection