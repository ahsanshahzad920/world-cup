@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Term & Condition
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.term.update', $term->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="heading">Heading</label>
                    <input class="form-control" type="text" name="heading" id="heading" value="{{ $term->heading??'' }}"
                        >
                </div>
                <div class="form-group">
                    <label class="required" for="description">Description</label>
                    <textarea class="form-control" name="description"  id="summernote">{{ $term->description??''}}</textarea>
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
