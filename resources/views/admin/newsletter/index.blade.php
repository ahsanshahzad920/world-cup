@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.newsletter.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="description">Message<span style="color: red;">*</span></label>
                    <textarea class="form-control" name="message" id="summernote" required>{{ old('description') }}</textarea>
                    {!! $errors->first('message', "<span class='text-danger'>:message</span>") !!}
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        SEND
                    </button>
                </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Newsletter
        </div>
        
        <div class="card-body">
            <b>Note: If not check then send email to all.</b>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Email
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newsletter as $index => $item)
                            <tr>
                                <td>
                                    <input type="checkbox" name="chk[]" value="{{ $item->id ?? '' }}" id="">
                                </td>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->email ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </form>
@endsection