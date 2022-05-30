@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Tournament
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.tournament.update', $tournament->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $tournament->name??'' }}"
                        required>
                    {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">Start Date</label>
                    <input class="form-control" type="date" name="start" id="start" value="{{ $tournament->start??'' }}" required>
                    {!!$errors->first("start", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">End Date</label>
                    <input class="form-control" type="date" name="end" id="end" value="{{ $tournament->end??'' }}" required>
                    {!!$errors->first("end", "<span class='text-danger'>:message</span>")!!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">Country</label>
                    <input class="form-control" type="text" name="country" id="country" value="{{ $tournament->country??'' }}" required>
                    {!!$errors->first("country", "<span class='text-danger'>:message</span>")!!}
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
