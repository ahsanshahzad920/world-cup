@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{$tournament->name??''}} Points
        @can('participant_prediction_access')
        {{-- <a href="#" class="btn btn-primary">Prediction</a> --}}
    @endcan
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
                            Participant Name
                        </th>
                        <th>
                            Total Points
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($point as $index => $item)
                    @if($item->participant_name->permission==1)
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                <img src="{{ asset($item->participant_name->image ?? 'dash-assets/images/team1.jpg') }}" style="height: 35px; width: 35px;"
                                        alt=""> {{ $item->participant_name->first_name ?? '' }} {{ $item->participant_name->last_name ?? '' }}
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
