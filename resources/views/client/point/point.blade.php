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
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'B/' . $id) }}">
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
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'C/' . $id) }}">
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
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'D/' . $id) }}">
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
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'E/' . $id) }}">
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
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'F/' . $id) }}">
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
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'G/' . $id) }}">
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
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'H/' . $id) }}">
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
                        {{-- Group Round of 16 --}}
                        @if ($group->where('group', 'Round of 16')->count() > 0)
                            <tr>
                                <th>Round of 16</th>
                                <th>
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'Round of 16/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'Round of 16') as $index => $item)
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
                        {{-- Group Quater Final --}}
                        @if ($group->where('group', 'Quater Final')->count() > 0)
                            <tr>
                                <th>Quater Final</th>
                                <th>
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'Quater Final/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'Quater Final') as $index => $item)
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
                        {{-- Group Semifinal --}}
                        @if ($group->where('group', 'Semifinal')->count() > 0)
                            <tr>
                                <th>Semifinal</th>
                                <th>
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'Semifinal/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'Semifinal') as $index => $item)
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
                        {{-- Group Third Place --}}
                        @if ($group->where('group', 'Third Place')->count() > 0)
                            <tr>
                                <th>Third Place</th>
                                <th>
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'Third Place/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'Third Place') as $index => $item)
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
                        {{-- Group Final --}}
                        @if ($group->where('group', 'Final')->count() > 0)
                            <tr>
                                <th>Final</th>
                                <th>
                                    @can('participant_match_access')
                                        <a class="btn btn-xs btn-dark" href="{{ url('tournament-match/' . 'Final/' . $id) }}">
                                            Matches
                                        </a>
                                    @endcan
                                </th>
                            </tr>
                            @foreach ($group->where('group', 'Final') as $index => $item)
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
