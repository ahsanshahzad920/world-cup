@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Group
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.group.update",$group->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$group->tournament_id??''}}">
            <div class="form-group">
                <label class="required" for="team1">Group</label>
                <select name="group" class="form-control" id="" required>
                    <option value="A" @if ($group->group=='A') selected @endif>A</option>
                    <option value="B" @if ($group->group=='B') selected @endif>B</option>
                    <option value="C" @if ($group->group=='C') selected @endif>C</option>
                    <option value="D" @if ($group->group=='D') selected @endif>D</option>
                    <option value="E" @if ($group->group=='E') selected @endif>E</option>
                    <option value="F" @if ($group->group=='F') selected @endif>F</option>
                </select>
                {!!$errors->first("group", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="team1">Team</label>
                <select name="team" class="form-control" id="" required>
                    @foreach ($team as $item)
                    <option value="{{$item->id??''}}" @if($group->team_id==$item->id) selected @endif>{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("team", "<span class='text-danger'>:message</span>")!!}
            </div>
            {{-- <div class="form-group">
                <label class="required" for="team1">Team 2</label>
                <select name="team2" class="form-control" id="" required>
                    @foreach ($team as $item)
                    <option value="{{$item->id??''}}" @if($group->team2_id==$item->id) selected @endif>{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("team2", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Date</label>
                <input class="form-control" type="date" name="date" id="date" value="{{ $group->date??'' }}" required>
                {!!$errors->first("date", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Time</label>
                <input class="form-control" type="time" name="time" id="time" value="{{ $group->time??'' }}" required>
                {!!$errors->first("time", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Ground</label>
                <input class="form-control" type="text" name="ground" id="ground" value="{{ $group->ground??'' }}" required>
                {!!$errors->first("ground", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">City</label>
                <input class="form-control" type="text" name="city" id="city" value="{{ $group->city??'' }}" required>
                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
            </div> --}}
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
</div>



@endsection