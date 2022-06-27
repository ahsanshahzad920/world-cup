@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Create Match
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.match.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tournament_id" value="{{ $tournament ?? '' }}">
                <input type="hidden" name="group" value="{{ $group ?? '' }}">
                <div class="form-group">
                    <label class="required" for="team1">Team 1</label>
                    <select name="team1" class="form-control" id="" required>
                        @foreach ($team as $item)
                            <option value="{{ $item->team_name->id ?? '' }}">{{ $item->team_name->name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('team1', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="team1">Team 2</label>
                    <select name="team2" class="form-control" id="" required>
                        @foreach ($team as $item)
                            <option value="{{ $item->team_name->id ?? '' }}">{{ $item->team_name->name ?? '' }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('team2', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">Match Type</label>
                    <select name="type" class="form-control" id="">
                        <option value="league">league Match</option>
                        <option value="Round of 16">Round of 16</option>
                        <option value="Quarterfinal">Quarterfinal</option>
                        <option value="Semifinal">Semifinal</option>
                        <option value="3rd place">3rd place Match</option>
                        <option value="Final">Final</option>
                    </select>
                    {!! $errors->first('type', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">Date</label>
                    <input class="form-control" type="date" name="date" id="date" value="{{ old('date', '') }}"
                        required>
                    {!! $errors->first('date', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">Time</label>
                    <input class="form-control" type="time" name="time" id="time" value="{{ old('time', '') }}"
                        required>
                    {!! $errors->first('time', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">Ground</label>
                    <input class="form-control" type="text" name="ground" id="ground"
                        value="{{ old('ground', '') }}" required>
                    {!! $errors->first('ground', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">City</label>
                    <input class="form-control" type="text" name="city" id="city"
                        value="{{ old('city', '') }}" required>
                    {!! $errors->first('city', "<span class='text-danger'>:message</span>") !!}
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
            Matches
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" id="table-1">
                    <thead>
                        <tr>
                            <th>
                                Match #
                            </th>
                            <th>
                                Team 1
                            </th>
                            <th>
                                Goals
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Team 2
                            </th>
                            <th>
                                Goals
                            </th>
                            {{-- <th>
                            Points
                        </th> --}}
                            <th>
                                Time
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Stadium
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Win
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($match as $index => $item)
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->team1_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->goal1 ?? '' }}
                                </td>
                                <td>
                                    {{ $item->type ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->goal2 ?? '' }}
                                </td>
                                {{-- <td>
                                {{ $item->point2 ?? '' }}
                            </td> --}}
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
                                    {{ $item->win_name->name ?? '' }}
                                </td>
                                <td>
                                    @if ($item->win == null)
                                        @can('match_update')
                                            <a class="btn btn-xs btn-dark" href="{{ url('admin/match-edit/' . $item->id) }}">
                                                Update
                                            </a>
                                        @endcan
                                    @endif
                                    @can('match_delete')
                                        <form action="{{ route('admin.match.destroy', $item->id) }}" method="POST"
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
