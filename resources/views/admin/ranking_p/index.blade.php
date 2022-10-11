@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.ranking-points.create") }}">
                Add New 
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Ranking points
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
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($RankingUser as $index => $item)
                        <tr>
                            <td>
                                {{$index+1}}
                            </td>
                            <td>
                                {{ $item->tournament_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->participant ?? '' }}
                            </td>
                            <td>
                                {{ $item->point ?? '' }}
                            </td>
                            <td>

                                
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ranking-points.edit', $item->id) }}">
                                        Edit
                                    </a>
                                

                                
                                    <form action="{{ route('admin.ranking-points.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
