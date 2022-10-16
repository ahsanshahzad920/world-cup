@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Tournament Participant
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
                                Participant
                            </th>

                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tournament as $index => $item)
                            @if ($item->participant_name->permission == 1)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        {{ $item->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ number_format($participant_point->where('tournament_id', $item->id)->count() ?? '0') }}
                                    </td>

                                    <td>

                                        @can('participant_point_view')
                                            <a class="btn btn-xs btn-dark"
                                                href="{{ route('admin.participant_point.show', $item->id) }}">
                                                View
                                            </a>
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
