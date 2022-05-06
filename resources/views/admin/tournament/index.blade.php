@extends('layouts.admin')
@section('content')
@can('tournament_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tournament.create") }}">
                Add New 
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Tournaments
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
                            Name
                        </th>
                        <th>
                            Start
                        </th>
                        <th>
                            End
                        </th>
                        <th>
                            Country
                        </th>
                        <th>
                            City
                        </th>
                        
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tournament as $key => $item)
                        <tr>
                            <td>
                                {{$item->id??''}}
                            </td>
                            <td>
                                <a href="{{url('admin/group/'.$item->id)}}">{{ $item->name ?? '' }}</a>
                            </td>
                            <td>
                                {{ $item->start ?? '' }}
                            </td>
                            <td>
                                {{ $item->end ?? '' }}
                            </td>
                            <td>
                                {{ $item->country ?? '' }}
                            </td>
                            <td>
                                {{ $item->city ?? '' }}
                            </td>
                            <td>

                                @can('tournament_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tournament.edit', $item->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('tournament_delete')
                                    <form action="{{ route('admin.tournament.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
