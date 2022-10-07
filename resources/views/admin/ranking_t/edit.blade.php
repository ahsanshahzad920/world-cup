@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Ranking Tournament
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.ranking-tournament.update', $ranking_t->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $ranking_t->name??'' }}" required>
                    {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
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
