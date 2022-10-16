@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        All Ranking
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User"  id="table-1">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Tournament
                        </th>
                        <th>
                            Participant
                        </th>
                        <th>
                            Points
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($points as $index => $item)
                    @if($item->participant_name->permission==1)
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->tournament_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->participant_name->first_name ?? '' }} {{ $item->participant_name->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $item->points ?? '' }}
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
