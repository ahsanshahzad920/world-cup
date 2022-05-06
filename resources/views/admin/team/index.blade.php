@extends('layouts.admin')
@section('content')
@can('team_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.team.create") }}">
                Add New 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Teams
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
                            Flag
                        </th>
                        
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($team as $key => $item)
                        <tr>
                            <td>
                                {{$item->id??''}}
                            </td>
                            <td>
                                {{ $item->name ?? '' }}
                            </td>
                            
                            <td>
                                <img src="{{asset($item->flag??'')}}" style="width:100px; height:100px;" alt="">
                            </td>
                            <td>

                                @can('team_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.team.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('team_delete')
                                    <form action="{{ route('admin.team.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
