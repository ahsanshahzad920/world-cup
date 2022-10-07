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
                        <option value="Group Match">Group Match</option>
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
                    <label class="required" for="group">Stadium</label>
                    <input class="form-control" type="text" name="ground" id="ground" value="{{ old('ground', '') }}"
                        required>
                    {!! $errors->first('ground', "<span class='text-danger'>:message</span>") !!}
                </div>
                <div class="form-group">
                    <label class="required" for="group">City</label>
                    <input class="form-control" type="text" name="city" id="city" value="{{ old('city', '') }}"
                        required>
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
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#EditMatch{{ $item->id ?? '' }}">
                                        Edit
                                    </button>
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
                            <!-- Modal -->
                            <div class="modal fade" id="EditMatch{{ $item->id ?? '' }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Match</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('admin/match-update/'.$item->id)}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="required" for="team1">Team 1</label>
                                                            <select name="team1" class="form-control" id="" required>
                                                                @foreach ($team as $item1)
                                                                    <option {{($item->team1_id==$item1->team_name->id)?'selected':''}}value="{{ $item1->team_name->id ?? '' }}">{{ $item1->team_name->name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('team1', "<span class='text-danger'>:message</span>") !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="required" for="team1">Team 2</label>
                                                            <select name="team2" class="form-control" id="" required>
                                                                @foreach ($team as $item1)
                                                                <option {{($item->team2_id==$item1->team_name->id)?'selected':''}} value="{{ $item1->team_name->id ?? '' }}">{{ $item1->team_name->name ?? '' }}</option>
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('team2', "<span class='text-danger'>:message</span>") !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="required" for="group">Match Type</label>
                                                            <select name="type" class="form-control" id="">
                                                                <option value="Group Match" {{($item->group=='Group Match')?'selected':''}}>Group Match</option>
                                                                <option value="Round of 16" {{($item->group=='Round of 16')?'selected':''}}>Round of 16</option>
                                                                <option value="Quarterfinal" {{($item->group=='Quarterfinal')?'selected':''}}>Quarterfinal</option>
                                                                <option value="Semifinal" {{($item->group=='Semifinal')?'selected':''}}>Semifinal</option>
                                                                <option value="3rd place" {{($item->group=='3rd place')?'selected':''}}>3rd place Match</option>
                                                                <option value="Final" {{($item->group=='Final')?'selected':''}}>Final</option>
                                                            </select>
                                                            {!! $errors->first('type', "<span class='text-danger'>:message</span>") !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="required" for="group">Date</label>
                                                            <input class="form-control" type="date" name="date" id="date" value="{{ $item->date?? '' }}"
                                                                required>
                                                            {!! $errors->first('date', "<span class='text-danger'>:message</span>") !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="required" for="group">Time</label>
                                                            <input class="form-control" type="time" name="time" id="time" value="{{ $item->time??'' }}"
                                                                required>
                                                            {!! $errors->first('time', "<span class='text-danger'>:message</span>") !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="required" for="group">Stadium</label>
                                                            <input class="form-control" type="text" name="ground" id="ground" value="{{ $item->ground??'' }}"
                                                                required>
                                                            {!! $errors->first('ground', "<span class='text-danger'>:message</span>") !!}
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="required" for="group">City</label>
                                                            <input class="form-control" type="text" name="city" id="city" value="{{ $item->city??'' }}"
                                                                required>
                                                            {!! $errors->first('city', "<span class='text-danger'>:message</span>") !!}
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
