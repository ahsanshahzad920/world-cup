@extends('layouts.admin')
@section('content')
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
                            Sr.
                        </th>
                        <th>
                            Team 1
                        </th>
                        <th>
                            Goals
                        </th>
                        <th>
                            Team 2
                        </th>
                        <th>
                            Goals
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
                                {{ $item->team2_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->goal2 ?? '' }}
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
                                {{ $item->win_name->name ?? '' }}
                            </td>
                            <td>
                                @if ($item->win == null)
                                    @can('participant_prediction_create')
                                        <a class="btn btn-xs btn-dark" href="{{ url('prediction-create/' . $item->id) }}">
                                            prediction
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
