@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Team
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.team.store") }}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure to add team??');">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="flag">Flag</label>
                <input class="form-control" type="file" name="flag" id="flag" required>
                {!!$errors->first("flag", "<span class='text-danger'>:message</span>")!!}
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

