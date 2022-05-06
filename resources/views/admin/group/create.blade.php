@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Match
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.group.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <div class="form-group">
                <label class="required" for="team1">Group</label>
                <select name="group" class="form-control" id="" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
                {!!$errors->first("group", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="team1">Team 1</label>
                <select name="team1" class="form-control" id="" required>
                    @foreach ($team as $item)
                    <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("team1", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="team1">Team 2</label>
                <select name="team2" class="form-control" id="" required>
                    @foreach ($team as $item)
                    <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("team2", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Date</label>
                <input class="form-control" type="date" name="date" id="date" value="{{ old('date', '') }}" required>
                {!!$errors->first("date", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Time</label>
                <input class="form-control" type="time" name="time" id="time" value="{{ old('time', '') }}" required>
                {!!$errors->first("time", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Ground</label>
                <input class="form-control" type="text" name="ground" id="ground" value="{{ old('ground', '') }}" required>
                {!!$errors->first("ground", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">City</label>
                <input class="form-control" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    SAVE
                </button>
            </div>
        </form>
    </div>
</div>



@endsection