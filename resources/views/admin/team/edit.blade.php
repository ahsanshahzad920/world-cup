@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Team
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.team.update', $team->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $team->name }}"
                        required>
                    {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="name">Old Flag</label>
                    <img src="{{asset($team->flag)}}" style="width:100px; height:100px;" alt="">
                </div>
                <div class="form-group">
                    <label class="required" for="name">New Flag</label>
                    <input class="form-control" type="file" name="flag" id="flag">
                    
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
