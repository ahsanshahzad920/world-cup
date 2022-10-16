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
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->touranament ?? '' }}
                            </td>
                            <td>
                                {{ $item->first_name ?? '' }} {{ $item->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $item->points ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
