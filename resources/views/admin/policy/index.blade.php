@extends('layouts.admin')
@section('content')
@can('policy_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.policy.create") }}">
                Add New 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Privacy Policies
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
                            Heading
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
                    @foreach($policy as $key => $item)
                        <tr>
                            <td>
                                {{$item->id??''}}
                            </td>
                            <td>
                                {{ $item->heading ?? '' }}
                            </td>
                            <td>
                                {!! $item->description ?? '' !!}
                            </td>
                            <td>

                                @can('policy_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.policy.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('policy_delete')
                                    <form action="{{ route('admin.policy.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
