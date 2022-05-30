@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Blog
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blog.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="author">Author<small style="color: red;">*</small></label>
                <input class="form-control" type="text" name="author" id="author" value="{{ old('author', '') }}" required>
                {!!$errors->first("author", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Author Image<small style="color: red;">*</small></label>
                <input class="form-control" type="file" name="author_image" id="author_image" required>
                {!!$errors->first("author_image", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="image">Image</label>
                <input class="form-control" type="file" name="image" id="image">
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

