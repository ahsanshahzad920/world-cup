@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Predictions
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
                                Tournament
                            </th>
                            <th>
                                Match Type
                            </th>
                            <th>
                                Win Team
                            </th>
                            <th>
                                Team 1 Goal
                            </th>
                            <th>
                                Team 2 Goal
                            </th>
                            <th>
                                User
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prediction as $index => $item)
                        @if($item->match_id!=null)
                            <tr>
                                <td>
                                    {{ $index + 1 }}
                                </td>
                                <td>
                                    <a
                                        href="{{ url('point-table/' . $item->id) }}">{{ $item->tournament_name->name ?? '' }}</a>
                                </td>
                                <td>
                                    {{ $item->match_name->type ?? '' }}
                                </td>
                                <td>
                                    {{ $item->win_name->name ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team1_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $item->team2_goal ?? '' }}
                                </td>
                                <td>
                                    {{ $item->user_name->first_name ?? '' }} {{ $item->user_name->last_name ?? '' }}
                                </td>
                                <td>
                                    @if($item->allow==1 && $item->match_name->win==null)
                                    <form action="{{route('admin.prediction.update',$item->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Allow</button>
                                    </form>
                                    @else
                                    No Action
                                    @endif
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
