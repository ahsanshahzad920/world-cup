@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Create Match Update
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.match.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="team1">Group</label>
                <select name="group" class="form-control" id="" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
                {!!$errors->first("group", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="team1">Team 1</label>
                <select name="team1" class="form-control" id="" required>
                    @foreach ($team as $item)
                    <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("team1", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="team1">Team 2</label>
                <select name="team2" class="form-control" id="" required>
                    @foreach ($team as $item)
                    <option value="{{$item->id??''}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                {!!$errors->first("team2", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Date</label>
                <input class="form-control" type="date" name="date" id="date" value="{{ old('date', '') }}" required>
                {!!$errors->first("date", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Time</label>
                <input class="form-control" type="time" name="time" id="time" value="{{ old('time', '') }}" required>
                {!!$errors->first("time", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">Ground</label>
                <input class="form-control" type="text" name="ground" id="ground" value="{{ old('ground', '') }}" required>
                {!!$errors->first("ground", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <label class="required" for="group">City</label>
                <input class="form-control" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    SAVE
                </button>
            </div>
        </form>
    </div>
</div>
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
                            Team 2
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
                                {{ $item->team2_name->name ?? '' }}
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
                                {{ $item->team2_name->name ?? '' }}
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
                                {{ $item->team2_name->name ?? '' }}
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
                                {{ $item->team2_name->name ?? '' }}
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
                                {{ $item->team2_name->name ?? '' }}
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
                                {{ $item->team2_name->name ?? '' }}
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
