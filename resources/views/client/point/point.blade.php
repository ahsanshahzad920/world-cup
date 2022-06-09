@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Point Table
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
                                Matches
                            </th>
                            <th>
                                Win
                            </th>
                            <th>
                                lose
                            </th>
                            <th>
                                Points
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($group->where('group', 'A')->count() > 0)
                            <tr>
                                <th>Group A</th>
                                <th>
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'A/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'A') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    

                                </tr>
                            @endforeach
                        @endif
                        {{-- Group B --}}
                        @if ($group->where('group', 'B')->count() > 0)
                            <tr>
                                <th>Group B</th>
                                <th>
                                    @can('match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('admin/match/' . 'B/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'B') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    

                                </tr>
                            @endforeach
                        @endif
                        @if ($group->where('group', 'C')->count() > 0)
                            {{-- Group C --}}
                            <tr>
                                <th>Group C</th>
                                <th>
                                    @can('match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('admin/match/' . 'C/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'C') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    

                                </tr>
                            @endforeach
                        @endif
                        @if ($group->where('group', 'D')->count() > 0)
                            {{-- Group D --}}
                            <tr>
                                <th>Group D</th>
                                <th>
                                    @can('match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('admin/match/' . 'D/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'D') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    

                                </tr>
                            @endforeach
                        @endif
                        @if ($group->where('group', 'E')->count() > 0)
                            {{-- Group E --}}
                            <tr>
                                <th>Group E</th>
                                <th>
                                    @can('match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('admin/match/' . 'E/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'E') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    

                                </tr>
                            @endforeach
                        @endif
                        @if ($group->where('group', 'F')->count() > 0)
                            {{-- Group F --}}
                            <tr>
                                <th>Group F</th>
                                <th>
                                    @can('match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('admin/match/' . 'F/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'F') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    

                                </tr>
                            @endforeach
                        @endif
                        {{-- Group G --}}
                        @if ($group->where('group', 'G')->count() > 0)
                            <tr>
                                <th>Group G</th>
                                <th>
                                    @can('match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('admin/match/' . 'G/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'G') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>
                                    

                                </tr>
                            @endforeach
                        @endif
                        {{-- Group H --}}
                        @if ($group->where('group', 'H')->count() > 0)
                            <tr>
                                <th>Group H</th>
                                <th>
                                    @can('match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('admin/match/' . 'H/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'H') as $index => $item)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($item->team_name->flag) }}" style="width:100px; height:100px;"
                                            alt="">
                                    </td>
                                    <td>
                                        {{ $item->team_name->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_match ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->win ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->lose ?? '' }}
                                    </td>
                                    <td>
                                        {{ $item->total_points ?? '' }}
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection