@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Ranking Point
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.ranking-points.update', $RankingUser->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="tournament">Tournament</label>
                    <select name="tournament" class="form-control" id="" required>
                        @foreach ($tournament as $item)
                        <option value="{{$item->id}}" {{($item->id==$RankingUser->tournament_id)?'selected':''}}>{{$item->name??''}}</option>
                        @endforeach
                    </select>
                    {!!$errors->first("tournament", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group">
                    <label class="required" for="participant">Participant Name</label>
                    <input class="form-control" type="text" name="participant" id="participant" value="{{ $RankingUser->participant??'' }}" required>
                    {!!$errors->first("participant", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group">
                    <label class="required" for="point">Points</label>
                    <input class="form-control" type="text" name="point" id="point" value="{{ $RankingUser->point??'' }}" required>
                    {!!$errors->first("point", "<span class='text-danger'>:message</span>")!!}
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
