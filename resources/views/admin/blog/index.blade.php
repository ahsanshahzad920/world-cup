@extends('layouts.admin')
@section('content')
@can('blog_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.blog.create") }}">
                Add New 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Blogs
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Author
                        </th>
                        <th>
                            Author Image
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blog as $key => $item)
                        <tr>
                            <td>
                                {{$item->id??''}}
                            </td>
                            <td>
                                {{ $item->author ?? '' }}
                            </td>
                            <td>
                                <img src="{{asset($item->author_image??'')}}" style="width:100px; height:100px;" alt="">
                            </td>
                            <td>
                                @if($item->image!=null)
                                <img src="{{asset($item->image??'')}}" style="width:100px; height:100px;" alt="">
                                @else
                                null
                                @endif
                            </td>
                            <td>
                                {!! $item->description ?? '' !!}
                            </td>
                            <td>

                                @can('blog_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.blog.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('blog_delete')
                                    <form action="{{ route('admin.blog.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
