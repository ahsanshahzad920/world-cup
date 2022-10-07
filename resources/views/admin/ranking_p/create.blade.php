@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Ranking Point
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.ranking-points.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tournament">Tournament</label>
                <select name="tournament" class="form-control" id="" required>
                    @foreach ($tournament as $item)
                    <option value="{{$item->id}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("tournament", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="participant">Participant Name</label>
                <input class="form-control" type="text" name="participant" id="participant" value="{{ old('participant', '') }}" required>
                {!!$errors->first("participant", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="point">Points</label>
                <input class="form-control" type="text" name="point" id="point" value="{{ old('point', '') }}" required>
                {!!$errors->first("point", "<span class='text-danger'>:message</span>")!!}
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

