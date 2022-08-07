@extends('layouts.admin')
@section('content')
@can('media_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.media.create") }}">
                Add New 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Social Media
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
                            Name
                        </th>
                        <th>
                            Icon
                        </th>
                        <th>
                            Link
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($media as $index => $item)
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->icon ?? '' }}
                            </td>
                            <td>
                                {{ $item->link ?? '' }}
                            </td>
                            <td>

                                @can('media_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.media.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('media_delete')
                                    <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{$item->id}}">
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
