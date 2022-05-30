@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Blog
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="author">Author<small style="color: red;">*</small></label>
                    <input class="form-control" type="text" name="author" id="author" value="{{ $blog->author??'' }}"
                        required>
                    {!! $errors->first('author', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="">Old Author Image</label>
                    <img src="{{asset($blog->author_image)}}" style="width:100px; height:100px;" alt="">
                </div>
                <div class="form-group">
                    <label class="required" for="author_image">New Author Image</label>
                    <input class="form-control" type="file" name="author_image" id="author_image">
                </div>
                @if($blog->image!=null)
                <div class="form-group">
                    <label class="required" for="image">Old Image</label>
                    <img src="{{asset($blog->image)}}" style="width:100px; height:100px;" alt="">
                </div>
                @endif
                <div class="form-group">
                    <label class="required" for="name">New Image</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="form-group">
                    <label class="required" for="description">Description<small style="color: red;">*</small></label>
                    <textarea class="form-control" name="description" id="description" required>{{ $blog->description??''}}</textarea>
                    {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
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
