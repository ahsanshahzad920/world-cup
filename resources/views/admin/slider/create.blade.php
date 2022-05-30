@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Slider
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.slider.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="heading">Heading<small style="color: red;">*</small></label>
                <input class="form-control" type="text" name="heading" id="heading" value="{{ old('heading', '') }}" required>
                {!!$errors->first("heading", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="link">link<small style="color: red;">*</small></label>
                <input class="form-control" type="text" name="link" id="link" value="{{ old('link', '') }}" required>
                {!!$errors->first("link", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image<small style="color: red;">*</small></label>
                <input class="form-control" type="file" name="image" id="image" required>
                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="description">Description<small style="color: red;">*</small></label>
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

