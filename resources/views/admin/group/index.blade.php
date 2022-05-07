@extends('layouts.admin')
@section('content')
    @can('group_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.group.create', $id) }}">
                    Add New
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Groups
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                Sr.
                            </th>
                            <th>
                                Flag
                            </th>
                            <th>
                                Team
                            </th>
                            
                            <th>
                                Points
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Group A</th>
                            <th>
                                @can('match_access')
                                    <a class="btn btn-xs btn-dark" href="{{ url('admin/match/'.'A/'.$id) }}">
                                        Matches
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        @foreach ($group->where('group','A') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{asset($item->team_name->flag)}}" style="width:100px; height:100px;" alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    <td>

                                        @can('group_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('group_delete')
                                            <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                        @endforeach

                        {{-- Group B --}}

                        <tr>
                            <th>Group B</th>
                            <th>
                                @can('match_update')
                                    <a class="btn btn-xs btn-dark" href="{{ url('admin/match/'.'B/'.$id) }}">
                                        Matches
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        @foreach ($group->where('group','B') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{asset($item->team_name->flag)}}" style="width:100px; height:100px;" alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    <td>

                                        @can('group_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('group_delete')
                                            <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                        @endforeach
                        {{-- Group C --}}
                        <tr>
                            <th>Group C</th>
                            <th>
                                @can('match_update')
                                    <a class="btn btn-xs btn-dark" href="{{ url('admin/match/'.'C/'.$id) }}">
                                        Matches
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        @foreach ($group->where('group','C') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{asset($item->team_name->flag)}}" style="width:100px; height:100px;" alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    <td>

                                        @can('group_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('group_delete')
                                            <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                        @endforeach
                        {{-- Group D --}}
                        <tr>
                            <th>Group D</th>
                            <th>
                                @can('match_update')
                                    <a class="btn btn-xs btn-dark" href="{{ url('admin/match/'.'D/'.$id) }}">
                                        Matches
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        @foreach ($group->where('group','D') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{asset($item->team_name->flag)}}" style="width:100px; height:100px;" alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    <td>

                                        @can('group_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('group_delete')
                                            <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                        @endforeach
                        {{-- Group E --}}
                        <tr>
                            <th>Group E</th>
                            <th>
                                @can('match_update')
                                    <a class="btn btn-xs btn-dark" href="{{ url('admin/match/'.'E/'.$id) }}">
                                        Matches
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        @foreach ($group->where('group','E') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{asset($item->team_name->flag)}}" style="width:100px; height:100px;" alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    <td>

                                        @can('group_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('group_delete')
                                            <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                        @endforeach
                        {{-- Group F --}}
                        <tr>
                            <th>Group F</th>
                            <th>
                                @can('match_update')
                                    <a class="btn btn-xs btn-dark" href="{{ url('admin/match/'.'F/'.$id) }}">
                                        Matches
                                    </a>
                                @endcan
                            </th>
                        </tr>
                        @foreach ($group->where('group','F') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{asset($item->team_name->flag)}}" style="width:100px; height:100px;" alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    <td>

                                        @can('group_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                                Edit
                                            </a>
                                        @endcan

                                        @can('group_delete')
                                            <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
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
