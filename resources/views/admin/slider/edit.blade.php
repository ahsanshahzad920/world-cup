@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Slider
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.slider.update', $slider->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="heading">Heading<small style="color: red;">*</small></label>
                    <input class="form-control" type="text" name="heading" id="heading" value="{{ $slider->heading??'' }}"
                        required>
                    {!! $errors->first('heading', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="link">Link<small style="color: red;">*</small></label>
                    <input class="form-control" type="text" name="link" id="link" value="{{ $slider->link??'' }}"
                        required>
                    {!! $errors->first('link', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="image">Old Image</label>
                    <img src="{{asset($slider->image)}}" style="width:100px; height:100px;" alt="">
                </div>
                <div class="form-group">
                    <label class="required" for="name">New Image</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="form-group">
                    <label class="required" for="description">Description<small style="color: red;">*</small></label>
                    <textarea class="form-control" name="description" id="description" required>{{ $slider->description??''}}</textarea>
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
