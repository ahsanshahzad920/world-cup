@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{$tournament->name??''}} Points
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
                            Points
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
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
                            <td>
                                @if($item->status==0)
                                <span class="btn btn-primary" style="border-radius: 0px;"> Active</span>
                                @else
                                <span class="btn btn-danger" style="border-radius: 0px;"> Block</span>
                                @endif
                            </td>
                            <td>
                                @can('tournament_delete')
                                    <form action="{{ route('admin.participant_point.update', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if($item->status==0)
                                        <input type="submit" class="btn btn-xs btn-danger" value="Block">
                                        @else
                                        <input type="submit" class="btn btn-xs btn-success" value="Active">
                                        @endif
                                    </form>
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
