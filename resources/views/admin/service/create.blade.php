@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Service
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.service.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="icon">Icon</label>
                <input class="form-control" type="text" name="icon" id="icon" value="{{ old('icon', '') }}" required>
                {!!$errors->first("icon", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea class="form-control" name="description" id="description" required>{{ old('description', '') }}</textarea>
                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
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

