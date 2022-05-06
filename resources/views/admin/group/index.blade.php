@extends('layouts.admin')
@section('content')
@can('group_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.group.create",$id) }}">
                Add New 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Group & Match
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                <thead>
                    <tr>
                        <th>
                            Sr.
                        </th>
                        <th>
                            Team 1
                        </th>
                        <th>
                            Goals
                        </th>
                        <th>
                            Points
                        </th>
                        <th>
                            Team 2
                        </th>
                        <th>
                            Goals
                        </th>
                        <th>
                            Points
                        </th>
                        <th>
                            Time
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Ground
                        </th>
                        <th>
                            City
                        </th>
                        
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($group as $index => $item)
                        @if($item->group=='A')
                        <tr><th>Group A</th></tr>
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->team1_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->team2_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->time ?? '' }}
                            </td>
                            <td>
                                {{ $item->date ?? '' }}
                            </td>
                            <td>
                                {{ $item->ground ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>
                            <td>
                                @can('match_update')
                                <a class="btn btn-xs btn-dark" href="{{ route('admin.match.edit', $item->id) }}">
                                    Update
                                </a>
                            @endcan
                                @can('group_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('group_delete')
                                    <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                        @endif
                        @if($item->group=='B')
                        <tr><th>Group B</th></tr>
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->team1_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->team2_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->time ?? '' }}
                            </td>
                            <td>
                                {{ $item->date ?? '' }}
                            </td>
                            <td>
                                {{ $item->ground ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>
                            <td>
                                @can('match_update')
                                <a class="btn btn-xs btn-dark" href="{{ route('admin.match.edit', $item->id) }}">
                                    Update
                                </a>
                            @endcan
                                @can('group_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('group_delete')
                                    <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                        @endif
                        @if($item->group=='C')
                        <tr><th>Group C</th></tr>
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->team1_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->team2_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->time ?? '' }}
                            </td>
                            <td>
                                {{ $item->date ?? '' }}
                            </td>
                            <td>
                                {{ $item->ground ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>
                            <td>
                                @can('match_update')
                                <a class="btn btn-xs btn-dark" href="{{ route('admin.match.edit', $item->id) }}">
                                    Update
                                </a>
                            @endcan
                                @can('group_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('group_delete')
                                    <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                        @endif
                        @if($item->group=='D')
                        <tr><th>Group D</th></tr>
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->team1_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->team2_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->time ?? '' }}
                            </td>
                            <td>
                                {{ $item->date ?? '' }}
                            </td>
                            <td>
                                {{ $item->ground ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>
                            <td>
                                @can('match_update')
                                <a class="btn btn-xs btn-dark" href="{{ route('admin.match.edit', $item->id) }}">
                                    Update
                                </a>
                            @endcan
                                @can('group_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('group_delete')
                                    <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                        @endif
                        @if($item->group=='E')
                        <tr><th>Group E</th></tr>
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->team1_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->team2_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->time ?? '' }}
                            </td>
                            <td>
                                {{ $item->date ?? '' }}
                            </td>
                            <td>
                                {{ $item->ground ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>
                            <td>
                                @can('match_update')
                                <a class="btn btn-xs btn-dark" href="{{ route('admin.match.edit', $item->id) }}">
                                    Update
                                </a>
                            @endcan
                                @can('group_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('group_delete')
                                    <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                        @endif
                        @if($item->group=='F')
                        <tr><th>Group F</th></tr>
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->team1_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point1 ?? '' }}
                            </td>
                            <td>
                                {{ $item->team2_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->point2 ?? '' }}
                            </td>
                            <td>
                                {{ $item->time ?? '' }}
                            </td>
                            <td>
                                {{ $item->date ?? '' }}
                            </td>
                            <td>
                                {{ $item->ground ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>
                            <td>
                                @can('match_update')
                                <a class="btn btn-xs btn-dark" href="{{ route('admin.match.edit', $item->id) }}">
                                    Update
                                </a>
                            @endcan
                                @can('group_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.group.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('group_delete')
                                    <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                        @endif
                    @endforeach
                    
                </tbody>
                
            </table>
        </div>
    </div>
</div>



@endsection
