@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Policy
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.policy.update', $policy->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="required" for="heading">Heading</label>
                    <input class="form-control" type="text" name="heading" id="heading" value="{{ $policy->heading??'' }}"
                        >
                </div>
                <div class="form-group">
                    <label class="required" for="description">Description</label>
                    <textarea class="form-control" name="description"  id="summernote">{{ $policy->description??''}}</textarea>
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
