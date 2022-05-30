@extends('layouts.admin')
@section('content')
@can('service_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.service.create") }}">
                Add New 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Services
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
                            Description
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($service as $index => $item)
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
                                {{ $item->description ?? '' }}
                            </td>
                            <td>

                                @can('service_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.service.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('service_delete')
                                    <form action="{{ route('admin.service.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
